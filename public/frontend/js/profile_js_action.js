// ----------Personal Info --------------

document.addEventListener("DOMContentLoaded", () => {
    const editBtn = document.getElementById("edit-btn");
    const cancelBtn = document.getElementById("cancel-btn");
    const infoContent = document.getElementById("info-content");
    const editForm = document.getElementById("edit-form");

    // 編集ボタンのクリックイベント
    editBtn.addEventListener("click", () => {
        infoContent.style.display = "none";
        editForm.style.display = "block";
        editBtn.style.display = "none";
        cancelBtn.style.display = "block";
    });

    // キャンセルボタンのクリックイベント
    cancelBtn.addEventListener("click", () => {
        infoContent.style.display = "block";
        editForm.style.display = "none";
        editBtn.style.display = "block";
        cancelBtn.style.display = "none";
    });

    // Bootstrapタブの切り替えイベントをリセット
    document.querySelectorAll('[data-bs-toggle="pill"]').forEach((tab) => {
        tab.addEventListener("click", () => {
            // 編集モードがアクティブならリセット
            infoContent.style.display = "block";
            editForm.style.display = "none";
            editBtn.style.display = "block";
            cancelBtn.style.display = "none";
        });
    });

    // ページ遷移の場合はリセットするためのイベント
    window.addEventListener("popstate", () => {
        // 編集モードがアクティブならリセット
        infoContent.style.display = "block";
        editForm.style.display = "none";
        editBtn.style.display = "block";
        cancelBtn.style.display = "none";
    });
});

// --------- Order --------------

