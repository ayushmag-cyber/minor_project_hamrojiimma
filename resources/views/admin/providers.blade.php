<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Service Providers</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}?v={{ time() }}">
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

        <h1>Service Providers</h1>

        <a href="{{ route('admin.providers.create') }}" class="card-btn">
            + Add Provider
        </a>

        <br><br>

        <table class="user-table">

            <thead>

            <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>   
                <th>Action</th>
            </tr>

            </thead>

            <tbody>

@foreach($providers as $provider)

<tr>

    <td>{{ $provider->id }}</td>

    <td>{{ $provider->name }}</td>

    <td>{{ $provider->email }}</td>

    <td>{{ $provider->phone }}</td>

    <td>
        <span class="status-available">
            {{ ucfirst($provider->role) }}
        </span>
    </td>

    <td>

        <a href="#" class="btn">
            Edit
        </a>

        <a href="#" class="btn">
            Delete
        </a>

    </td>

</tr>

@endforeach

</tbody>
        </table>
   
    </div>

</div>

</body>
</html>