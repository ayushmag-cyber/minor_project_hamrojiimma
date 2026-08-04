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


<section class="about-section">

    <div class="about-container">

        <!-- LEFT CONTENT -->

        <div class="about-content">

            <span class="about-tag">
                ABOUT US
            </span>

            <h1>
                About <span>HamroJiimma</span>
            </h1>

            <div class="about-subtitle">

                <div class="line"></div>

                <span class="heart">❤</span>

                <p>Care You Can Trust, Support You Deserve</p>

                <div class="line"></div>

            </div>

            <p>
                HamroJiimma is a care-focused digital platform created to
                support Nepalese households through trusted and reliable
                services. Our goal is to make daily life easier by
                connecting families with verified helpers and skilled
                service providers.
            </p>

            <p>
                In today's busy lifestyle, many families struggle to
                manage household responsibilities, elder care, child
                supervision and other personal support services.
                HamroJiimma provides a safe and organized solution where
                users can easily find dependable assistance according to
                their needs.
            </p>

            <p>
                We focus not only on service booking but also on building
                trust, long-term support and care within the community.
            </p>

            <!-- FEATURES -->

            <div class="feature-wrapper">

                <div class="feature-box">

                    <div class="feature-icon">
                        <i class='bx bx-check-shield'></i>
                    </div>

                    <div>

                        <h3>Trusted & Verified</h3>

                        <p>
                            All service providers are background-checked
                            and verified for your safety.
                        </p>

                    </div>

                </div>

                <div class="feature-box">

                    <div class="feature-icon">
                        <i class='bx bx-group'></i>
                    </div>

                    <div>

                        <h3>We Care for You</h3>

                        <p>
                            Your comfort, safety and satisfaction are
                            always our top priority.
                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->

        <div class="about-image">

            <img src="{{ asset('about.png') }}" alt="About HamroJiimma">

            <div class="mission-card">

                <div class="mission-icon">

                    <i class='bx bx-home-heart'></i>

                </div>

                <div>

                    <h2>Our Mission</h2>

                    <div class="mission-line"></div>

                    <p>
                        To connect every home with trusted care and
                        support services.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ================= WHY CHOOSE US ================= -->

<section class="why-section">

    <h2>Why Families Choose HamroJiimma?</h2>

    <div class="why-grid">

        <div class="why-card">

            <i class='bx bxs-check-shield'></i>

            <h3>Verified Providers</h3>

            <p>
                All helpers are verified and trusted.
            </p>

        </div>

        <div class="why-card">

            <i class='bx bx-heart'></i>

            <h3>Safe & Reliable</h3>

            <p>
                Your safety and comfort are our top priority.
            </p>

        </div>

        <div class="why-card">

            <i class='bx bx-wallet'></i>

            <h3>Affordable Services</h3>

            <p>
                Quality care at reasonable prices.
            </p>

        </div>

        <div class="why-card">

            <i class='bx bx-time'></i>

            <h3>24/7 Support</h3>

            <p>
                We are always here whenever you need us.
            </p>

        </div>

        <div class="why-card">

            <i class='bx bxs-like'></i>

            <h3>Easy Booking</h3>

            <p>
                Book services online in just a few clicks.
            </p>

        </div>

        <div class="why-card">

            <i class='bx bxs-group'></i>

            <h3>Happy Families</h3>

            <p>
                Hundreds of families trust and recommend us.
            </p>

        </div>

    </div>

</section>

  <section class="stats">

            <div class="stat">
            <i class='bx bxs-user-check'></i>
            <h2>500+</h2>            
            <span>Verified Helpers</span>
        </div>

            <div class="stat">
            <i class='bx bxs-badge-check'></i>
            <h2>100%</h2>            
            <span>Identity Verified</span>
        </div>
            <div class="stat">
            <i class='bx bxs-phone-call'></i>
            <h2>24/7</h2>            
            <span>Customer Support</span>
        </div>

            <div class="stat">
            <i class='bx bxs-star'></i>
            <h2>4.9★</h2>
            <span>Customer Rating</span>
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