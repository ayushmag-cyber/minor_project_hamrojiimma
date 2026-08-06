<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>eSewa Payment</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>
<body>

<div class="payment-container">
    <div class="esewa-card">
        <img src="{{ asset('esewa.png') }}" width="180">
        <h2> eSewa Payment</h2>

        <p>  HamroJiimma Service Booking Payment</p>

        <div class="amount-box">
            <h3>  Amount: Rs. {{ $booking->service->price }}</h3>
            <p> Service: {{ $booking->service->service_name }}</p>
        </div>
        <form action="{{ route('payment.success') }}" method="GET">

            <label> eSewa ID</label>
            <input type="text"name="esewa_id"placeholder="Enter eSewa mobile number"required
            >
            <label>Password</label>

            <input type="password"name="password"placeholder="Enter Password"required>

            <button type="submit" class="book-service-btn">
                Pay Rs. {{ $booking->service->price }}
            </button>
        </form>
    </div>
</div>

</body>

</html>