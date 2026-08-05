<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HamroJiimma Dashboard</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <script src="{{ asset('app.js') }}" defer></script>
</head>

<body>

<div class="dashboard">

    <!-- Sidebar -->
<div class="sidebar">
    
    <i class="bx bx-menu menu-btn" id="menu-btn"></i>
    <!-- Logo -->
    <a href="{{ url('/') }}">
        <img src="{{ asset('logo1.png') }}" alt="HamroJiimma Services" width="150" height="100">
    </a>

    <!-- Dashboard -->
    <a href="{{ url('/dashboard') }}" class="active">
        <i class='bx bxs-dashboard'></i>
        <span>Dashboard</span>
    </a>

    <!-- Home -->
    <a href="{{ url('/') }}">
        <i class='bx bx-home'></i>
        <span>Home</span>
    </a>

    <!-- About -->
    <a href="{{ url('/about') }}">
        <i class='bx bx-info-circle'></i>
        <span>About Us</span>
    </a>

    <!-- Book Service -->
    <a href="{{ url('/booking') }}">
        <i class='bx bx-calendar-plus'></i>
        <span>Book Service</span>
    </a>

    <!-- My Bookings -->
    <a href="{{ url('/my-bookings') }}">
        <i class='bx bx-book-content'></i>
        <span>My Bookings</span>
    </a>

    <!-- Services -->
    <a href="{{ url('/services') }}">
        <i class='bx bx-briefcase'></i>
        <span>Services</span>
    </a>

    <!-- Reviews -->
    <a href="{{ url('/reviews') }}">
        <i class='bx bx-star'></i>
        <span>Reviews</span>
    </a>

    <!-- Contact -->
    <a href="{{ url('/contact') }}">
        <i class='bx bx-phone'></i>
        <span>Contact</span>
    </a>

    <!-- Logout -->
    <form action="{{ url('/logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">
            <i class='bx bx-log-out'></i>
            Logout
        </button>
    </form>

</div>

<div class="main-content">

    <!-- Welcome -->
  <div class="top-bar">

    <div>
        <h1>Welcome Back, {{ Auth::user()->name }} 👋</h1>
        <p>Manage your bookings and services easily.</p>
    </div>

    <button id="theme-toggle" class="theme-toggle">
        <i class='bx bx-moon'></i>
    </button>

</div>


<!-- Profile Section -->
<div class="profile-section">

    <!-- Left Side -->
    <div class="profile-image">

        @if(Auth::user()->profile_photo)
            <img src="{{ asset('profile_photos/'.Auth::user()->profile_photo) }}" class="profile-pic">
        @else
            <i class='bx bxs-user-circle profile-icon'></i>
        @endif

    </div>

    <!-- Right Side -->
    <div class="profile-right">

        <!-- Normal Profile -->
        <div id="profileView">

            <h2>My Profile</h2>

            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>

            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>

            <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>

            <br>

            <button type="button" class="card-btn" id="editBtn">
                Edit Profile
            </button>

        </div>

        <!-- Edit Form -->
        <form id="editForm"
              action="{{ url('/profile/update') }}"
              method="POST"
              enctype="multipart/form-data"
              style="display:none;">

            @csrf

            <h2>Edit Profile</h2>

            <label>Name</label>

            <input type="text"
                   name="name"
                   value="{{ Auth::user()->name }}"
                   class="profile-input">

            <label>Email</label>

            <input type="email"
                   name="email"
                   value="{{ Auth::user()->email }}"
                   class="profile-input">

            <label>Phone</label>

            <input type="text"
                   name="phone"
                   value="{{ Auth::user()->phone }}"
                   class="profile-input">

            <label class="upload-btn" for="photoUpload">
                <i class='bx bx-camera'></i>
                Change Profile Picture
            </label>

            <input type="file"
                   id="photoUpload"
                   name="profile_photo"
                   hidden>

            <br><br>

            <button type="submit" class="card-btn">
                Save Changes
            </button>

            <button type="button"
                    class="card-btn"
                    id="cancelBtn">
                Cancel
            </button>

        </form>

    </div>

</div>
    <!-- Dashboard Cards -->
    <div class="dashboard-cards">

        <div class="card">
            <i class='bx bx-calendar-check'></i>
            <h3>Book Service</h3>
            <p>Book trusted professionals instantly.</p>
            <a href="{{ url('/booking') }}" class="card-btn">
                Book Now
            </a>
        </div>

        <div class="card">
            <i class='bx bx-book-content'></i>
            <h3>My Bookings</h3>
            <p>Track all your bookings.</p>
            <a href="{{ url('/my-bookings') }}" class="card-btn">
                View
            </a>
        </div>

        <div class="card">
            <i class='bx bx-star'></i>
            <h3>Reviews</h3>
            <p>Share your experience.</p>
            <a href="{{ url('/reviews') }}" class="card-btn">
                Review
            </a>
        </div>
    </div>
</div>

<script>
const editBtn = document.getElementById("editBtn");
const cancelBtn = document.getElementById("cancelBtn");

if (editBtn && cancelBtn) {

    editBtn.addEventListener("click", function () {

        document.getElementById("profileView").style.display = "none";
        document.getElementById("editForm").style.display = "block";

    });

    cancelBtn.addEventListener("click", function () {

        document.getElementById("editForm").style.display = "none";
        document.getElementById("profileView").style.display = "block";

    });

}
</script>

</body>
</html>
