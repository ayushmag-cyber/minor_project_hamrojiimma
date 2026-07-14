<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "hamrojiimma";

// Create Connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check Connection
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}


?>