window.onscroll = function () {
    myFunction();
};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
    }
}

function myFunctionReadMore() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
        dots.style.display = "inline";
        btnText.innerHTML = " Read more";
        moreText.style.display = "none";
    } else {
        dots.style.display = "none";
        btnText.innerHTML = " Read less";
        moreText.style.display = "inline";
    }
}

// switch
// change the background of the page according to the value of the checkbox
const input = document.querySelector('input[type="checkbox"]');
function handleInput() {
    const { checked } = this;
    document.querySelector("body").style.background = checked
        ? "#313338"
        : "#f0f1f1";
    document.querySelector("body").style.color = checked ? "#fff" : "#000";

    const elements = document.querySelectorAll(".deskripsiBuku");
    elements.forEach((element) => {
        // element.style.color = checked ? "#fff" : "#000";
        element.classList.toggle("dark");
    });

    const teksPutih = document.querySelectorAll(
        ".deskripsiBuku h3, .deskripsiBuku p"
    );
    teksPutih.forEach((element1) => {
        element1.style.color = checked ? "#fff" : "#000";
    });

    const navbar = document.querySelector("#navbar");
    navbar.style.background = checked ? "#313338" : "#f0f1f1";
    navbar.style.transition = "background 0.75s ease-in-out";

    const teksNavbar = document.querySelectorAll(
        ".header nav ul li, .header nav ul li a, #navbar svg"
    );
    teksNavbar.forEach((element2) => {
        element2.style.color = checked ? "#fff" : "#000";
        element2.style.borderColor = checked ? "#fff" : "#000";
        element2.style.fill = checked ? "#fff" : "#000";
    });

    const banner = document.querySelectorAll(".banner");
    banner.forEach((element3) => {
        element3.classList.toggle("backgroundDark");
    });

    // pagebuku
    document.querySelector(".pageBack a").style.color = checked
        ? "#fff"
        : "#000";
}
input.addEventListener("input", handleInput);
