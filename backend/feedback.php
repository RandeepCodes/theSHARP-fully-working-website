<?php
$server = "localhost";
$username = "root";
$password = "";
$database_name = "hoteldatabase";

$conn = mysqli_connect($server, $username, $password, $database_name);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['save'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject']; // Check the input name attribute
    $comments = $_POST['comments'];

    $sql_query = "INSERT INTO feedback (fullname, email, phone, subject, comments)
                  VALUES (?, ?, ?, ?, ?)";
                  
    $stmt = mysqli_prepare($conn, $sql_query);
    mysqli_stmt_bind_param($stmt, "sssss", $fullname, $email, $phoneNumber, $subject, $comments);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Feedback sent successfully!');
        window.location.href = 'contact.html'; // Redirect to the previous page
        </script>";
    
    
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
