<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Payment Successful</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="payment-success">

        <h1> ✅ Payment Successful</h1>
          <p> Your HamroJiimma booking has been confirmed. </p>
       <a href="{{ url('/my-bookings') }}">
            Go to My Bookings
        </a>
    </div>

</body>

</html>