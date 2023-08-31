<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Start Meta -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="The Sharp - Luxury Hotel Booking"/>
	<meta name="author" content="aman">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Title of Site -->
	<title>Reports</title>
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
	<style>
        
    .report-section {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
    }

    .report-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .report-list {
        list-style: none;
        padding: 0;
    }

    .report-list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #ccc;
    }

    .report-label {
        font-weight: bold;
        width: 200px;
    }
</style>
</head>

<body>



	<!-- Page Banner Start -->
    <div class="page__banner" data-background="assets/img/index/dashboard1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__banner-title">
                        <h1></h1>
                        <div class="page__banner-title-menu">
                            <p style="color: white; font-size: 40px;">Reports</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Page Banner End -->
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
					<a class="theme-btn" href="manager_index.html">Dashboard<i class="fal fa-home"></i></a>
                    <a class="theme-btn" href="#">Profile<i class="fal fa-user"></i></a>
				  <a class="theme-btn" href="#">Logout<i class="fal fa-long-arrow-right"></i></a>
				  
                  
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>



	  
		  <div class="spacernew">
</div>

    <?php
 
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $database_name = "hoteldatabase";

    $conn = new mysqli($server_name, $username, $password, $database_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Total number of rooms of each room type
    $roomTypeQuery = "SELECT room_type_id, COUNT(*) AS total_rooms FROM room GROUP BY room_type_id";
    $resultRoomType = $conn->query($roomTypeQuery);

    
    if ($resultRoomType->num_rows > 0) {
        echo "<h2>Total Number of Rooms of Each Room Type:</h2>";
        echo "<ul>";
        while ($row = $resultRoomType->fetch_assoc()) {
            echo "<li>{$row['room_type_id']}: {$row['total_rooms']} rooms</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No room type data available.</p>";
    }

    // Total employees of each employee type
    $employeeTypeQuery = "SELECT employee_type_id, COUNT(*) AS total_employees FROM employee GROUP BY employee_type_id";
    $resultEmployeeType = $conn->query($employeeTypeQuery);

    if ($resultEmployeeType->num_rows > 0) {
        echo "<h2>Total Employees of Each Employee Type:</h2>";
        echo "<ul>";
        while ($row = $resultEmployeeType->fetch_assoc()) {
            echo "<li>Employee Type ID: {$row['employee_type_id']} - Total Employees: {$row['total_employees']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No employee type data available.</p>";
    }

    // Total bookings with NULL in check_in
    $nullCheckInQuery = "SELECT COUNT(*) AS total_null_checkin FROM booking WHERE check_in IS NULL";
    $resultNullCheckIn = $conn->query($nullCheckInQuery);

    if ($resultNullCheckIn->num_rows > 0) {
        $row = $resultNullCheckIn->fetch_assoc();
        echo "<h2>Total Bookings with pending Check-in:</h2>";
        echo "<p>{$row['total_null_checkin']} bookings</p>";
    } else {
        echo "<p>No booking data available.</p>";
    }

    // Total bookings till date
    $totalBookingsQuery = "SELECT COUNT(*) AS total_bookings FROM booking";
    $resultTotalBookings = $conn->query($totalBookingsQuery);

    if ($resultTotalBookings->num_rows > 0) {
        $row = $resultTotalBookings->fetch_assoc();
        echo "<h2>Total Bookings Till Date:</h2>";
        echo "<p>{$row['total_bookings']} bookings</p>";
    } else {
        echo "<p>No booking data available.</p>";
    }

    $conn->close();
    ?>

   
<!-- Footer Area Start -->	
<div class="footer__area">
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 sm-mb-30">
				<div class="footer__area-widget">
					<div class="footer__area-widget-about">
						<div class="footer__area-widget-about-logo">
							<a href="index.html"><img src="assets/img/logo0.png" alt=""></a>
						</div>
						<p>THE SHARP</p>
						<div class="footer__area-widget-about-social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a>
								</li>
								<li><a href="#"><i class="fab fa-twitter"></i></a>
								</li>
			
								<li><a href="#"><i class="fab fa-youtube"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 lg-mb-30">
				<div class="footer__area-widget">
					<h5>Information</h5>
					<div class="footer__area-widget-contact">
						<div class="footer__area-widget-contact-item">
							<div class="footer__area-widget-contact-item-icon">
								<i class="fal fa-map-marked-alt"></i>
							</div>
							<div class="footer__area-widget-contact-item-content">									
								<span><a href="#">V2S 6T7 Surrey BC</a></span>
							</div>
						</div>
						<div class="footer__area-widget-contact-item">
							<div class="footer__area-widget-contact-item-icon">
								<i class="fal fa-envelope-open-text"></i>
							</div>
							<div class="footer__area-widget-contact-item-content">									
								<span><a href="mailto:help.info@gamil.com">help.thesharp@gmail.com</a></span>
							</div>
						</div>
						<div class="footer__area-widget-contact-item">
							<div class="footer__area-widget-contact-item-icon">
								<i class="fal fa-phone-alt"></i>
							</div>
							<div class="footer__area-widget-contact-item-content">									
								<span><a href="tel:+1 (604) 604 0000">+1 (604) 604 0000</a></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
	<div class="copyright__area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6 col-md-7 md-mb-10">
					<div class="copyright__area-left md-t-center">
						<p>Copyright © 2023 <a href="#">TheSharp</a> Website by <a href="#">Group F</a></p>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-5">
					<div class="copyright__area-right t-right md-t-center">
						<ul>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- Footer Area End -->	
	<!-- Scroll Btn Start -->
	<div class="scroll-up">
		<svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102"><path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" /> </svg>
	</div>
	<!-- Scroll Btn End -->
	<!-- Main JS -->
	<script src="assets/js/jquery-3.6.0.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Counter Up JS -->
	<script src="assets/js/jquery.counterup.min.js"></script>
	<!-- Popper JS -->
	<script src="assets/js/popper.min.js"></script>
	<!-- Magnific Popup JS -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<!-- Nice Select JS -->
	<script src="assets/js/jquery.nice-select.min.js"></script>
	<!-- Swiper Bundle JS -->
	<script src="assets/js/swiper-bundle.min.js"></script>
	<!-- Waypoints JS -->
	<script src="assets/js/jquery.waypoints.min.js"></script>
	<!-- Mean Menu JS -->
	<script src="assets/js/jquery.meanmenu.min.js"></script>
	<!-- Isotope JS -->
	<script src="assets/js/isotope.pkgd.min.js"></script>
	<!-- Custom JS -->
	<script src="assets/js/custom.js"></script>
</body>

</html>