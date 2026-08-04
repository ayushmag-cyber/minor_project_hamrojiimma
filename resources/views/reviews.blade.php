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

    @auth

    <div class="review-form">

        <h2>Share Your Experience</h2>

        <p>
            Your feedback helps us improve HamroJiimma
        </p>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('/reviews') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="input-group">
                <label>Your Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}" required>
            </div>

            <div class="input-group">
                <label>Your Review</label>
                <textarea name="review" placeholder="Write your experience..." required></textarea>
            </div>

            <div class="input-group">
                <label>Your Rating</label>

                <select name="rating" required>
                    <option value="5">★★★★★ Excellent</option>
                    <option value="4">★★★★ Very Good</option>
                    <option value="3">★★★ Good</option>
                    <option value="2">★★ Fair</option>
                    <option value="1">★ Poor</option>
                </select>

            </div>

            <div class="input-group">

                <label>
                    Profile Picture (Optional)
                </label>

                <input type="file" name="image" accept="image/*">

            </div>

            <button type="submit">
                <i class='bx bx-send'></i>
                Post Review
            </button>

        </form>

    </div>

    @else

    <div class="review-login-box">

        <h2>Want to share your experience?</h2>

        <p>
            Please login to post a review.
        </p>

        <a href="{{ url('/login') }}">
            Login Now
        </a>

    </div>

    @endauth


    <!-- DISPLAY REVIEWS -->

    <div class="review-list">

        <h2>Customer Reviews</h2>

        @foreach($reviews as $review)

        <div class="review-card">

            @if($review->image)

                <img src="{{ asset('storage/'.$review->image) }}" 
                alt="Profile Picture"
                width="80">

            @endif


            <h3>
                {{ $review->name }}
            </h3>


            <p>
                {{ $review->review }}
            </p>


            <div class="rating">

                @for($i = 0; $i < $review->rating; $i++)

                    ★

                @endfor

            </div>


        </div>

        @endforeach


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

<footer style="background-color:rgb(61, 2, 2)">
    <p>&copy; 2026 HamroJiimma. All rights reserved.</p>
</footer>
</body>
</html>