<div class="tab-pane fade show active" id="v-pills-home-1" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="fp_dashboard_body">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1" style="background-color: white !important">
                        <div class="card-icon bg-primary">
                            <i class="fa-solid fa-utensils h4 text-white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header" style="background-color: white !important">
                                <h4>MENU</h4>
                            </div>
                            <div class="card-body">
                                10
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1" style="background-color: white !important">
                        <div class="card-icon bg-danger">
                            <i class="fa-solid fa-star h4 text-white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header" style="background-color: white !important">
                                <h4>Category</h4>
                            </div>
                            <div class="card-body">
                                42
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1" style="background-color: white !important">
                        <div class="card-icon bg-warning">
                            <i class="fa-solid fa-users h4 text-white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header" style="background-color: white !important">
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


        <div class="w-100 mt-5">
            <div class="d-flex justify-content-end">
                <button onclick="updateChart('week')" class="btn btn-outline-dark me-2">week</button>
                <button onclick="updateChart('month')" class="btn btn-outline-dark me-2">month</button>
                <button onclick="updateChart('year')" class="btn btn-outline-dark me-4">yesr</button>
            </div>
            <canvas id="salesChart" width="400" height="200"></canvas>
            <script src="script.js"></script>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script>
    const ctx = document.getElementById('salesChart').getContext('2d');

    // 売上データ（例として設定）
    const salesData = {
        week: [30, 40, 35, 50, 45, 60, 70],
        month: [120, 150, 180, 170, 190, 210, 230, 220, 250, 240, 260, 280],
        year: [1000, 1200, 1150, 1400, 1600, 1800, 1750, 2000, 2200, 2100, 2300, 2500]
    };

    // ラベルデータ（例として設定）
    const labelsData = {
        week: ['月', '火', '水', '木', '金', '土', '日'],
        month: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
        year: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月']
    };

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
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // グラフ更新関数
    function updateChart(period) {
        salesChart.data.labels = labelsData[period];
        salesChart.data.datasets[0].data = salesData[period];
        salesChart.update();
    }
    Ï
</script>
