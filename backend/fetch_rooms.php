<?php
// Database connection settings
$server = "localhost";
$username = "root";
$password = "";
$database_name = "hoteldatabase";

// Create connection
$conn = new mysqli($server, $username, $password, $database_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch room information from the database
$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Room Type</th><th>Occupancy</th><th>Price</th><th>Description</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["room_id"] . "</td>";
        echo "<td>" . $row["room_type"] . "</td>";
        echo "<td>" . $row["occupancy"] . "</td>";
        echo "<td>" . $row["room_price"] . "</td>";
        echo "<td>" . $row["room_description"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No rooms found in the database.";
}

$conn->close();
?>
