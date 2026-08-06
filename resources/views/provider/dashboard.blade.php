<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Provider Dashboard - HamroJiimma</title>

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

        <a href="{{ url('/provider') }}" class="active">
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

        <a href="{{ route('provider.profile') }}">
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

            <h1>
                Welcome Provider, {{ Auth::user()->name }} 👋
            </h1>

            <p>
                Manage your services and customer bookings.
            </p>

        </div>


        <!-- Dashboard Cards -->

        <div class="dashboard-cards">

            <div class="card">

                <i class='bx bx-briefcase'></i>

                <h3>
                    Total Services
                </h3>

                <h2>
                    {{ \App\Models\Service::count() }}
                </h2>

                <a href="{{ url('/provider/services') }}" class="card-btn">
                    View
                </a>

            </div>


            <div class="card">

                <i class='bx bx-calendar-check'></i>

                <h3>
                    Total Bookings
                </h3>

                <h2>
                    {{ \App\Models\Booking::count() }}
                </h2>

                <a href="{{ url('/provider/bookings') }}" class="card-btn">
                    Manage
                </a>

            </div>


            <div class="card">

                <i class='bx bx-time'></i>

                <h3>
                    Pending Requests
                </h3>

                <h2>
                    {{ \App\Models\Booking::where('status','Pending')->count() }}
                </h2>

                <a href="{{ url('/provider/bookings') }}" class="card-btn">
                    Check
                </a>

            </div>


            <div class="card">

                <i class='bx bx-check-circle'></i>

                <h3>
                    Completed Jobs
                </h3>

                <h2>
                    {{ \App\Models\Booking::where('status','Completed')->count() }}
                </h2>

                <a href="{{ url('/provider/bookings') }}" class="card-btn">
                    View
                </a>

            </div>

        </div>


        <!-- Provider Panel -->

        <div class="profile-section">

            <div class="profile-right">

                <h2>
                    Provider Control Panel
                </h2>

                <p>
                    ✔ View available services
                </p>

                <p>
                    ✔ Accept customer bookings
                </p>

                <p>
                    ✔ Reject unwanted requests
                </p>

                <p>
                    ✔ Manage completed services
                </p>

            </div>

        </div>

    </div>

</div>

</body>
</html>