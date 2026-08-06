<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Provider Bookings - HamroJiimma</title>

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
            <h1>Booking Requests 📅</h1>

            <p>Manage customer service requests.</p>
        </div>

        <div class="dashboard-cards">

            @forelse($bookings as $booking)

            <div class="card service-card">
                <div class="service-top">
                    <div class="service-icon">
                        <i class='bx bx-briefcase'></i>
                    </div>
                    <span class="service-status">
                        {{ $booking->status }}
                    </span>
                </div>

                <h3>
                    {{ $booking->service->service_name }}
                </h3>

                <p class="service-description">
                    {{ $booking->service->description }}
                </p>

                <div class="service-info">
                    <p>
                        <i class='bx bx-user'></i>
                        Customer:
                        <strong>
                            {{ $booking->user->name }}
                        </strong>
                    </p>
                    <p>
                        <i class='bx bx-phone'></i>
                        Phone:
                        <strong>
                            {{ $booking->user->phone }}
                        </strong>
                    </p>
                    <p>
                        <i class='bx bx-envelope'></i>
                        Email:
                        <strong>
                            {{ $booking->user->email }}
                        </strong>
                    </p>

                    <p>
                        <i class='bx bx-calendar'></i>
                        Date:
                        <strong>
                            {{ $booking->booking_date }}
                        </strong>
                    </p>

                    <p>
                        <i class='bx bx-time'></i>
                        Time:
                        <strong>
                            {{ $booking->booking_time }}
                        </strong>
                    </p>
                    <p>
                        <i class='bx bx-map'></i>
                        Address:
                        <strong>
                            {{ $booking->address }}
                        </strong>
                    </p>
                </div>

                <div class="booking-actions">
                    @if($booking->status == 'Pending')

                    <form action="{{ route('provider.accept',$booking->id) }}" method="POST">
                        @csrf
                        <button class="accept-btn">
                            Accept
                        </button>
                    </form>
                    @endif
                    @if($booking->status == 'Approved')

                    <form action="{{ route('provider.complete',$booking->id) }}" method="POST">

                        @csrf

                        <button class="complete-btn">
                            Complete
                        </button>

                    </form>
                    @endif

                   @if($booking->status != 'Completed' && $booking->status != 'Cancelled')
                    <form action="{{ route('provider.cancel',$booking->id) }}" method="POST">

                        @csrf

                        <button class="cancel-btn">
                            Cancel
                        </button>
                    </form>
                    @endif

                </div>

            </div>
            @empty

            <div class="card">

                <h3>No Booking Requests
</h3>

                <p>  No customers have requested your services yet.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

</body>

</html>