window.onscroll = function () { scroll() };

var navbar = document.getElementById("main-nav");

function scroll() {
    if (window.pageYOffset >= 10) {
        navbar.classList.add("navbar-sticky");
        navbar.style.backgroundColor = "#ffffff2c";
    } else {
        navbar.classList.remove("navbar-sticky");
        navbar.style.backgroundColor = "#ffffff00";
    }
}
