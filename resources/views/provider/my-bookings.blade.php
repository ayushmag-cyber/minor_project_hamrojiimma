<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Bookings - HamroJiimma</title>

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

    <div class="main-content">

        <div class="top-bar">

            <h1>My Bookings</h1>

            <p>View accepted service requests and customer details.</p>

        </div>

        <div class="dashboard-cards">

            @forelse($bookings as $booking)
            <div class="card">

                <i class='bx bx-briefcase'></i>

                <h3>{{ $booking->service->service_name }}</h3><br>

                <h4>Customer Details</h4>

                <p>
                    <strong>Name:</strong>
                    {{ $booking->user->name }}
                </p>

                <p>
                    <strong>Email:</strong>
                    {{ $booking->user->email }}
                </p>

                <p>
                    <strong>Phone:</strong>
                    {{ $booking->user->phone }}
                </p><br>

                <h4>
                    Booking Details
                </h4>

                <p>
                    <strong>Date:</strong>
                    {{ $booking->booking_date }}
                </p>

                <p>
                    <strong>Time:</strong>
                    {{ $booking->booking_time }}
                </p>

                <p>
                    <strong>Address:</strong>
                    {{ $booking->address }}
                </p>

                <p>
                    <strong>Status:</strong>
                    {{ $booking->status }}
                </p>

            </div>

            @empty

            <div class="card">

                <h3>
                    No Accepted Bookings
                </h3>

                <p>
                    You have not accepted any service request yet.
                </p>

            </div>

            @endforelse
        </div>
    </div>

</div>

</body>

</html>