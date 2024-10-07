"use strict";

{
    document.querySelectorAll(".category-btn").forEach((button) => {
        button.addEventListener("click", () => {
            // すべてのカテゴリーボタンから 'btn-yellow-index' クラスを削除し、'btn-yellow-outline' クラスを追加
            document.querySelectorAll(".category-btn").forEach((btn) => {
                btn.classList.remove("btn-yellow-index");
                btn.classList.add("btn-yellow-outline");
            });
            // クリックされたボタンに 'btn-yellow-index' クラスを追加し、'btn-yellow-outline' クラスを削除
            button.classList.remove("btn-yellow-outline");
            button.classList.add("btn-yellow-index");

            const category = button.getAttribute("data-category");

            if (category === "all") {
                // .category-menu-list を非表示にし、.menu-list を表示
                document.querySelectorAll(".category-menu-list").forEach((list) => {
                    list.style.display = "none";
                });
                document.querySelectorAll(".menu-list").forEach((list) => {
                    list.style.display = "block";
                });

                document.querySelectorAll(".paginate").forEach((list) => {
                    list.style.display = "flex";
                });

                // すべてのメニューアイテムを表示
                document.querySelectorAll(".category-menu-item").forEach((item) => {
                    item.style.display = "block";
                    item.style.animationName = "slideIn";
                });
            } else {
                // 特定のカテゴリーが選択された場合
                // .menu-list を非表示にし、.category-menu-list を表示
                document.querySelectorAll(".menu-list").forEach((list) => {
                    list.style.display = "none";
                });
                document.querySelectorAll(".category-menu-list").forEach((list) => {
                    list.style.display = "block";
                });
                document.querySelectorAll(".paginate").forEach((list) => {
                    list.style.display = "none";
                });

                // メニューアイテムをフィルタリング
                document.querySelectorAll(".category-menu-item").forEach((item) => {
                    if (item.getAttribute("data-category") === category) {
                        // カテゴリーが一致する場合、表示し、'slideIn' アニメーションを適用
                        item.style.display = "block";
                        item.style.animationName = "slideIn";
                    } else {
                        // 一致しない場合、'slideOut' アニメーションを適用し、0.5秒後に非表示
                        item.style.animationName = "slideOut";
                        setTimeout(() => {
                            item.style.display = "none";
                        }, 700);
                    }
                });
            }
        });
    });
}
