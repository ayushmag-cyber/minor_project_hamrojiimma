<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HamroJiimma - About Us</title>

 
   <link rel="stylesheet" href="style.css">
<script src="{{ asset('app.js') }}" defer></script>

<!-- Boxicons -->
<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>

<body>

    <!-- Navbar -->
<nav class="navbar">

    <button id="theme-toggle" class="theme-toggle">
        <i class='bx bx-moon'></i>
    </button>

    <a href="{{ url('/') }}">
        <img src="{{ asset('logo1.png') }}" alt="HamroJiimma Services" width="150" height="100">    </a>

    <ul class="nav-link">

    <li>
        <a href="{{ url('/') }}" class="home-btn">
            <i class='bx bx-home'></i> Home
        </a>
    </li>

    <li>
        <a href="{{ url('/about') }}" class="about-btn">
            <i class='bx bx-info-circle'></i> About Us
        </a>
    </li>

    <li>
        <a href="{{ url('/services') }}" class="services-btn">
            <i class='bx bx-briefcase-alt'></i> Services
        </a>
    </li>

    <li>
        <a href="{{ url('/reviews') }}" class="review-btn">
            <i class='bx bx-star'></i> Review
        </a>
    </li>

    @guest
    <li>
        <a href="{{ url('/login') }}" class="login-btn">
            <i class='bx bx-user'></i> Login
        </a>
    </li>
    @endguest

    @auth
    <li>
        <a href="{{ url('/dashboard') }}" class="login-btn">
            <i class='bx bx-user-circle'></i>
            {{ Auth::user()->name }}
        </a>
    </li>
    @endauth

    <li>
        <a href="{{ url('/contact') }}" class="contact-btn">
            <i class='bx bx-phone'></i> Contact
        </a>
    </li>
</ul>

    <div class="nav-icons">

        <div class="header-icon">

            <i class='bx bx-search' id="search-icon"></i>

            <div class="search-box">
                <input type="search" placeholder="Search services...">
            </div>

        </div>

    </div>

    <i class="bx bx-menu menu-btn"></i>

</nav>

    <!-- ABOUT SECTION -->

<section class="main-about">

    <div class="left-side">

        <div class="subtitle">About HamroJiimma</div>
        <div class="line"></div>
        <h1>
            Caring for Every Home,
            <br>
            One Service at a Time.
        </h1>

        <p>
            HamroJiimma is a trusted digital platform designed to connect
            Nepalese families with verified caregivers and household service
            providers. We make it easy to book reliable assistance for
            childcare, elder care, home monitoring and event support.
        </p>

        <p>
            Our mission is to simplify everyday life through safe,
            affordable and professional home-care services while building
            trust within every community.
        </p>

        <div class="about-buttons">

            <a href="{{ url('/services') }}" class="btn">
                Explore Services
            </a>

            <a href="{{ url('/contact') }}" class="btn btn-outline">
                    Contact Us
            </a>

        </div>

        <div class="about-stats">

            <div class="stat">
                <h2>500+</h2>
                <span>Happy Families</span>
            </div>

            <div class="stat">
                <h2>100+</h2>
                <span>Verified Helpers</span>
            </div>

            <div class="stat">
                <h2>24/7</h2>
                <span>Support</span>
            </div>

        </div>

    </div>


    <div class="right-side">

        <div class="about-image">
            <img src="{{ asset('about.png') }}" alt="HamroJiimma">
        </div>

    </div>

</section>

    <!-- Footer -->
    <section class="footer" id="contact">

        <div class="footer-box">

            <h2>HamroJiimma</h2>

            <div class="social">

                <a href="https://www.facebook.com" target="_blank">
                    <i class='bx bxl-facebook'></i>
                </a>

                <a href="https://twitter.com" target="_blank">
                    <i class='bx bxl-twitter'></i>
                </a>

                <a href="https://www.instagram.com" target="_blank">
                    <i class='bx bxl-instagram'></i>
                </a>

                <a href="https://www.tiktok.com" target="_blank">
                    <i class='bx bxl-tiktok'></i>
                </a>

            </div>

        </div>

         <div class="footer-box">

            <h2>Services</h2>

            <li><a href="{{ url('/services') }}">Elder Care</a></li>
            <li><a href="{{ url('/services') }}">Child Care</a></li>
            <li><a href="{{ url('/services') }}">Motherhood Care</a></li>
            <li><a href="{{ url('/services') }}">House Monitoring</a></li>
            <li><a href="{{ url('/services') }}">Event Assistance</a></li>
        </div>

        <div class="footer-box">

            <h2>Support</h2>

           <li><a href="{{ url('/contact') }}">Services</a></li>
           <li><a href="{{ url('/contact') }}">Help & Support</a></li>
           <li><a href="{{ url('/booking') }}">Book a Service</a></li>
            <li><a href="{{ url('/contact') }}">About HamroJiimma</a></li>

        </div>

        <div class="footer-box">

    <h2>Contact Us</h2>

    <ul>

        <li>
            <i class='bx bx-envelope'></i>
            <a href="mailto:hamrojiimma@gmail.com">
                hamrojiimma@gmail.com
            </a>
        </li>

        <li>
            <i class='bx bx-phone'></i>
            <a href="tel:+9779865374519">
                +977 9865374519
            </a>
        </li>

        <li>
            <i class='bx bx-map'></i>
            Kathmandu, Nepal
        </li>

        <li>
            <i class='bx bx-message-square-detail'></i>
           <a href="{{ url('/contact') }}">
                Contact Form
            </a>
        </li>

    </ul>

</div>

    </section>

    <!-- Footer Bottom -->
    <footer>

        <p>
            &copy; 2026 HamroJiimma. All rights reserved.
        </p>

    </footer>

</body>

</html>