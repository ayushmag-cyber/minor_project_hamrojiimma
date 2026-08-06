<!DOCTYPE html>
<html>
<head>

    <title>Admin Profile</title>

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
        <a href="{{ url('/admin/providers') }}">
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

        <div class="admin-page">

            <h1>Admin Settings</h1>

            @if(session('success'))
                <div class="success-alert">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="error-alert">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="error-alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="profile-section">

                <div class="profile-right">


                   <h2>Edit Profile</h2>

<form action="{{ url('/admin/update-profile') }}" method="POST">

@csrf

<div class="input-box">
    <label>Name</label>
    <input type="text" 
           name="name" 
           value="{{ Auth::user()->name }}"
           required>
</div>


<div class="input-box">
    <label>Email</label>
    <input type="email" 
           name="email" 
           value="{{ Auth::user()->email }}"
           required>
</div>


<div class="input-box">
    <label>Role</label>
    <input type="text" 
           value="{{ ucfirst(Auth::user()->role) }}"
           readonly>
</div>


<button type="submit" class="booking-btn">
    Update Profile
</button>

</form>

                    <hr><br>

                    <h2>Change Password</h2>

                    <form action="{{ url('/admin/update-password') }}" method="POST">

                        @csrf

                        <div class="input-box">
                            <label>Current Password</label>
                            <input type="password"
                                   name="current_password"
                                   required>
                        </div>

                        <div class="input-box">
                            <label>New Password</label>
                            <input type="password"
                                   name="new_password"
                                   required>
                        </div>

                        <div class="input-box">
                            <label>Confirm New Password</label>
                            <input type="password"
                                   name="new_password_confirmation"
                                   required>
                        </div>

                        <button type="submit" class="booking-btn">
                            Update Password
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>