<html>
<head>
    <title>Edit Profile</title>
    <!-- Start Meta -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="The Sharp - Luxury Hotel Booking"/>
	<meta name="author" content="aman">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Title of Site -->
	
	<!-- Favicons -->
	<link rel="icon" type="image/png" href="assets/img/logo0.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="assets/css/all.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- Nice Select CSS -->
	<link rel="stylesheet" href="assets/css/nice-select.css">
	<!-- Swiper Bundle CSS -->
	<link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
	<!-- Magnific Popup CSS -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- Mean Menu CSS -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="assets/sass/style.css"> 

    <style>body {
		margin: 0;
		padding: 0;
		font-family: Arial, sans-serif;
		background-color: #f0f0f0;
	}
	
	.profile {
		max-height: 200px;
		max-width: 500px;
		
		background-color:black;
		
		border-radius: 5px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	}
	
	.profile-header {
		text-align: center;
		margin-bottom: 10px;
	}
	
	.profile-options {
		display: flex;
		justify-content: center;
		gap: 20px;
		margin-bottom: 100px;
		
	}
	
	.btn {
		display: inline-block;
		padding: 10px 20px;
		background-color:black;
		color:white;
		text-decoration: none;
		border-radius: 5px;
		transition: background-color:0.3s;
	}
	
	.btn:hover {
		background-color: #FFDB58;
	}
	
	.profile-footer {
		text-align: center;
		margin-top: 20px;
	}
	
.profile-header {
    text-align: center;
    margin-bottom: 20px;
    position: relative;
}
.user Ic

.user-photo img {
    width: 100%;
    height: auto;
    display: block;
}
.circle-icon {
	
    width: 200px;
    height: 200px;
    border-radius: 50%;
	padding: 0px;
	margin: 0px;
	
}
.icon-button-container {
    margin-bottom: 10 px; 
}



	</style>
</head>


	<!-- Header Area Start -->
	<div class="header__sticky">
        <div class="header__area">
          <div class="container custom__container">
            <div class="header__area-menubar">
              <div class="header__area-menubar-left">
                <div class="header__area-menubar-left-logo">
                  <a href="index.html"><img src="assets/img/logo0.png" alt=""></a>
                  <div class="responsive-menu"></div>
                </div>
              </div>
              <div class="header__area-menubar-right">
				
			  </div>
			  <div class="header__area-menubar-right-box">
				<div class="header__area-menubar-right-box-btn">
                   
				  <a class="theme-btn" href="index.html">Logout<i class="fal fa-long-arrow-right"></i></a>
                  
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
<!-- Banner Area Start -->	
<div class="banner__area" data-background="assets/img/banner-1.jpg">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="banner__area-title">
						<h1>Edit Your Information</h1>
						
					</div>
				</div>
			</div>
<body>

<?php
session_start(); // Start the session

if (isset($_SESSION["user_email"])) { // Check if user_email is set in session
    $user_email = $_SESSION["user_email"];

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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_phone = $_POST["phone"];
        $user_address = $_POST["address"];
        $user_city = $_POST["city"];
        $user_state = $_POST["state"];
        $user_zip = $_POST["zip"];
        $user_country = $_POST["country"];

        // Update guest's profile in the database
        $sql = "UPDATE guest SET phone = ?, address = ?, city = ?, state = ?, zip = ?, country = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $user_phone, $user_address, $user_city, $user_state, $user_zip, $user_country, $user_email);
        $stmt->execute();
        $stmt->close();
       
        echo "
        <script>
            if (confirm('Profile updated successfully!')) {
                window.location.href = 'guest_profile.php';
            } else {
                window.location.href = 'edit_profile.php';
            }
        </script>";
       
    }
    
    // Fetch guest's information from the database
    $sql = "SELECT * FROM guest WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $user_phone = $row["phone"];
        $user_address = $row["address"];
        $user_city = $row["city"];
        $user_state = $row["state"];
        $user_zip = $row["zip"];
        $user_country = $row["country"];

        echo "
        <form action='' method='post'>
            <label for='email'>Email:</label><br>
            <input type='text' id='email' name='email' value='$user_email' readonly><br>
            <label for='phone'>Phone:</label><br>
            <input type='text' id='phone' name='phone' value='$user_phone'><br>
            <label for='address'>Address:</label><br>
            <input type='text' id='address' name='address' value='$user_address'><br>
            <label for='city'>City:</label><br>
            <input type='text' id='city' name='city' value='$user_city'><br>
            <label for='state'>State:</label><br>
            <input type='text' id='state' name='state' value='$user_state'><br>
            <label for='zip'>Zip:</label><br>
            <input type='text' id='zip' name='zip' value='$user_zip'><br>
            <label for='country'>Country:</label><br>
            <input type='text' id='country' name='country' value='$user_country'><br><br>
            <input type='submit' value='Update Profile'>
        </form>
        ";

    } else {
        echo "Error fetching user data.";
    }

    $stmt->close();
    $conn->close();
} else {
    // Redirect to login page if user_email is not set
    header("Location: login.php");
    exit;
}
?>

</body>
</html>