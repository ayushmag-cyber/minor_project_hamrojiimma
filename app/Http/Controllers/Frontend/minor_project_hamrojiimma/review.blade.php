<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HamroJiimma</title>

    <link rel="stylesheet" href="style.css">
<script src="app.js" defer></script>

<!-- Boxicons -->
<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar">

    <button id="theme-toggle" class="theme-toggle">
        <i class='bx bx-moon'></i>
    </button>

    <a href="index.html">
            <img src="logo1.png" alt="HamroJiimma Services" width="150 px" height="100 px">
    </a>

   <ul class="nav-link">
    <li>
        <a href="index.html" class="home-btn">
            <i class='bx bx-home'></i> Home
        </a>
    </li>

    <li>
        <a href="about.html" class="about-btn">
            <i class='bx bx-info-circle'></i> About Us
        </a>
    </li>

    <li>
        <a href="services.html" class="services-btn">
            <i class='bx bx-briefcase-alt'></i> Services
        </a>
    </li>

    <li>
        <a href="review.html" class="review-btn">
            <i class='bx bx-star'></i> Review
        </a>
    </li>

    <li>
        <a href="login.html" class="login-btn">
            <i class='bx bx-user'></i> Login
        </a>
    </li>

    <li>
        <a href="contact.html" class="contact-btn">
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

<!-- CART -->
<div class="cart-container">
    <h3>Your Requests</h3>
    <ul id="cart-items"></ul>
</div>

<!-- TESTIMONIALS -->
<section class="review" id="review">

    <div class="title">
        <h1>What Our Clients Say</h1>
        <div class="line"></div>
    </div>

    <div class="review-container">

        <div class="box">
            <img src="images/customer1.jpeg">
            <h1>@Aashrita</h1>
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>The elder care service is very reliable. My family feels safe and supported.</p>
        </div>

        <div class="box">
                    <img src="images/customer4.jpeg">
                    <h1>@Aarogya-Gag</h1>
                    <div class="stars">
                        <i class='bx bxs-star' ></i> 
                        <i class='bx bxs-star' ></i> 
                        <i class='bx bxs-star' ></i> 
                        <i class='bx bxs-star-half' ></i> 
                    </div>
            <p>Childcare service is amazing. My child feels comfortable and happy.</p>
        </div>

        <div class="box">
            <img src="images/customer2.jpg">
            <h1>@Pramisha</h1>
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>Event management was smooth and stress-free. Everything was handled perfectly.</p>
        </div>

        <div class="box">
            <img src="images/customer 6.jpeg">
            <h1>@Nischal123</h1>
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
            <p>A reliable and trustworthy service. The caregiver was patient, experienced, and always ready to help whenever needed.</p>
        </div>

        <div class="box">
            <img src="images/customer3.jpeg">
            <h1>@SS Shrestha</h1>
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
            </div>
            <p>House watching service gave me peace of mind while I was away.</p>
        </div>

        <div class="box">
            <img src="images/customer5.jpeg">
            <h1>@Radha Nepal</h1>
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
            </div>
            <p>Excellent service! The helper was professional, punctual, and understanding. I highly recommend HamroJiimma's Motherhood Care.Very trustworthy and professional service. Highly recommended.</p>
        </div>

        <div class="box">
            <img src="images/customer7.jpg">
            <h1>@Ayysh11</h1>
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
            </div>
            <p>Great experience with childcare support. Very caring staff.</p>
        </div>

         <div class="box">
            <i class='bx bxs-quote-left quote'></i>
            <img src="images/customer8.jpeg">
            <h1>@Prabesh03</h1>
            <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
            </div>
            <p>Excellent service! The helper was professional, punctual, and understanding. Very caring staff.</p>
        </div>

    </div>
</section>

<!-- FOOTER -->
<section class="footer" id="contact">

    <div class="footer-box">
        <h2>HAMROJIIMMA</h2>
        <div class="social">
            <a href="#"><i class='bx bxl-facebook'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
            <a href="#"><i class='bx bxl-instagram'></i></a>
            <a href="#"><i class='bx bxl-tiktok'></i></a>
        </div>
    </div>

     <div class="footer-box">

            <h2>Services</h2>

            <li><a href="services.html">Elder Care</a></li>
            <li><a href="service.html">Child Care</a></li>
            <li><a href="service.html">Motherhood Care</a></li>
            <li><a href="service.html">House Monitoring</a></li>
            <li><a href="service.html">Event Assistance</a></li>
        </div>

    <div class="footer-box">

            <h2>Support</h2>

            <li><a href="services.html">Services</a></li>
            <li><a href="contact.html">Help & Support</a></li>
            <li><a href="contact.html">Book a Service</a></li>
            <li><a href="contact.html">About HamroJiimma</a></li>

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
            <a href="contact.html">
                Contact Form
            </a>
        </li>

    </ul>

</div>

</section>

<footer style="background-color:rgb(61, 2, 2)">
    <p>&copy; 2026 HamroJiimma. All rights reserved.</p>
</footer>
</body>
</html>