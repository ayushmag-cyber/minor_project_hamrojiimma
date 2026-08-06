<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Bookings</title>

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

        <div class="admin-page">

            <h1>Manage Bookings</h1>

            @if(session('success'))
                <p style="color:green;">
                    {{ session('success') }}
                </p>
            @endif

            <a href="{{ url('/admin') }}" class="back-btn">
                ← Back to Dashboard
            </a>

            <table class="user-table">

                <thead>

                <tr>

                    <th>User</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Address</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

                </thead>

                <tbody>

                @foreach($bookings as $booking)

                <tr>

                    <td>{{ $booking->user->name }}</td>

                    <td>{{ $booking->service->service_name }}</td>

                    <td>{{ $booking->booking_date }}</td>

                    <td>{{ $booking->booking_time }}</td>

                    <td>{{ $booking->address }}</td>

                    <td>{{ $booking->payment_method }}</td>

                    <td>

                        @if($booking->status=="Pending")

                            <span class="booking-status status-pending">
                                Pending
                            </span>

                        @elseif($booking->status=="Approved")

                            <span class="booking-status status-approved">
                                Approved
                            </span>

                        @elseif($booking->status=="Completed")

                            <span class="booking-status status-completed">
                                Completed
                            </span>

                        @else

                            <span class="booking-status status-cancelled">
                                Cancelled
                            </span>

                        @endif

                    </td>

                    <td>

                        @if($booking->status=="Pending")

                        <form action="{{ route('booking.approve',$booking->id) }}" method="POST">

                            @csrf

                            <select name="provider_id" required>

                                <option value="">Select Provider</option>

                                @foreach($providers as $provider)

                                    <option value="{{ $provider->id }}">
                                        {{ $provider->name }}
                                    </option>

                                @endforeach

                            </select>

                            <br><br>

                            <button type="submit" class="action-btn approve-btn">
                                Approve
                            </button>

                        </form>

                        <br>

                        <a href="{{ url('/booking/cancel/'.$booking->id) }}"
                           class="action-btn cancel-btn">
                            Cancel
                        </a>

                        @elseif($booking->status=="Approved")

                            <a href="{{ url('/booking/complete/'.$booking->id) }}"
                               class="action-btn complete-btn">
                                Complete
                            </a>

                            <a href="{{ url('/booking/cancel/'.$booking->id) }}"
                               class="action-btn cancel-btn">
                                Cancel
                            </a>

                        @elseif($booking->status=="Completed")

                            <span class="completed-text">
                                Completed
                            </span>

                        @else

                            <span class="cancelled-text">
                                Cancelled
                            </span>

                        @endif

                    </td>

                </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>