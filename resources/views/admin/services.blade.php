<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Services</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>

<body>

<div class="dashboard">

    <!-- Sidebar -->
    <div class="sidebar">

        <i class="bx bx-menu menu-btn"></i>

        <!-- Logo -->
        <a href="{{ url('/') }}">
            <img src="{{ asset('logo1.png') }}" width="150" height="100">
        </a>

        <!-- Dashboard -->
        <a href="{{ url('/admin') }}">
            <i class='bx bxs-dashboard'></i>
            <span>Dashboard</span>
        </a>

        <!-- Users -->
        <a href="{{ url('/admin/users') }}">
            <i class='bx bx-user'></i>
            <span>Users</span>
        </a>

        <!-- Services -->
        <a href="{{ url('/admin/services') }}" class="active">
            <i class='bx bx-briefcase'></i>
            <span>Services</span>
        </a>

        <!-- Bookings -->
        <a href="{{ url('/admin/bookings') }}">
            <i class='bx bx-calendar-check'></i>
            <span>Bookings</span>
        </a>

        <!-- Reviews -->
        <a href="{{ url('/admin/reviews') }}">
            <i class='bx bx-star'></i>
            <span>Reviews</span>
        </a>

        <!-- Settings -->
        <a href="{{ url('/admin/settings') }}">
            <i class='bx bx-cog'></i>
            <span>Settings</span>
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

    <!-- Main Content -->
    <div class="main-content">

        <h1>Manage Services</h1>

        <table class="user-table">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Service</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

            @foreach($services as $service)

                <tr>

                    <td>{{ $service->id }}</td>

                    <td>

                        @if($service->image)

                            <img src="{{ asset($service->image) }}" class="service-img">

                        @else

                            No Image

                        @endif

                    </td>

                    <td>{{ $service->service_name }}</td>

                    <td>{{ $service->description }}</td>

                    <td>Rs. {{ number_format($service->price,2) }}</td>

                    <td>

                        @if($service->status == "Available")

                            <span class="status-available">
                                Available
                            </span>

                        @else

                            <span class="status-unavailable">
                                Unavailable
                            </span>

                        @endif

                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>

    </div>

</div>

</body>
</html>