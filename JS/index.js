const menuToggle = document.getElementById("toggle");
const menuIcon = document.querySelector(".menu-toggle i");
menuToggle.addEventListener("click", function() {
    if (menuToggle.checked) {
        menuIcon.classList.remove("fa-bars");
        menuIcon.classList.add("fa-times");
    } else {
        menuIcon.classList.remove("fa-times");
        menuIcon.classList.add("fa-bars");
    }
});