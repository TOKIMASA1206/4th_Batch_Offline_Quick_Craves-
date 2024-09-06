"use strict";
document.addEventListener('DOMContentLoaded', function() {
    const hamburgerBtn = document.querySelector('.hamburger-menu');
    const sidebar = document.querySelector("#sidebar");
    const body = document.querySelector('body');

    // ハンバーガーメニューを開く時の処理
    hamburgerBtn.addEventListener('click', function() {
        sidebar.classList.toggle('show');
        body.classList.toggle('no-scroll');  // スクロール無効化
    });

    // ウィンドウのリサイズ時にハンバーガーメニューのリセット処理
    window.addEventListener('resize', function() {
        const windowWidth = window.innerWidth;

        if (windowWidth > 769) {  // 920px以上の場合はメニューを非表示にし、スクロールを元に戻す
            sidebar.classList.remove('show');
            body.classList.remove('no-scroll');
        }
    });
});
