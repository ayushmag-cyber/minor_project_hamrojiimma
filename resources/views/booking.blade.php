<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HamroJiimma - About Us</title>

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
 
    @auth
    <div style="padding:20px;">
        <a href="{{ url('/dashboard') }}" class="booking-btn"> ← Back to Dashboard </a>
   </div>
   @endauth

    <!-- Booking Section -->

<section class="booking-section">

    <div class="booking-container">

        <div class="booking-header">
            <h1>Book a Service</h1>

            <p>
                Schedule trusted home care services with HamroJiimma in just a few clicks.
            </p>

            @if(session('success'))
                <div class="success-alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <form action="{{ url('/booking') }}" method="POST" class="booking-form">

            @csrf

            <div class="input-box">
                <label>Select Service</label>
                <select name="service_id" required>

    @foreach($services as $service)

    <option value="{{ $service->id }}"
        {{ $selectedService == $service->id ? 'selected' : '' }}>

        {{ $service->service_name }}

    </option>

    @endforeach

</select>
            </div>
            
            <div class="input-box">
    
                <label>Payment Method</label>
                    <select name="payment_method" required>
                    <option value="">Choose Payment Method</option>
                    <option value="Cash on Service">Cash on Service</option>
                    <option value="eSewa">eSewa</option>   
                    <option value="Khalti">Khalti</option>
   
                </select>
            </div>

            <div class="input-row">

                <div class="input-box">
                    <label>Booking Date</label>
                    <input type="date" id="booking_date" name="booking_date" required>
                </div>

                <div class="input-box">
                    <label>Booking Time</label>
                    <input type="time" name="booking_time" required>
                </div>

            </div>

            <div class="input-box">
                <label>Address</label>

                <textarea
                    name="address"
                    placeholder="Enter your full address..."
                    required></textarea>
            </div>
          
            <div class="input-box">
                    <label>Additional Details</label>
                    <textarea
                    name="message"
                rows="4"
                placeholder="Any special requirements? (Optional)">   
            </textarea>
        </div>

            <button type="submit" class="booking-btn">
                Book Now
            </button>

        </form>

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
    <footer>

        <p>
            &copy; 2026 HamroJiimma. All rights reserved.
        </p>

    </footer>
<script>
document.addEventListener("DOMContentLoaded", function () {
    let today = new Date().toISOString().split("T")[0];
    document.getElementById("booking_date").setAttribute("min", today);
});
</script>
</body>

</html>