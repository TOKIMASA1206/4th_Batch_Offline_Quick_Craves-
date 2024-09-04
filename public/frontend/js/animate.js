document.addEventListener("DOMContentLoaded", function() {
  const objects = document.querySelectorAll('.fade-up'); // '.scroll-in' を '.fade-up' に変更

  // スクロール感知で実行
  const cb = function(entries, observer) {
      entries.forEach(entry => {
          if (entry.isIntersecting) {
              entry.target.classList.add('fade-in');
              observer.unobserve(entry.target); // 監視の終了
          }
      });
  }

  // オプション
  const options = {
      root: null,
      rootMargin: "0px",
      threshold: 0.33 // 画面に1/3以上表示されたときにアニメーションを開始
  }

  // IntersectionObserver インスタンス化
  const io = new IntersectionObserver(cb, options);

  // 監視を開始
  objects.forEach(object => {
      io.observe(object);
  });
});


