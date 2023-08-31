add_employee.php                                                                                                                                                                                                                                                                            <!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>
</head>
<body>
    <?php
    // Database connection settings
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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $employee_fname = $_POST["employee_fname"];
        $employee_lname = $_POST["employee_lname"];
        $gender = $_POST["gender"];
        $employee_type_id = $_POST["employee_type_id"];
        $salary = $_POST["salary"];
        $address = $_POST["address"];
        $phone_number = $_POST["phone_number"];
        $email = $_POST["email"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zip = $_POST["zip"];
        $country = $_POST["country"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        
        // Additional validation and error checking can be added here
        
        // Insert employee data into the database
        $insertSql = "INSERT INTO employee (employee_fname, employee_lname, gender, employee_type_id, salary, address, phone_number, email, city, state, zip, country, password, cpassword) VALUES ('$employee_fname', '$employee_lname', '$gender', '$employee_type_id', '$salary', '$address', '$phone_number', '$email', '$city', '$state', '$zip', '$country', '$password', '$cpassword')";

        if ($conn->query($insertSql) === TRUE) {
            echo "<script>alert('Added an employee successfully'); window.location.href = 'add_employee.html';</script>";
            exit;
        } else {
            echo "Error adding employee: " . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>
</html>