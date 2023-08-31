<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "hoteldatabase";

// Create connection
$conn = new mysqli($server_name, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>
