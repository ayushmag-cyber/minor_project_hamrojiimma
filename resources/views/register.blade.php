<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HamroJiimma - Register</title>

    <link rel="stylesheet" href="style.css">

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


    <i class="bx bx-menu menu-btn" id="menu-btn"></i>

</nav>

<div class="wrapper-login">

    <h2>Create Account</h2>
    @if ($errors->any())
    <div style="color:red; margin-bottom:15px;">

        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ url('/register') }}" method="POST">
    @csrf
        <!-- Full Name -->
        <div class="input-box">
            <span class="icon">
                <i class='bx bx-user'></i>
            </span>

            <input type="text" name="name" placeholder="Full Name" required>
        </div>

        <!-- Email -->
        <div class="input-box">
            <span class="icon">
                <i class='bx bx-envelope'></i>
            </span>
            <input type="email" name="email" placeholder="Email Address" required>
        </div>

        <!-- Phone -->
        <div class="input-box">
            <span class="icon">
                <i class='bx bx-phone'></i>
            </span>
            <input type="tel" name="phone" placeholder="Phone Number" required>
        </div>

        <!-- Password -->
        <div class="input-box">
            <span class="icon">
                <i class='bx bx-lock'></i>
            </span>
            <input type="password" name="password" placeholder="Create Password" required>       
        </div>

        <!-- Confirm Password -->
        <div class="input-box">
            <span class="icon">
                <i class='bx bx-lock-alt'></i>
            </span>

            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>

        <!-- Terms -->
        <div class="remember-forget">
            <label>
                <input type="checkbox" required>
                I agree to the Terms & Conditions
            </label>
        </div>

        <!-- Register Button -->
        <button type="submit" class="btn">
            Register
        </button>

        <div id="register-message"
             style="display:none; color:green; text-align:center; margin-top:15px; font-weight:bold;">
        </div>

        <!-- Login Link -->
        <div class="register-link">
            <p>
                Already have an account?
                <a href="{{ url('/login') }}">Login</a>
            </p>
        </div>

    </form>

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