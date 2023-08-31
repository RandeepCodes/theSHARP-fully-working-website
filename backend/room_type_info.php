                                                                                                                                                                                                                                                                                                                                                                                                                     <!DOCTYPE html>
<html>
<head>
    <title>Room Type Information</title>
</head>
<body>
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["update"])) {
            $selectedRoomType = $_POST["room_type"];
            $occupancy = $_POST["occupancy"];
            $room_price = $_POST["room_price"];
            $room_description = $_POST["room_description"];

            // Update room information in the database
            $updateSql = "UPDATE room_type SET occupancy = '$occupancy', room_price = '$room_price', room_description = '$room_description' WHERE room_type_id = '$selectedRoomType'";

            if ($conn->query($updateSql) === TRUE) {
                echo "Room information updated successfully.";
            } else {
                echo "Error updating room information: " . $conn->error;
            }
        } else {
            // Fetch room information from the database
            $selectedRoomType = $_POST["room_type"];
            $sql = "SELECT * FROM room_type WHERE room_type_id = '$selectedRoomType'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                echo '<h2>Edit Room Type Information</h2>';
                echo '<form action="room_type_info.php" method="post">';
                echo 'Occupancy: <input type="number" name="occupancy" value="' . $row["occupancy"] . '"><br>';
                echo 'Room Type: <input type="text" name="room_type" value="' . $row["room_type_id"] . '" readonly><br>';
                echo 'Room Price: <input type="text" name="room_price" value="' . $row["room_price"] . '"><br>';
                echo 'Room Description: <textarea name="room_description">' . $row["room_description"] . '</textarea><br>';
                echo '<input type="submit" name="update" value="Update">';
                echo '</form>';
            } else {
                echo 'Room type not found in the database.';
            }
        }
    }

    $conn->close();
    ?>
</body>
</html>