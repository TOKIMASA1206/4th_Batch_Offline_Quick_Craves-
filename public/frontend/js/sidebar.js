"use strict";

{
    // const hamBurger = document.querySelector(".toggle-btn");

    // hamBurger.addEventListener("click", function () {
    //     sidebar.classList.toggle("expand");
    // });

    // Additional code for the hamburger menu functionality
    const hamburgerBtn = document.querySelector('.hamburger-menu');

    hamburgerBtn.addEventListener('click', function () {
        const sidebar = document.querySelector("#sidebar");
        sidebar.classList.toggle('show');
    });
}
