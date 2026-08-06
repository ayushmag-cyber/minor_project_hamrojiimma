// Dark mode

const themeToggle = document.getElementById("theme-toggle");

if (themeToggle) {

    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
        themeToggle.innerHTML = "<i class='bx bx-sun'></i>";
    }

    themeToggle.onclick = () => {

        document.body.classList.toggle("dark-mode");

        if (document.body.classList.contains("dark-mode")) {
            themeToggle.innerHTML = "<i class='bx bx-sun'></i>";
            localStorage.setItem("theme", "dark");
        } else {
            themeToggle.innerHTML = "<i class='bx bx-moon'></i>";
            localStorage.setItem("theme", "light");
        }

    };

}


// Mobile menu

const menuBtn = document.querySelector(".menu-btn");
const navLinks = document.querySelector(".nav-link");

if(menuBtn && navLinks){

    menuBtn.onclick = () => {
        navLinks.classList.toggle("active");
    };

}


// Close menu after selecting option

document.querySelectorAll(".nav-link a").forEach(link => {

    link.onclick = () => {

        if(navLinks){
            navLinks.classList.remove("active");
        }

    };

});


// Search

const searchIcon = document.getElementById("search-icon");
const searchBox = document.querySelector(".search-box");

if (searchIcon && searchBox) {

    searchIcon.onclick = () => {
        searchBox.classList.toggle("active");
    };

}


// Live Service Search
const searchInput = document.getElementById("serviceSearch");

if (searchInput) {

    searchInput.addEventListener("keyup", function () {

        const searchValue = this.value.toLowerCase();

        const services = document.querySelectorAll(".service-grid .box");

        const noResult = document.getElementById("noServiceFound");

        let found = false;

        services.forEach(function (service) {

            const serviceName = service.querySelector("h2").textContent.toLowerCase();

            if (serviceName.includes(searchValue)) {

                service.style.display = "";
                service.classList.add("highlight-service");
                found = true;

            } else {

                service.style.display = "none";
                service.classList.remove("highlight-service");

            }

        });

        if (noResult) {

            if (searchValue === "") {

                noResult.style.display = "none";

                services.forEach(function (service) {
                    service.style.display = "";
                    service.classList.remove("highlight-service");
                });

            } else if (found) {

                noResult.style.display = "none";

            } else {

                noResult.style.display = "block";

            }

        }

    });

}

// Close search outside click

document.addEventListener("click", function (e) {

    if (searchBox && searchIcon) {

        if (!searchBox.contains(e.target) && !searchIcon.contains(e.target)) {
            searchBox.classList.remove("active");
        }

    }

});



// Contact form message

const contactForm = document.getElementById("contact-form");

if(contactForm){

    contactForm.onsubmit = function(e){

        e.preventDefault();

        const msg = document.getElementById("success-message");

        if(msg){
            msg.style.display = "block";
        }

        this.reset();

    };

}


// Login message

const loginForm = document.getElementById("login-form");

if(loginForm){

    loginForm.onsubmit = function(e){

        e.preventDefault();

        const msg = document.getElementById("login-message");

        if(msg){
            msg.innerHTML = "Login Successful!";
            msg.style.display = "block";
        }

        this.reset();

    };

}
