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
	<title>Bookings </title>
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
                    <a class="theme-btn" href="guest_index.php">Go Back<i class="fal fa-long-arrow-right"></i></a>
				  <a class="theme-btn" href="index.html">Logout<i class="fal fa-long-arrow-right"></i></a>
                  
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  
        <!-- Header Area End-->
        <!-- Page Banner Start -->
    <div class="page__banner" data-background="assets/img/index/dashboard1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="page__banner-title">
                        <h1></h1>
                        <div class="page__banner-title-menu">
                            <p style="color: white; font-size: 40px;">Your Bookings</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Page Banner End -->
<div class="spacer">
</div>


<body>
  <div class="container">

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

    if (isset($_GET["cancel_booking"])) {
        $bookingId = $_GET["cancel_booking"];

        // Delete entries from booking_room table associated with the booking_id
        $deleteBookingRoomQuery = "DELETE FROM booking_room WHERE booking_id = ?";
        $stmtDeleteBookingRoom = $conn->prepare($deleteBookingRoomQuery);
        $stmtDeleteBookingRoom->bind_param("i", $bookingId);
        $stmtDeleteBookingRoom->execute();

        // Delete the booking from booking table
        $deleteBookingQuery = "DELETE FROM booking WHERE booking_id = ?";
        $stmtDeleteBooking = $conn->prepare($deleteBookingQuery);
        $stmtDeleteBooking->bind_param("i", $bookingId);
        $stmtDeleteBooking->execute();

        echo "Booking has been cancelled.";
    }

    // Fetch all booking details
    $fetchBookingsQuery = "SELECT b.booking_id, b.intended_check_in, b.intended_check_out, b.check_in, b.check_out, b.no_of_adults, g.guest_fname, g.guest_lname FROM booking b
                          JOIN guest g ON b.guest_id = g.guest_id";
    $resultFetchBookings = $conn->query($fetchBookingsQuery);

    if ($resultFetchBookings->num_rows > 0) {
        echo "<h2></h2>";
        while ($row = $resultFetchBookings->fetch_assoc()) {
            echo "<div class='booking-info'>";
            echo "<p><strong>Booking ID:</strong> " . $row["booking_id"] . "</p>";
            echo "<p><strong>Guest Name:</strong> " . $row["guest_fname"] . " " . $row["guest_lname"] . "</p>";
            echo "<p><strong>Intended Check-in:</strong> " . ($row["intended_check_in"] ? $row["intended_check_in"] : "Check-in Pending") . "</p>";
            echo "<p><strong>Intended Check-out:</strong> " . ($row["intended_check_out"] ? $row["intended_check_out"] : "Check-out Pending") . "</p>";
            echo "<p><strong>Actual Check-in:</strong> " . ($row["check_in"] ? $row["check_in"] : "Check-in Pending") . "</p>";
            echo "<p><strong>Actual Check-out:</strong> " . ($row["check_out"] ? $row["check_out"] : "Check-out Pending") . "</p>";
            echo "<p><strong>No. of Adults:</strong> " . $row["no_of_adults"] . "</p>";
            if ($row["check_in"] === null) {
                echo "<p><button onclick=\"cancelBooking(" . $row["booking_id"] . ")\">Cancel Booking</button></p>";
            }
            echo "<hr>";
            echo "</div>";
        }
    } else {
        echo "<p>No booking data available.</p>";
    }

    $conn->close();
    ?>

    <script>
        function cancelBooking(bookingId) {
            if (confirm("Are you sure you want to cancel this booking?")) {
                window.location.href = "?cancel_booking=" + bookingId;
            }
        }
    </script>

    </div>
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
				<div class="col-xl-2 col-lg-2 col-md-5 col-sm-4 sm-mb-30">
					<div class="footer__area-widget">
						<h5>Useful Links</h5>
						<div class="footer__area-widget-menu">
							<ul>
								<li><a href="services-details.html"><i class="fal fa-angle-double-right"></i>Housekeeping</a></li>
								<li><a href="services-details.html"><i class="fal fa-angle-double-right"></i>Car Parkade</a></li>
								<li><a href="services-details.html"><i class="fal fa-angle-double-right"></i>Swimming pool</a></li>
								<li><a href="services-details.html"><i class="fal fa-angle-double-right"></i>Fitness Gym</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-7 col-sm-8">
					<div class="footer__area-widget">
						<h5>Subscribe to exciting news and updates!</h5>
						<div class="footer__area-widget-subscribe">
							<form action="#">
								<input type="text" name="email" placeholder="Email Address" required="">
								<button type="submit"><i class="fal fa-hand-pointer"></i></button>
							</form>
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