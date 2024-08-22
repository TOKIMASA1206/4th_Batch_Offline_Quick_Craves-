


// ----------Personal Info --------------

document.addEventListener('DOMContentLoaded', () => {
  const editBtn = document.getElementById('edit-btn');
  const cancelBtn = document.getElementById('cancel-btn');
  const infoContent = document.getElementById('info-content');
  const editForm = document.getElementById('edit-form');
  
  // 編集ボタンのクリックイベント
  editBtn.addEventListener('click', () => {
    infoContent.style.display = 'none';
    editForm.style.display = 'block';
    editBtn.style.display = 'none';
    cancelBtn.style.display = 'block';
  });

  // キャンセルボタンのクリックイベント
  cancelBtn.addEventListener('click', () => {
      infoContent.style.display = 'block';
      editForm.style.display = 'none';
      editBtn.style.display = 'block';
      cancelBtn.style.display = 'none';
    });
    
    // Bootstrapタブの切り替えイベントをリセット
    document.querySelectorAll('[data-bs-toggle="pill"]').forEach(tab => {
      tab.addEventListener('click', () => {
        // 編集モードがアクティブならリセット
      infoContent.style.display = 'block';
      editForm.style.display = 'none';
      editBtn.style.display = 'block';
      cancelBtn.style.display = 'none';
    });
  });
  
  // ページ遷移の場合はリセットするためのイベント
  window.addEventListener('popstate', () => {
    // 編集モードがアクティブならリセット
    infoContent.style.display = 'block';
    editForm.style.display = 'none';
    editBtn.style.display = 'block';
    cancelBtn.style.display = 'none';
  });
});




// --------- Order --------------

document.addEventListener("DOMContentLoaded", function() {
  // すべての "View Details" ボタンを取得
  const viewInvoiceButtons = document.querySelectorAll(".view_invoice");

  // インボイス表示部分と注文リスト表示部分を取得
  const orderList = document.querySelector(".order");
  const invoice = document.querySelector(".invoice");

  // "View Details" ボタンがクリックされたときのイベントリスナーを追加
  viewInvoiceButtons.forEach(function(button) {
      button.addEventListener("click", function() {
          // 注文リストを非表示にして、インボイスを表示
          orderList.style.display = "none";
          invoice.style.display = "block";
      });
  });

  // "Go Back" ボタンを取得してイベントリスナーを追加
  const goBackButton = document.querySelector(".go_back");
  goBackButton.addEventListener("click", function() {
      // インボイスを非表示にして、注文リストを表示
      invoice.style.display = "none";
      orderList.style.display = "block";
  });


  // タブの変更を監視し、タブが切り替わるたびに初期状態に戻す
  const tabButtons = document.querySelectorAll('[role="tab"]');
  tabButtons.forEach(function(tabButton) {
      tabButton.addEventListener('click', function() {
          // タブがクリックされるときにインボイスを非表示にして、注文リストを表示
          invoice.style.display = "none";
          orderList.style.display = "block";
      });
  });
});
