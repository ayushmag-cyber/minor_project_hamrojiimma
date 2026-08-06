<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Provider - HamroJiimma</title>

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

        <a href="{{ url('/admin') }}">
            <i class='bx bxs-dashboard'></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ url('/admin/users') }}">
            <i class='bx bx-user'></i>
            <span>Users</span>
        </a>

        <a href="{{ url('/admin/providers') }}" class="active">
            <i class='bx bx-user-plus'></i>
            <span>Service Providers</span>
        </a>

        <a href="{{ url('/admin/services') }}">
            <i class='bx bx-briefcase'></i>
            <span>Services</span>
        </a>

        <a href="{{ url('/admin/bookings') }}">
            <i class='bx bx-calendar-check'></i>
            <span>Bookings</span>
        </a>

        <a href="{{ url('/admin/reviews') }}">
            <i class='bx bx-star'></i>
            <span>Reviews</span>
        </a>

        <a href="{{ url('/admin/settings') }}">
            <i class='bx bx-cog'></i>
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

            <h1>Add Service Provider</h1>

            <p>Create a new provider account.</p>

        </div>

        @if($errors->any())

            <div style="color:red; margin-bottom:20px;">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('admin.providers.store') }}" method="POST" class="booking-form">

            @csrf

            <div class="form-group">

                <label>Full Name</label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>Phone Number</label>

                <input
                    type="text"
                    name="phone"
                    value="{{ old('phone') }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    required
                >

            </div>

            <button type="submit" class="card-btn">

                Add Provider

            </button>

            <a href="{{ route('admin.providers') }}" class="card-btn">

                Back

            </a>

        </form>

    </div>

</div>

</body>

</html>