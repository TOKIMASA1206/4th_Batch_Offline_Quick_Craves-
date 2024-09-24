// document.addEventListener('DOMContentLoaded', function () {
//   var ctx = document.getElementById('genderChart').getContext('2d');

//   var genderChart = new Chart(ctx, {
//       type: 'pie', // 円グラフ
//       data: {
//           labels: ['Men', 'Women', 'Others'], // ラベル
//           datasets: [{
//               label: 'ratio',
//               data: [50, 30, 20],
//               backgroundColor: [
//                   'rgba(54, 162, 235, 0.6)', // 男性用色
//                   'rgba(255, 99, 132, 0.6)',  // 女性用色
//                   'rgba(255, 206, 86, 0.6)'   // その他用色
//               ],
//               borderColor: [
//                   'rgba(54, 162, 235, 1)', // 男性用色
//                   'rgba(255, 99, 132, 1)',  // 女性用色
//                   'rgba(255, 206, 86, 1)'   // その他用色
//               ],
//               borderWidth: 1
//           }]
//       },
//       options: {
//           responsive: true,
//           plugins: {
//               legend: {
//                   position: 'top',
//               },
//               tooltip: {
//                   callbacks: {
//                       label: function (tooltipItem) {
//                           return tooltipItem.label + ': ' + tooltipItem.raw + '%';
//                       }
//                   }
//               }
//           }
//       }
//   });
// });




  // script.js
// document.addEventListener('DOMContentLoaded', function () {
//   var ctx = document.getElementById('ageChart').getContext('2d');

//   var ageChart = new Chart(ctx, {
//       type: 'bar', // 棒グラフ
//       data: {
//           labels: ['10-', '20-', '30-', '40-', '50-'], // ラベル
//           datasets: [{
//               label: 'customers/age',
//               data: [150, 300, 250, 200, 180, 120], // データ（例としての人数）
//               backgroundColor: [
//                   'rgba(75, 192, 192, 0.6)', // 各バーの色
//                   'rgba(75, 192, 192, 0.6)',
//                   'rgba(75, 192, 192, 0.6)',
//                   'rgba(75, 192, 192, 0.6)',
//                   'rgba(75, 192, 192, 0.6)'
//               ],
//               borderColor: [
//                   'rgba(75, 192, 192, 1)', // 各バーの枠線の色
//                   'rgba(75, 192, 192, 1)',
//                   'rgba(75, 192, 192, 1)',
//                   'rgba(75, 192, 192, 1)',
//                   'rgba(75, 192, 192, 1)'
//               ],
//               borderWidth: 1
//           }]
//       },
//       options: {
//           responsive: true,
//           scales: {
//               x: {
//                   beginAtZero: true,
//                   title: {
//                       display: true,
//                       text: 'age'
//                   }
//               },
//               y: {
//                   beginAtZero: true,
//                   title: {
//                       display: true,
//                       text: 'number'
//                   }
//               }
//           },
//           plugins: {
//               legend: {
//                   position: 'top',
//               },
//               tooltip: {
//                   callbacks: {
//                       label: function (tooltipItem) {
//                           var value = tooltipItem.raw;
//                           return tooltipItem.label + ': ' + value + '人';
//                       }
//                   }
//               },
//               datalabels: {
//                   formatter: (value, ctx) => {
//                       return value + '人'; // データラベルに人数を表示
//                   },
//                   color: '#000',
//                   anchor: 'end',
//                   align: 'end',
//                   font: {
//                       weight: 'bold'
//                   }
//               }
//           }
//       }
//   });
// });
