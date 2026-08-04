<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HamroJiimma - Login</title>

<link rel="stylesheet" href="{{ asset('style.css') }}">
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

   <!-- Login Box -->
<div class="wrapper-login">

    <h2>Login</h2>

    @if(session('success'))
    <div style="color:green; text-align:center; margin-bottom:15px; font-weight:bold;">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div style="color:red; text-align:center; margin-bottom:15px; font-weight:bold;">
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf

        <div class="input-box">

                <span class="icon">
                    <i class='bx bx-envelope'></i>
                </span>

                <input type="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="input-box">

                <span class="icon">
                    <i class='bx bx-lock'></i>
                </span>

                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="remember-forget">

                <label>
                    <input type="checkbox" name="remember">
                    Remember me?
                </label>

                <a href="{{ url('/forgot-password') }}">Forgot Password?</a>        
                </div>

            <button type="submit" class="btn">
                Login
            </button>

            <div class="register-link">

                <label>New to HamroJiimma?</label>
                <a href="{{ url('/register') }}">Create New Account</a>
            </div>

        </form>

        <div id="login-message"
            style="display:none; color: green; margin-top: 10px; text-align: center; font-weight: bold;">
        </div>

    </div>

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

            <li><a href="{{ url('/services') }}">Services</a></li>
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
    <footer style="background-color: rgb(20, 67, 115);">

        <p>
            &copy; 2026 HamroJiimma. All rights reserved.
        </p>

    </footer>

</body>

</html>
