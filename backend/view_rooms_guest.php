<!DOCTYPE html>
<html>
<head>
    <title>Available Rooms</title>
</head>
<body>
    <h2>Available Rooms</h2>

    <?php
    
    $checkIn = $_GET["check_in"];
    $checkOut = $_GET["check_out"];
    $numRooms = $_GET["rooms"];
    $numGuests = $_GET["guests"];

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

    // Prepare and execute the database query to retrieve available rooms based on guest input
    $sql = "SELECT * FROM room_type WHERE occupancy >= ?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $numGuests);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display available room options
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="room__list-item">';
            echo '<h4>' . $row["room_type_id"] . '</h4>';
            echo '<p>Check-in: ' . $checkIn . '</p>';
            echo '<p>Check-out: ' . $checkOut . '</p>';
            echo '<p>Number of Guests: ' . $numGuests . '</p>';
         
            echo '<p>Price: $' . $row["room_price"] . '/Night</p>';
         
            echo '<button class="theme-btn" type="button">Book Now</button>';
            echo '</div>';
        }
    } else {
        echo 'No available rooms found.';
    }

    // Close database connection
    $stmt->close();
    $conn->close();
    ?>
</body>
</html>
