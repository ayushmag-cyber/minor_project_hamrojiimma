<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>

<h1>Welcome {{ Auth::user()->name }}</h1>

<p>Email: {{ Auth::user()->email }}</p>

<a href="{{ url('/dashboard') }}">Dashboard</a>

<form action="{{ url('/logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

</body>
</html>