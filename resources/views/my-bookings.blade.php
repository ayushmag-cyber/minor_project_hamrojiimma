<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Bookings</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>

<body>

<div class="dashboard">

    <!-- Sidebar -->

    <div class="sidebar">
            <i class="bx bx-menu menu-btn"></i>

        <a href="{{ url('/') }}">
  <img src="{{ asset('logo1.png') }}" alt="HamroJiimma Services" width="150" height="100">
    </a>

        <a href="{{ url('/dashboard') }}">
            <i class='bx bxs-dashboard'></i>
            Dashboard
        </a>

        <a href="{{ url('/booking') }}">
            <i class='bx bx-calendar-plus'></i>
            Book Service
        </a>

        <a class="active" href="{{ url('/my-bookings') }}">
            <i class='bx bx-book-content'></i>
            My Bookings
        </a>

        <a href="{{ url('/services') }}">
            <i class='bx bx-briefcase'></i>
            Services
        </a>

        <a href="{{ url('/reviews') }}">
            <i class='bx bx-star'></i>
            Reviews
        </a>

        <a href="{{ url('/contact') }}">
            <i class='bx bx-phone'></i>
            Contact
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

        <h1>My Bookings</h1>

        <br>

        <table class="booking-table">

            <thead>

                <tr>

                    <th>Service</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Address</th>
                    <th>Payment</th>
                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

            @forelse($bookings as $booking)

                <tr>

                    <td>{{ $booking->service->service_name }}</td>

                    <td>{{ $booking->booking_date }}</td>

                    <td>{{ $booking->booking_time }}</td>

                    <td>{{ $booking->address }}</td>

                    <td> {{ $booking->payment_method }}</td>


                   <td>
                           @if($booking->status == 'Pending') 
                        <span class="status pending">Pending</span>
  
                        @elseif($booking->status == 'Approved')
                          <span class="status approved">Approved</span>

                          @elseif($booking->status == 'Completed')
                          <span class="status completed">Completed</span>

                          @else
                          <span class="status cancelled">Cancelled</span>
                        @endif
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" style="text-align:center">

                        No bookings found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>