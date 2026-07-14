<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HamroJiimma - Register</title>

    <link rel="stylesheet" href="style.css">

    <!-- Boxicons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>

<div class="wrapper-login">

    <h2>Create Account</h2>

    <form id="register-form">

        <!-- Full Name -->
        <div class="input-box">
            <span class="icon">
                <i class='bx bx-user'></i>
            </span>

            <input type="text" placeholder="Full Name" required>
        </div>

        <!-- Email -->
        <div class="input-box">
            <span class="icon">
                <i class='bx bx-envelope'></i>
            </span>

            <input type="email" placeholder="Email Address" required>
        </div>

        <!-- Phone -->
        <div class="input-box">
            <span class="icon">
                <i class='bx bx-phone'></i>
            </span>

            <input type="tel" placeholder="Phone Number" required>
        </div>

        <!-- Password -->
        <div class="input-box">
            <span class="icon">
                <i class='bx bx-lock'></i>
            </span>

            <input type="password" placeholder="Create Password" required>
        </div>

        <!-- Confirm Password -->
        <div class="input-box">
            <span class="icon">
                <i class='bx bx-lock-alt'></i>
            </span>

            <input type="password" placeholder="Confirm Password" required>
        </div>

        <!-- Terms -->
        <div class="remember-forget">
            <label>
                <input type="checkbox" required>
                I agree to the Terms & Conditions
            </label>
        </div>

        <!-- Register Button -->
        <button type="submit" class="btn">
            Register
        </button>

        <div id="register-message"
             style="display:none; color:green; text-align:center; margin-top:15px; font-weight:bold;">
        </div>

        <!-- Login Link -->
        <div class="register-link">
            <p>
                Already have an account?
                <a href="login.html">Login</a>
            </p>
        </div>

    </form>

</div>

<script>
document.getElementById("register-form").addEventListener("submit", function(e){

    e.preventDefault();

    document.getElementById("register-message").style.display="block";
    document.getElementById("register-message").innerHTML =
    "Registration Successful! You can now login.";

});
</script>

</body>

</html>