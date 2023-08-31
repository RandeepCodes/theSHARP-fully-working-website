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

// Query to retrieve guest data
$sql = "SELECT guest_id, guest_fname, email FROM guest";
$result = $conn->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["guest_id"] . "</td><td>" . $row["guest_fname"] . "</td><td>" . $row["email"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>No guests found</td></tr>";
}

$conn->close();
?>
