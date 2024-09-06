<div class="tab-pane fade show active" id="v-pills-home-1" role="tabpanel" aria-labelledby="v-pills-home-tab">
    <div class="fp_dashboard_body ps-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-2">
                    <div class="card card-statistic-1 bg-white" >
                        <div class="card-icon bg-primary">
                            <i class="fa-solid fa-utensils h4 text-white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header bg-white" >
                                <h4>MENU</h4>
                            </div>
                            <div class="card-body">
                                10
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-2">
                    <div class="card card-statistic-1 bg-white" >
                        <div class="card-icon bg-danger">
                            <i class="fa-solid fa-star h4 text-white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header bg-white" >
                                <h4>Category</h4>
                            </div>
                            <div class="card-body">
                                42
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 bg-white" >
                        <div class="card-icon bg-warning">
                            <i class="fa-solid fa-users h4 text-white"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header bg-white" >
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

            <div class="d-flex justify-content-end mb-4">
                <button onclick="updateChart('week')" class="btn-blue me-2">week</button>
                <button onclick="updateChart('month')" class="btn-blue me-2">month</button>
                <button onclick="updateChart('year')" class="btn-blue me-4">year</button>


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
        week: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
        month: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        year: ['2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011']
    };

    // 初期グラフ設定
    let currentPeriod = 'month';

    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labelsData[currentPeriod],
            datasets: [{
                label: 'sales (KP)',
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

<script>
    document.querySelectorAll(".timer-container").forEach((container) => {
        const timeDisplay = container.querySelector(".time-display");
        const startButton = container.querySelector(".start");
        const stopButton = container.querySelector(".stop");
        const resetButton = container.querySelector(".reset");

        let startTime;
        let stopTime = 0;
        let timeoutID;

        function displayTime() {
            const currentTime = new Date(Date.now() - startTime + stopTime);
            const m = String(currentTime.getMinutes()).padStart(2, "0");
            const s = String(currentTime.getSeconds()).padStart(2, "0");
            const ms = String(currentTime.getMilliseconds()).padStart(3, "0");

            timeDisplay.textContent = `${m}:${s}.${ms}`;
            timeoutID = setTimeout(displayTime, 10);
        }

        startButton.addEventListener("click", () => {
            startButton.disabled = true;
            stopButton.disabled = false;
            resetButton.disabled = true;
            startTime = Date.now();
            displayTime();
        });

        stopButton.addEventListener("click", function() {
            startButton.disabled = false;
            stopButton.disabled = true;
            resetButton.disabled = false;
            clearTimeout(timeoutID);
            stopTime += Date.now() - startTime;
        });

        resetButton.addEventListener("click", function() {
            startButton.disabled = false;
            stopButton.disabled = true;
            resetButton.disabled = true;
            timeDisplay.textContent = "00:00.000";
            stopTime = 0;
        });
    });
</script>
