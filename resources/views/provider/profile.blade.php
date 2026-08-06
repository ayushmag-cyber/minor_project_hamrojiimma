<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Provider Profile - HamroJiimma</title>

<link rel="stylesheet" href="{{ asset('style.css') }}">
<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>

<body>

<div class="dashboard">

    <!-- Sidebar -->

    <div class="sidebar">

        <i class="bx bx-menu menu-btn"></i>

        <a href="{{ url('/') }}">
            <img src="{{ asset('logo1.png') }}" width="150" height="100">
        </a>

        <a href="{{ url('/provider') }}">
            <i class='bx bxs-dashboard'></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ url('/provider/services') }}">
            <i class='bx bx-briefcase'></i>
            <span>Services</span>
        </a>

        <a href="{{ url('/provider/my-bookings') }}">
            <i class='bx bx-calendar-check'></i>
            <span>My Bookings</span>
        </a>

        <a href="{{ url('/provider/bookings') }}">
            <i class='bx bx-calendar-check'></i>
            <span>Bookings</span>
        </a>

        <a href="{{ route('provider.profile') }}" class="active">
            <i class='bx bx-user'></i>
            <span>Profile</span>
        </a>

        <form action="{{ url('/logout') }}" method="POST">
            @csrf

            <button class="logout-btn">
                <i class='bx bx-log-out'></i>
                Logout
            </button>

        </form>

    </div>


    <!-- Main Content -->

    <div class="main-content">

        <div class="top-bar">

            <h1>My Profile 👤</h1>

            <p>
                Manage your provider information.
            </p>

        </div>


        <div class="profile-card">


            <div class="profile-image">

                @if($provider->profile_photo)

                    <img src="{{ asset($provider->profile_photo) }}"
                    width="130"
                    height="130"
                    style="border-radius:50%; object-fit:cover;">

                @else

                    <i class='bx bx-user'></i>

                @endif

            </div>


            <h2>
                {{ $provider->name }}
            </h2>


            <div class="profile-info">

                <p>
                    <i class='bx bx-envelope'></i>
                    {{ $provider->email }}
                </p>

                <p>
                    <i class='bx bx-phone'></i>
                    {{ $provider->phone }}
                </p>

                <p>
                    <i class='bx bx-user-check'></i>
                    Role: Provider
                </p>

                <p>
                    <i class='bx bx-calendar-check'></i>
                    Total Bookings: {{ $totalBookings }}
                </p>

                <p>
                    <i class='bx bx-check-circle'></i>
                    Completed: {{ $completedBookings }}
                </p>

            </div>


            <a href="{{ route('provider.profile.edit') }}" class="card-btn">
                Edit Profile
            </a>


        </div>

    </div>

</div>

</body>

</html>