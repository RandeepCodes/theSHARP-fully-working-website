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
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the email has the domain "@employee.thesharp.com"
    $is_employee_email = strpos($email, "@employee.thesharp.com") !== false;

    if ($is_employee_email) {
        // Query employee data
        $sql = "SELECT * FROM employee WHERE email = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            // Verify the password
            if ($password === $row["password"]) {
                // Password is correct, login successful

                // Check the employee type
                $employee_type = $row["employee_type_id"];

                // Start a session and store user type
                session_start();
                $_SESSION["user_type"] = $employee_type;

                // Redirect user based on employee type
                if ($employee_type === "M01") {
                    // Manager
                    header("Location: manager_index.html");
                    exit;
                } elseif ($employee_type === "R01") {
                    // Receptionist
                    header("Location: receptionist_index.php");
                    exit;
                } elseif ($employee_type === "H01") {
                    // Housekeeper
                    header("Location: housekeeper_index.html");
                    exit;
                }
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "Invalid email or user not found.";
        }

        $stmt->close();
    } else {
        // Guest login logic (similar to Draft 2)
        $sql = "SELECT * FROM guest WHERE email = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            // Verify the password
            if ($password === $row["password"]) {
                // Password is correct, login successful

                // Start a session and store user email
                session_start();
                $_SESSION["user_email"] = $email;

                // Redirect to guest_profile.php
                header("Location: guest_index.php");
                exit;
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "Invalid email or user not found.";
        }

        $stmt->close();
    }

    $conn->close();
}
?>