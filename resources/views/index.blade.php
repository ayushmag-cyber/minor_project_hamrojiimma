<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HamroJiimma</title>

    <link rel="stylesheet" href="style.css">
    <script src="app.js" defer></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>

<body>
<div class="main-wrapper">

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

   
    <li>
        <a href="{{ url('/contact') }}" class="contact-btn">
            <i class='bx bx-phone'></i> Contact
        </a>
    </li>

    @auth

<li>
    <a href="{{ url('/dashboard') }}" class="login-btn">
        <i class='bx bx-user-circle'></i>
        {{ Auth::user()->name }}
    </a>
</li>

<li>
    <form action="{{ url('/logout') }}" method="POST">
        @csrf

        <button type="submit" class="logout-btn">
            <i class='bx bx-log-out'></i>
            Logout
        </button>

    </form>
</li>

@endauth
</ul>

    <div class="nav-icons">

        <div class="header-icon">

            <i class='bx bx-search' id="search-icon"></i>

            <div class="search-box">
                <input type="search" placeholder="Search services...">
            </div>

        </div>

    </div>

    <i class="bx bx-menu menu-btn" id="menu-btn"></i>

</nav>

    <!-- Header -->
    <header id="header">

        <div class="header-content-container">

            <div class="header-text" style="text-align:center">
                <h1>Trusted Care for Every Nepalese Family</h1>
                 <div class="line"></div>
                <p class="author">Connecting families with verified caregivers for elder care, child care, motherhood support, and home monitoring.</p>
                <h3>Safe • Verified • Affordable • Professional</h3>
                <a href="{{ url('/booking') }}" class="btn">Book a Service</a>
                <a href="{{ url('/about') }}" class="btn btn-outline">Learn More</a>

            </div>

            <div class="header-image-box">
                <img src="kk.png" alt="HamroJiimma Services">
            </div>

        </div>

    </header>
   
       <!-- Main Services -->
    <section class="collections" id="collections">

        <div class="title">
            <h1>Our Main Services</h1>
            <div class="line"></div>
        </div>

        <div class="collection-container">

            <div class="box">

                <img src="images/e.png" alt="Elder Care">

                <h4>Elder Care</h4>

                <p>
                    Daily assistance, companionship, and routine support for elderly family members.
                </p>

                <div class="content">
                    <span>Trusted Support</span>
                    <a href="{{ url('/service/1') }}" class="btn">View More</a>
                </div>

            </div>

            <div class="box">

                <img src="c.png" alt="Child Care">

                <h4>Child Care</h4>

                <p>
                    Babysitting, homework guidance, and caring supervision for children.
                </p>

                <div class="content">
                    <span>Safe & Reliable</span>
                   <a href="{{ url('/service/2') }}" class="btn">View More</a>
                </div>

            </div>
            <div class="box">

                <img src="motherhood.jpg" alt="Motherhood Care">

                <h2>Motherhood Care</h2>
                <p>
                    Support for expecting and new mothers through compassionate and professional care.
                </p>
                             <div class="content">
                        <span>Professional Support</span> 
                    <a href="{{ url('/service/3') }}" class="btn">View More</a>
                </div>

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

               
               <!-- WHY CHOOSE US -->

<section class="why-section">

    <h2>Why Families Choose HamroJiimma?</h2><br>

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
            <a href="{{ url('/contact') }}">Contact Form</a>
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

</div>

</body>
</html>