<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Provider Services - HamroJiimma</title>

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
                Available Services
            </h1>
            <p>
                View and manage services you provide.
            </p>

        </div>

        <div class="dashboard-cards">

            @forelse($services as $service)

            <div class="card service-card">

                <div class="service-icon">
                    <i class='bx bx-briefcase'></i>
                </div>
                <h3>
                    {{ $service->service_name }}
                </h3>
                <p>
                    {{ $service->description }}
                </p>

                <p class="service-price">
                    Price:
                    {{ $service->price ?? 'Not Available' }}
                </p>

                <a href="#" class="card-btn">
                    Manage
                </a>
            </div>
            @empty
            <div class="card">
                <h3>
                    No Services Available
                </h3>

                <p>
                    No services have been added yet.
                </p>

            </div>
            @endforelse
        </div>

    </div>

</div>

</body>

</html>