<div class="tab-pane fade" id="v-pills-user" role="tabpanel"
aria-labelledby="v-pills-user-tab">
<div class="fp_dashboard_body ps-4">
    <ul class="navbar-nav mx-auto mb-4 w-25">
        <form action="{{-- route('admin.search') --}}">
            <input type="text" name="search"
                class="form-control form-control-sm"
                placeholder="Search for names">
        </form>
    </ul>
    <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h4>Customers</h4>
              <div class="card-header-action">
                <button class="btn btn-sm d-flex justify-content-end text-white" style="box-shadow: 0 2px 6px #c5c0f2; background-color:#6777EF;">View More</button>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive table-invoice">
                <table class="table table-striped">
                  <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Activation</th>
                  </tr>
                  <tr>
                    <td><a href="#">No.87239</a></td>
                    <td class="font-weight-600">Kusnadi</td>
                    <td><div class="badge badge-warning">Unpaid</div></td>
                    <td>July 19, 2018</td>
                    <td>
                        <button type="button" class="btn btn-danger ms-2 btn-sm" data-bs-toggle="modal"
                        data-bs-target="#inactivate-user-{{-- $post->id --}}">
                        {{-- <i class="fa-regular fa-trash-can"></i> --}}
                        inactivate
                    </button>
                    @include('admin.users.modal.status')
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#">No.48574</a></td>
                    <td class="font-weight-600">Hasan Basri</td>
                    <td><div class="badge badge-success">Paid</div></td>
                    <td>July 21, 2018</td>
                    <td>
                        <button type="button" class="btn btn-primary ms-2 btn-sm" data-bs-toggle="modal"
                        data-bs-target="#activate-user-{{-- $post->id --}}">
                        {{-- <i class="fa-regular fa-trash-can"></i> --}}
                        Activate
                    </button>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#">No.76824</a></td>
                    <td class="font-weight-600">Muhamad Nuruzzaki</td>
                    <td><div class="badge badge-warning">Unpaid</div></td>
                    <td>July 22, 2018</td>
                    <td>
                        <button type="button" class="btn btn-primary ms-2 btn-sm" data-bs-toggle="modal"
                        data-bs-target="#activate-user-{{-- $post->id --}}">
                        {{-- <i class="fa-regular fa-trash-can"></i> --}}
                        Activate
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#">No.84990</a></td>
                    <td class="font-weight-600">Agung Ardiansyah</td>
                    <td><div class="badge badge-warning" >Unpaid</div></td>
                    <td>July 22, 2018</td>
                    <td>
                        <button type="button" class="btn btn-primary ms-2 btn-sm" data-bs-toggle="modal"
                        data-bs-target="#activate-user-{{-- $post->id --}}">
                        {{-- <i class="fa-regular fa-trash-can"></i> --}}
                        Activate
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#">No.87320</a></td>
                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                    <td><div class="badge badge-success">Paid</div></td>
                    <td>July 28, 2018</td>
                    <td>
                        <button type="button" class="btn btn-danger ms-2 btn-sm" data-bs-toggle="modal"
                        data-bs-target="#inactivate-user-{{-- $post->id --}}">
                        {{-- <i class="fa-regular fa-trash-can"></i> --}}
                        inactivate
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#">No.87320</a></td>
                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                    <td><div class="badge badge-success">Paid</div></td>
                    <td>July 28, 2018</td>
                    <td>
                        <button type="button" class="btn btn-danger ms-2 btn-sm" data-bs-toggle="modal"
                        data-bs-target="#inactivate-user-{{-- $post->id --}}">
                        {{-- <i class="fa-regular fa-trash-can"></i> --}}
                        inactivate
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#">No.87320</a></td>
                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                    <td><div class="badge badge-success">Paid</div></td>
                    <td>July 28, 2018</td>
                    <td>
                        <button type="button" class="btn btn-danger ms-2 btn-sm" data-bs-toggle="modal"
                        data-bs-target="#inactivate-user-{{-- $post->id --}}">
                        {{-- <i class="fa-regular fa-trash-can"></i> --}}
                        inactivate
                        </button>
                    </td>
                  </tr>
                  <tr>
                    <td><a href="#">No.87320</a></td>
                    <td class="font-weight-600">Ardian Rahardiansyah</td>
                    <td><div class="badge badge-success">Paid</div></td>
                    <td>July 28, 2018</td>
                    <td>
                        <button type="button" class="btn btn-danger ms-2 btn-sm" data-bs-toggle="modal"
                        data-bs-target="#inactivate-user-{{-- $post->id --}}">
                        {{-- <i class="fa-regular fa-trash-can"></i> --}}
                        inactivate
                        </button>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
            {{-- <div class="container"> --}}
                <canvas id="genderChart" class="mb-3"></canvas>
            {{-- </div> --}}
            <canvas id="ageChart" width="150" height="200"></canvas>
        </div>
      </div>
</div>
</div>

<script>

document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('genderChart').getContext('2d');

    var genderChart = new Chart(ctx, {
        type: 'pie', // 円グラフ
        data: {
            labels: ['Men', 'Women', 'Others'], // ラベル
            datasets: [{
                label: 'ratio',
                data: [50, 30, 20], // データ（例えば、男性 50%、女性 30%、その他 20%）
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)', // 男性用色
                    'rgba(255, 99, 132, 0.6)',  // 女性用色
                    'rgba(255, 206, 86, 0.6)'   // その他用色
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)', // 男性用色
                    'rgba(255, 99, 132, 1)',  // 女性用色
                    'rgba(255, 206, 86, 1)'   // その他用色
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
                        label: function (tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw + '%';
                        }
                    }
                }
            }
        }
    });
});
</script>

<script>

    // script.js
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('ageChart').getContext('2d');

    var ageChart = new Chart(ctx, {
        type: 'bar', // 棒グラフ
        data: {
            labels: ['10-', '20-', '30-', '40-', '50-'], // ラベル
            datasets: [{
                label: 'customers/age',
                data: [150, 300, 250, 200, 180, 120], // データ（例としての人数）
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)', // 各バーの色
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
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'age'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'number'
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            var value = tooltipItem.raw;
                            return tooltipItem.label + ': ' + value + '人';
                        }
                    }
                },
                datalabels: {
                    formatter: (value, ctx) => {
                        return value + '人'; // データラベルに人数を表示
                    },
                    color: '#000',
                    anchor: 'end',
                    align: 'end',
                    font: {
                        weight: 'bold'
                    }
                }
            }
        }
    });
});

</script>
