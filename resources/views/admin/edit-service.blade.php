<!DOCTYPE html>
<html>
<head>

<title>Edit Service</title>

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


<div class="service-form-container">

    <h1>Edit Service</h1>


    @if(session('success'))

    <p style="color:green;">
        {{ session('success') }}
    </p>

    @endif


    @if($errors->any())

        @foreach($errors->all() as $error)

        <p style="color:red;">
            {{ $error }}
        </p>

        @endforeach

    @endif

    <form action="{{ route('admin.services.update',$service->id) }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf

        @method('PUT')

        <label>Service Name</label>

        <input type="text"name="service_name"value="{{ $service->service_name }}"required>


        <label>Description</label>

        <textarea name="description" required>{{ $service->description }}</textarea>

        <label>Price</label>

        <input type="number"name="price"value="{{ $service->price }}"required>

        <label>Status</label>

        <select name="status">

            <option value="Available"
            @if($service->status == 'Available')
                selected
            @endif>
                Available
            </option>

            <option value="Unavailable"
            @if($service->status == 'Unavailable')
                selected
            @endif>
                Unavailable
            </option>


        </select>

        <label>Current Image</label>

        @if($service->image)

            <br>

            <img src="{{ asset($service->image) }}" 
                 width="150"
                 height="120">

            <br>

        @else

            <p>No image</p>

        @endif

        <label>Change Image</label>
        <input type="file" name="image">
        <button type="submit">
            Update Service
        </button>

    </form>

</div>

</body>
</html>