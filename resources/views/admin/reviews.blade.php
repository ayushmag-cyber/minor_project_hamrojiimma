<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Reviews</title>

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

        <h1>Customer Reviews</h1>

        <table class="user-table">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Review</th>
                    <th>Rating</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

            @foreach($reviews as $review)

                <tr>
                    <td>{{ $review->id }}</td>
                    <td>
                            @if($review->user && $review->user->profile_photo)
                            <img src="{{ asset('profile_photos/' . $review->user->profile_photo) }}"class="review-img"alt="Profile">
                            @else
                            No Image   
                        @endif
                    </td>
   
                     <td>{{ $review->name }}</td>
                       <td>{{ $review->review }}</td>

                       <td>
                           <span class="review-rating">
                               ⭐ {{ $review->rating }}/5
                           </span>
                       </td>
   
                    <td>  
                        <form action="{{ route('admin.review.delete',$review->id) }}" method="POST">
                            @csrf
   
                            @method('DELETE')

                               <button type="submit" class="btn"  
                            onclick="return confirm('Delete this review?')">
   
                            <i class='bx bx-trash'></i>
                               Delete  
                        </button>
   
                    </form>
  
                </td>  
            </tr>
   
            @endforeach
  
        </tbody>

        </table>

    </div>

</div>

</body>
</html>