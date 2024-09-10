
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

