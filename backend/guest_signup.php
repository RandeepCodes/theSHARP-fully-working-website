<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Connect to the MySQL database
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $database_name = "hoteldatabase";

    $conn = new mysqli($server_name, $username, $password, $database_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the form data
    $guest_fname = $_POST["guest_fname"];
    $guest_lname = $_POST["guest_lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];
    $country = $_POST["country"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    // Validate the form data 
    if (empty($guest_fname) || empty($guest_lname) || empty($email) || empty($phone) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($country) || empty($password) || empty($cpassword)) {
        echo "All fields are required.";
    } elseif ($password != $cpassword) {
        echo "Password and Confirm Password do not match.";
    } else {
        // Prepare and execute the SQL query to insert data into the "guest" table
        $sql = "INSERT INTO guest (guest_fname, guest_lname, email, phone, address, city, state, zip, country, password, cpassword) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssss", $guest_fname, $guest_lname, $email, $phone, $address, $city, $state, $zip, $country, $password, $cpassword);

        if ($stmt->execute()) {
            echo "Registration successful. You can now login.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    }

    $conn->close();
}

?>
