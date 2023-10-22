/*document.addEventListener("DOMContentLoaded", function () {
    const logoutButton = document.getElementById("logout");

    logoutButton.addEventListener("click", function () {
        window.location.href = "Login.html"; // Redirect to the Login page
    });
});*/
let submenu = document.getElementById("submenu")
        function toggleMenu(){
            submenu.classList.toggle("open-menu");
        }
        const logoutLink = document.querySelector(".sub-menu-link");
        logoutLink.addEventListener("click", function() {
            // Redirect to the Login.html page
            window.location.href = "Login.html";
        });
