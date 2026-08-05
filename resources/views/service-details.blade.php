@php
$title = $service->service_name;
$image = $service->image;
$price = "Rs. ".($service->price)." / Session";
$about = "";
$features = [];
$rating = "";
// Event price is not fixed
if($title == "Event Assistance"){
    $price = "Price Negotiable";

}

if($title == "Elder Care"){

    $about = "HamroJiimma Elder Care service provides compassionate and reliable support for senior citizens who need assistance with daily activities. Our trained caregivers focus on improving comfort, safety, and quality of life by offering personalized care in the familiar environment of their own home. We provide respectful assistance while ensuring elderly individuals feel valued, independent, and emotionally supported.";

    $features = [
        "Personal Hygiene & Daily Care Assistance",
        "Medication Reminder & Health Support",
        "Nutritious Meal Preparation",
        "Relaxing Body Massage",
        "Basic Physiotherapy Support",
        "Companionship & Emotional Support"
    ];
    $rating = "4.8";
}


elseif($title == "Child Care"){
    $about = "Our Child Care service provides a safe, caring, and supportive environment for children. We understand that every child needs attention, patience, and proper care. Our caregivers help children with their daily routines while supporting their growth, learning, and overall well-being.";
    $features = [
        "Diaper Changing & Personal Hygiene",
        "Feeding and Meal Assistance",
        "Playtime and Learning Activities",
        "Bathing and Daily Routine Support",
        "Child Supervision & Safety Monitoring",
        "Emotional Care and Companionship"
    ];
    $rating = "4.9";

}

elseif($title == "Motherhood Care"){

    $about = "HamroJiimma Motherhood Care service is designed to support new mothers during the important postnatal recovery period. We provide gentle care, comfort, and assistance to help mothers regain strength while receiving proper support for newborn care.";
    $features = [
        "Postnatal Massage for Relaxation",
        "Newborn Baby Care Assistance",
        "Feeding Support and Guidance",
        "Mother Recovery Support",
        "Rest and Daily Activity Assistance",
        "Emotional Support for New Mothers"
    ];
    $rating = "4.7";

}

elseif($title == "House Monitoring"){
    $about = "Our House Monitoring service helps keep your home safe and maintained when you are away. We provide regular checking, observation, and updates so you can have peace of mind knowing your property is being monitored.";

    $features = [
        "Regular House Inspection",
        "Security Checking",
        "Home Condition Updates",
        "Basic Maintenance Reporting",
        "Cleanliness Monitoring"
    ];
    $rating = "4.6";

}

elseif($title == "Event Assistance"){

    $about = "HamroJiimma Event Assistance service provides reliable support for managing small and personal events such as birthday celebrations, puja ceremonies, family gatherings, and special occasions. Our team helps with event preparation, arrangements, and coordination to make your event smooth, organized, and stress-free. We focus on providing friendly assistance so you can enjoy your special moments while we take care of the necessary arrangements.";

    $features = [
        "Birthday Event Support",
        "Puja & Religious Event Assistance",
        "Small Family Gathering Management",
        "Decoration and Setup Support",
        "Guest Coordination",
        "Event Arrangement Assistance"
    ];

    $rating = "4.8";

}
@endphp

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HamroJiimma - Services</title>
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
            <i class='bx bx-info-circle'></i> About Us</a>
    </li>

    <li>
        <a href="{{ url('/services') }}" class="services-btn">
            <i class='bx bx-briefcase-alt'></i> Services</a>
    </li>

    <li>
        <a href="{{ url('/reviews') }}" class="review-btn">
            <i class='bx bx-star'></i> Review </a>
    </li>

    @guest
    <li>
        <a href="{{ url('/login') }}" class="login-btn">
            <i class='bx bx-user'></i> Login</a>
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
<!-- Service Details -->

<section class="service-details">

    <div class="service-banner">
      
        <div class="service-image">   
            <img src="{{ asset($service->image) }}" alt="{{ $title }}">
        </div>

        <div class="service-info">

            <h1>{{ $title }}</h1>

            <p class="service-tagline">
                Compassionate and professional care for your loved ones.
            </p>

            <div class="rating">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>

                <span>4.8 (120 Reviews)</span>
            </div>
     
                <div class="price-box">   
                <span>Service Charge</span>
                <h3>{{ $price }}</h3>
            </div>

            <a href="{{ url('/booking') }}" class="book-service-btn">
                Book This Service
            </a>

        </div>

    </div>

    <div class="service-content">

        <div class="about-service">

            <h2>About This Service</h2>

            <p>{{ $about }}</p>
        </div>

        <div class="service-features">

            <h2>Services Included</h2>
            
            <ul>
                @foreach($features as $feature)
                <li>
                    <i class='bx bx-check-circle'></i>
                    {{ trim($feature) }}  
                </li>
   
                @endforeach
            </ul>

        </div>

        <div class="why-us">

            <h2>Why Choose HamroJiimma?</h2>

            <div class="why-grid">

                <div class="why-card">
                    <i class='bx bx-user-check'></i>
                    <h3>Verified Caregivers</h3>
                    <p>Experienced and background-verified professionals.</p>
                </div>

                <div class="why-card">
                    <i class='bx bx-shield'></i>
                    <h3>Safe & Trusted</h3>
                    <p>Your family's safety is always our priority.</p>
                </div>

                <div class="why-card">
                    <i class='bx bx-time-five'></i>
                    <h3>Flexible Timing</h3>
                    <p>Choose a schedule that fits your needs.</p>
                </div>

                <div class="why-card">
                    <i class='bx bx-support'></i>
                    <h3>24/7 Support</h3>
                    <p>Our support team is always ready to help.</p>
                </div>

            </div>

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