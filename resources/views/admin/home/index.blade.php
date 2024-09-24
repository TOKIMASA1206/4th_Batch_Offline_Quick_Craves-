@extends('admin.layouts.app')

@section('content')
    <div class="tab-pane fade show active" id="v-pills-home-1" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <div class="fp_dashboard_body ps-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-2">
                        <div class="card card-statistic-1 bg-white">
                            <div class="card-icon bg-primary">
                                <i class="fa-solid fa-utensils h4 text-white"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header bg-white">
                                    <h4>MENU</h4>
                                </div>
                                <div class="card-body">
                                    10
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-2">
                        <div class="card card-statistic-1 bg-white">
                            <div class="card-icon bg-danger">
                                <i class="fa-solid fa-star h4 text-white"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header bg-white">
                                    <h4>Category</h4>
                                </div>
                                <div class="card-body">
                                    42
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1 bg-white">
                            <div class="card-icon bg-warning">
                                <i class="fa-solid fa-users h4 text-white"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header bg-white">
                                    <h4>User</h4>
                                </div>
                                <div class="card-body">
                                    1,201
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-5">

                <div class="col-6">
                    <canvas id="genderChart"></canvas>
                </div>

                <div class="col-6">
                    <canvas id="ageChart"></canvas>
                </div>

            </div>

            <div>
                <div class="mt-5 mx-auto" style="height: %">
                    <canvas id="salesChart"></canvas>
                    <div class="d-flex justify-content-end mt-4">
                        <button onclick="updateChart('week')" class="btn-blue me-2">week</button>
                        <button onclick="updateChart('month')" class="btn-blue me-2">month</button>
                        <button onclick="updateChart('year')" class="btn-blue me-4">year</button>
                    </div>
                    <script src="script.js"></script>
                </div>
            </div>

        </div>
    </div>
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

        {{-- 売上グラフ --}}

        <script>
            const ctx = document.getElementById('salesChart').getContext('2d');

            const salesData = @json($salesData);
            const labelsData = @json($labelsData);


            // 初期グラフ設定
            let currentPeriod = 'month';

            const salesChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labelsData[currentPeriod],
                    datasets: [{
                        label: '売上 (万円)',
                        data: salesData[currentPeriod],
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                        }]
                    }
                }
            });

            // グラフ更新関数
            function updateChart(period) {
                salesChart.data.labels = labelsData[period];
                salesChart.data.datasets[0].data = salesData[period];
                salesChart.update();
            }

            // {{-- 円男女比グラフ --}}

            document.addEventListener('DOMContentLoaded', function() {
                var ctx = document.getElementById('genderChart').getContext('2d');

                var genderData = @json($data);

                var genderChart = new Chart(ctx, {
                    type: 'pie', // 円グラフ
                    data: {
                        labels: ['Men', 'Women', 'Others'], // ラベル
                        datasets: [{
                            label: 'ratio',
                            data: [genderData.men, genderData.women, genderData.others],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.6)', // 男性用色
                                'rgba(255, 99, 132, 0.6)', // 女性用色
                                'rgba(255, 206, 86, 0.6)' // その他用色
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)', // 男性用色
                                'rgba(255, 99, 132, 1)', // 女性用色
                                'rgba(255, 206, 86, 1)' // その他用色
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                                    }
                                }
                            }
                        }
                    }
                });
            });

            // {{-- 年齢別棒線グラフ --}}  　////Y軸に0を固定で表示させたい////
            document.addEventListener('DOMContentLoaded', function() {
                var ctx = document.getElementById('ageChart').getContext('2d');

                var ageData = @json($ageGroups);

                var ageChart = new Chart(ctx, {
                    type: 'bar', // 棒グラフ
                    data: {
                        labels: ['0-', '10-', '20-', '30-', '40-', '50-', '60-'], // ラベル
                        datasets: [{
                            label: 'customers/age',
                            data: [ageData.single, ageData.ten, ageData.twenty, ageData.thirty, ageData
                                .forty, ageData
                                .fifty, ageData.sixty
                            ], // データ（例としての人数）
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.6)', // 各バーの色
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(75, 192, 192, 0.6)'
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)', // 各バーの枠線の色
                                'rgba(75, 192, 192, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            xAxes: [{
                                ticks: {
                                    beginAtZero: true
                                },
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Age'
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                },
                            }]
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
