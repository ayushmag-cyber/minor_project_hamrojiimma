<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Profile - HamroJiimma</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>

<body>

<div class="dashboard">

    <!-- Sidebar -->
    <div class="sidebar">

        <a href="{{ url('/') }}">
            <img src="{{ asset('logo1.png') }}" width="150" height="100">
        </a>

        <a href="{{ url('/provider') }}">
            <i class='bx bxs-dashboard'></i>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('provider.profile') }}" class="active">
            <i class='bx bx-user'></i>
            <span>Profile</span>
        </a>

        <a href="{{ url('/provider/my-bookings') }}">
            <i class='bx bx-calendar-check'></i>
            <span>My Bookings</span>
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
                Edit Profile ✏️
            </h1>
            <p>
                Update your provider information.
            </p>
        </div>

        <div class="card profile-edit-card">

            <form action="{{ route('provider.profile.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <!-- Profile Photo -->

                <div class="profile-photo-section">

                    @if($provider->profile_photo)

                        <img src="{{ asset($provider->profile_photo) }}"
                             class="profile-photo">

                    @else

                       <i class='bx bx-user profile-icon'></i>

                    @endif

                    <input type="file"
                           name="profile_photo">

                </div>

                <!-- Name -->

                <label>
                    Name
                </label>

                <input type="text"name="name"value="{{ $provider->name }}">

                <!-- Email -->
                <label>
                    Email
                </label>

                <input type="email"
                       name="email"
                       value="{{ $provider->email }}">

                <!-- Phone -->
                <label>
                    Phone
                </label>

                <input type="text"name="phone"value="{{ $provider->phone }}">

                              <button class="card-btn">

                    Save Changes

                </button>

            </form>
       </div>

    </div>

</div>

</body>

</html>