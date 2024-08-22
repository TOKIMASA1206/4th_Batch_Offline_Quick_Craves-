"use strict";

{
    document.querySelectorAll(".category-btn").forEach((button) => {
        button.addEventListener("click", () => {
            // switch the active class of the button
            document.querySelectorAll(".category-btn").forEach((btn) => {
                btn.classList.remove("btn-yellow-index");
                btn.classList.add("btn-yellow-outline");
            });
            button.classList.remove("btn-yellow-outline");
            button.classList.add("btn-yellow-index");

            const category = button.getAttribute("data-category");
            document.querySelectorAll(".menu-item").forEach((item) => {
                if (
                    category === "all" ||
                    item.getAttribute("data-category") === category
                ) {
                    // Keep the Items that matches with the categories
                    item.style.display = "block";
                    item.style.animationName = "slideIn";
                } else {
                    // slideOut items that does't match with category
                    item.style.animationName = "slideOut";
                    setTimeout(() => {
                        item.style.display = "none";
                    }, 500);
                }
            });
        });
    });
}
