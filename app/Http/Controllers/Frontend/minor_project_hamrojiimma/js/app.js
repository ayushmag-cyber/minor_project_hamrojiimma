// ===============================
// DARK MODE
// ===============================

const themeToggle = document.getElementById("theme-toggle");

if (themeToggle) {

    // Load saved theme
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
        themeToggle.innerHTML = "<i class='bx bx-sun'></i>";
    }

    themeToggle.addEventListener("click", () => {

        document.body.classList.toggle("dark-mode");

        if (document.body.classList.contains("dark-mode")) {

            themeToggle.innerHTML = "<i class='bx bx-sun'></i>";
            localStorage.setItem("theme", "dark");

        } else {

            themeToggle.innerHTML = "<i class='bx bx-moon'></i>";
            localStorage.setItem("theme", "light");

        }

    });

}


// ===============================
// MOBILE MENU
// ===============================

const menuBtn = document.querySelector(".menu-btn");
const navLinks = document.querySelector(".nav-link");

if (menuBtn && navLinks) {

    menuBtn.addEventListener("click", () => {

        navLinks.classList.toggle("active");

    });

}


// ===============================
// SEARCH BOX
// ===============================

const searchIcon = document.getElementById("search-icon");
const searchBox = document.querySelector(".search-box");

if (searchIcon && searchBox) {

    searchIcon.addEventListener("click", () => {

        searchBox.classList.toggle("active");

    });

}


// ===============================
// CONTACT FORM
// ===============================

const contactForm = document.getElementById("contact-form");

if (contactForm) {

    contactForm.addEventListener("submit", function (e) {

        e.preventDefault();

        document.getElementById("success-message").style.display = "block";

        this.reset();

        setTimeout(() => {

            document.getElementById("success-message").style.display = "none";

        }, 3000);

    });

}


// ===============================
// LOGIN FORM
// ===============================

const loginForm = document.getElementById("login-form");

if (loginForm) {

    loginForm.addEventListener("submit", function (e) {

        e.preventDefault();

        const message = document.getElementById("login-message");

        message.innerHTML = "Login Successful!";
        message.style.display = "block";

        this.reset();

        setTimeout(() => {

            message.style.display = "none";

        }, 3000);

    });

}


// ===============================
// CLOSE MENU AFTER CLICKING A LINK
// ===============================

const navItems = document.querySelectorAll(".nav-link a");

navItems.forEach(item => {

    item.addEventListener("click", () => {

        if (navLinks) {
            navLinks.classList.remove("active");
        }

    });

});


// ===============================
// CLOSE SEARCH WHEN CLICKING OUTSIDE
// ===============================

document.addEventListener("click", function (e) {

    if (
        searchBox &&
        searchIcon &&
        !searchBox.contains(e.target) &&
        !searchIcon.contains(e.target)
    ) {

        searchBox.classList.remove("active");

    }

});