document.addEventListener('DOMContentLoaded', function () {
  // 全ての proceed-item を取得
  const proceedItems = document.querySelectorAll('.proceed-item');

  // 各 proceed-item に対して処理を行う
  proceedItems.forEach(function (item) {
    const proceedStatusColor1 = item.querySelector('.status-bar-color-1');
    const proceedStatusColor2 = item.querySelector('.status-bar-color-2');
    const making = item.querySelector('.making');
    const completed = item.querySelector('.completed');
    const start = item.querySelector('.start');
    const makingMarkFirst = item.querySelector('.making-mark-first');
    const makingMarkSecond = item.querySelector('.making-mark-second');
    const completedMarkFirst = item.querySelector('.completed-mark-first');
    const completedMarkSecond = item.querySelector('.completed-mark-second');

    // 現在の進行状況を保持するためのフラグ
    let isMakingOnceClicked = false;
    let isCompletedOnceClicked = false;

    // start ボタンがクリックされたときの処理
    start.addEventListener('click', function () {
      proceedStatusColor1.style.transform = 'translateX(-100%)';
      proceedStatusColor2.style.transform = 'translateX(-100%)';
      makingMarkFirst.style.display = 'inline';
      makingMarkSecond.style.display = 'none';
      completedMarkFirst.style.display = 'inline';
      completedMarkSecond.style.display = 'none';
      isMakingOnceClicked = false;
      isCompletedOnceClicked = false;
    });

    // making ボタンがクリックされたときの処理
    making.addEventListener('click', function () {
      if (!isMakingOnceClicked) {
        proceedStatusColor1.style.transform = 'translateX(0)';
        makingMarkFirst.style.display = 'none';
        makingMarkSecond.style.display = 'inline';
        isMakingOnceClicked = true;
      } else if (isCompletedOnceClicked) {
        proceedStatusColor2.style.transform = 'translateX(-100%)';
        completedMarkFirst.style.display = 'inline';
        completedMarkSecond.style.display = 'none';
        isCompletedOnceClicked = false;
      }
    });

    // completed ボタンがクリックされたときの処理
    completed.addEventListener('click', function () {
      if (!isMakingOnceClicked) {
        // makingを押していない状態でcompletedを押した場合、まずproceedStatusColor1を発動
        proceedStatusColor1.style.transform = 'translateX(0)';
        makingMarkFirst.style.display = 'none';
        makingMarkSecond.style.display = 'inline';
        isMakingOnceClicked = true;
      }
      proceedStatusColor2.style.transform = 'translateX(0)';
      completedMarkFirst.style.display = 'none';
      completedMarkSecond.style.display = 'inline';
      isCompletedOnceClicked = true;
    });
  });
});
