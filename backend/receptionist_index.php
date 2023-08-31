<!DOCTYPE html>
<html>
<head>
	<!-- Start Meta -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="The Sharp - Luxury Hotel Booking"/>
	<meta name="author" content="aman">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Title of Site -->
	<title>Dashboard</title>
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
</head>

<body>

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
	  
	<!-- Header Area End -->	





       

    

	<!-- Page Banner Start -->
    <div class="page__banner" data-background="assets/img/index/dashboard1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__banner-title">
                        <h1></h1>
                        <div class="page__banner-title-menu">
                            <p style="color: white; font-size: 40px;">Welcome! Receptionist</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Page Banner End -->

    <?php
    session_start();


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
        if (isset($_POST['booking_id'])) {
            $search_type = 'booking_id';
            $search_value = $_POST['booking_id'];
        } elseif (isset($_POST['guest_name']) && isset($_POST['guest_lname'])) {
            $search_type = 'guest_name';
            $search_value = $_POST['guest_name'] . ' ' . $_POST['guest_lname'];
        }

        if ($search_type && $search_value) {
            if ($search_type === 'booking_id') {
                $booking_sql = "SELECT * FROM booking WHERE booking_id = ?";
                $booking_stmt = $conn->prepare($booking_sql);
                $booking_stmt->bind_param("i", $search_value);
                $booking_stmt->execute();
                $booking_result = $booking_stmt->get_result();
            } elseif ($search_type === 'guest_name') {
                $guest_sql = "SELECT guest_id FROM guest WHERE CONCAT(guest_fname, ' ', guest_lname) = ?";
                $guest_stmt = $conn->prepare($guest_sql);
                $guest_stmt->bind_param("s", $search_value);
                $guest_stmt->execute();
                $guest_result = $guest_stmt->get_result();

                if ($guest_result->num_rows === 1) {
                    $guest = $guest_result->fetch_assoc();
                    $booking_sql = "SELECT * FROM booking WHERE guest_id = ?";
                    $booking_stmt = $conn->prepare($booking_sql);
                    $booking_stmt->bind_param("i", $guest['guest_id']);
                    $booking_stmt->execute();
                    $booking_result = $booking_stmt->get_result();
                } else {
                    echo "<p>No guest found with the entered name.</p>";
                    exit;
                }
            }

            if ($booking_result->num_rows > 0) {
                while ($booking = $booking_result->fetch_assoc()) {
                    echo "<h2>Booking Details:</h2>";
                    echo "Booking ID: " . $booking['booking_id'] . "<br>";
                    echo "Booking Date and Time: " . $booking['booking_date_time'] . "<br>";
                    echo "Intended Check-in Date: " . $booking['intended_check_in'] . "<br>";
                    echo "Intended Check-out Date: " . $booking['intended_check_out'] . "<br>";
                    echo "Actual Check-in Date and Time: " . ($booking['check_in'] ? $booking['check_in'] : "Check-in pending") . "<br>";
                    echo "Actual Check-out Date and Time: " . ($booking['check_out'] ? $booking['check_out'] : "Check-out pending") . "<br>";
                    echo "Number of Adults: " . $booking['no_of_adults'] . "<br>";
                    echo "Guest ID: " . $booking['guest_id'] . "<br>";

                    // Check In button
            if (!$booking['check_in']) {
                echo "<form action='' method='post'>";
                echo "<input type='hidden' name='booking_id' value='" . $booking['booking_id'] . "'>";
                echo "<button type='submit' name='check_in'>Check In</button>";
                echo "</form>";
                echo"<br>";
            }

            // Check Out button
            if (!$booking['check_out']) {
                echo "<form action='' method='post'>";
                echo "<input type='hidden' name='booking_id' value='" . $booking['booking_id'] . "'>";
                echo "<button type='submit' name='check_out'>Check Out</button>";
                echo "</form>";
            }
                    // Retrieve associated rooms from booking_room table
                    $rooms_sql = "SELECT br.room_no, r.room_type_id FROM booking_room br
                                  INNER JOIN room r ON br.room_no = r.room_no
                                  WHERE br.booking_id = ?";
                    $rooms_stmt = $conn->prepare($rooms_sql);
                    $rooms_stmt->bind_param("i", $booking['booking_id']);
                    $rooms_stmt->execute();
                    $rooms_result = $rooms_stmt->get_result();

                    if ($rooms_result->num_rows > 0) {
                        echo "<h2>Associated Rooms:</h2>";
                        echo "<ul>";
                        while ($room_row = $rooms_result->fetch_assoc()) {
                            $roomNumber = $room_row['room_no'];
                            $roomTypeId = $room_row['room_type_id'];
                            echo "<li>Room Number: $roomNumber, Room Type ID: $roomTypeId</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<p>No associated rooms found for this booking.</p>";
                    }
                }
            } else {
                echo "<p>No results found for the entered search criteria.</p>";
            }

            if (isset($_POST['check_in']) && isset($_POST['booking_id'])) {
                $booking_id = $_POST['booking_id'];
    
                // Update check_in time in the booking table
                $check_in_sql = "UPDATE booking SET check_in = NOW() WHERE booking_id = ?";
                $check_in_stmt = $conn->prepare($check_in_sql);
                $check_in_stmt->bind_param("i", $booking_id);
                $check_in_stmt->execute();
                $check_in_stmt->close();
                
            }
    
            if (isset($_POST['check_out']) && isset($_POST['booking_id'])) {
                $booking_id = $_POST['booking_id'];
    
                // Update check_out time in the booking table
                $check_out_sql = "UPDATE booking SET check_out = NOW() WHERE booking_id = ?";
                $check_out_stmt = $conn->prepare($check_out_sql);
                $check_out_stmt->bind_param("i", $booking_id);
                $check_out_stmt->execute();
                $check_out_stmt->close();
            }
        }
            $booking_stmt->close(); 
            if (isset($guest_stmt)) {
                $guest_stmt->close(); 
            }
            if (isset($rooms_stmt)) {
                $rooms_stmt->close(); 
            }
        }
    
    ?>

    <h2>Search Booking Details:</h2>
    <form action="" method="post">
        <label for="booking_id">Booking ID:</label>
        <input type="text" name="booking_id">
        <button type="submit">Search by Booking ID</button>
    </form>

    <form action="" method="post">
        <label for="guest_name">Guest First Name:</label>
        <input type="text" name="guest_name">
        <label for="guest_lname">Guest Last Name:</label>
        <input type="text" name="guest_lname">
        <button type="submit">Search by Guest Name</button>
    </form>
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