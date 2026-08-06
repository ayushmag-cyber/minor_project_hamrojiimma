<!DOCTYPE html>
<html>
<head>

<title>Add Service</title>

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


<div class="service-form-container">

    <h1>Add New Service</h1>

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

    <form action="{{ route('admin.services.store') }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf

        <label>Service Name</label>

        <input type="text" name="service_name" placeholder="Enter service name"required>

        <label>Description</label>
        <textarea name="description" placeholder="Enter service description"required></textarea>

        <div class="form-group">
    <label>About This Service</label>

    <textarea
        name="about"
        rows="5"
        placeholder="Enter complete details about this service"
        required></textarea>
</div>

<div class="form-group">
    <label>Services Included</label>

    <textarea
        name="included_services"
        rows="6"
        placeholder="Write one service per line"
        required></textarea>
</div>

        <label>Price</label>

        <input type="number" name="price" placeholder="Enter price"required>

        <label>Status</label>

        <select name="status">

            <option value="Available">
                Available
            </option>

            <option value="Unavailable">
                Unavailable
            </option>

        </select>



        <label>Service Image</label>

        <input type="file" 
               name="image"
               required>

        <button type="submit">
            Add Service
        </button>
    </form>

</div>


</body>
</html>