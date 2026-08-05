<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - HamroJiimma</title>

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

        <a href="{{ url('/admin/settings') }}" class="active">
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

<h1>
Welcome Admin, {{ Auth::user()->name }} 👋
</h1>

<p>
Manage HamroJiimma services, users and bookings.
</p>


</div>



<!-- Statistics Cards -->

<div class="dashboard-cards">


<div class="card">

<i class='bx bx-user'></i>

<h3>Total Users</h3>

<h2>
{{ \App\Models\User::count() }}
</h2>

<a href="{{ url('/admin/users') }}" class="card-btn">
Manage
</a>

</div>




<div class="card">

<i class='bx bx-briefcase'></i>

<h3>Total Services</h3>

<h2>
{{ \App\Models\Service::count() }}
</h2>

<a href="{{ url('/admin/services') }}" class="card-btn">
Manage
</a>

</div>




<div class="card">

<i class='bx bx-calendar'></i>

<h3>Total Bookings</h3>

<h2>
{{ \App\Models\Booking::count() }}
</h2>

<a href="{{ url('/admin/bookings') }}" class="card-btn">
View
</a>

</div>



<div class="card">

<i class='bx bx-time'></i>

<h3>Pending Requests</h3>

<h2>
{{ \App\Models\Booking::where('status','Pending')->count() }}
</h2>


<a href="{{ url('/admin/bookings') }}" class="card-btn">
Check
</a>


</div>


</div>



<!-- Recent Activity -->

<div class="profile-section">


<div class="profile-right">

<h2>
Admin Control Panel
</h2>


<p>
✔ Manage registered users
</p>

<p>
✔ Approve or cancel bookings
</p>

<p>
✔ Add and update services
</p>

<p>
✔ Monitor customer reviews
</p>


</div>


</div>



</div>


</div>


</body>
</html>