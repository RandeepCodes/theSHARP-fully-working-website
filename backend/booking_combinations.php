<!DOCTYPE html>
<html>
<head>	<!-- Start Meta -->
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
    <style> .combination-text {
    font-size: 18px;
    font-weight: bold;
}

.total-price {
    font-size: 18px;
    font-weight: bold;
}
.booknew {
            background-color: white;
            padding: 10px;
         

            .book-button {
    display: inline-block;
    padding: 10px 20px;
    font-size: 18px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.book-button:hover {
    background-color: #0056b3;
}
        }</style>
    <title>Room Combinations</title>
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
				<div class="header__area-menubar-right-menu menu-responsive">
				  <ul id="mobilemenu">
					<li><a href="guest_index.html">Home</a></li>
					<li><a href="room-list.html">Rooms</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="services-team.html">Our Team</a></li>
					<li><a href="blog-standard.html">Blog</a></li>
					<li><a href="contact.html">Feedback</a></li>
				  </ul>
				</div>
			  </div>
			  <div class="header__area-menubar-right-box">
				<div class="header__area-menubar-right-box-btn">
					
						<a class="theme-btn" href="guest_profile.php">Profile<i class="fal fa-user"></i></a>
					  <a class="theme-btn" href="index.html">Logout<i class="fal fa-long-arrow-right"></i></a>
					  
					
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  
	<!-- Header Area End -->	
	<!-- Banner Area Start -->	
	<div class="banner__area" data-background="assets/img/ban.jpg">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="banner__area-title">
						<h1>Results according to your preferences are:</span></h1>
						
					</div>
				</div>
			</div>




            <div class="booknew">
		<div class="container">
    <?php
    $conn = new mysqli("localhost", "root", "", "hoteldatabase");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function getCollidedRoomNumbers($conn, $checkin, $checkout) {
        $collidedRoomNumbers = [];

        $sql = "SELECT br.room_no FROM booking b INNER JOIN booking_room br ON b.booking_id = br.booking_id WHERE (b.intended_check_in <= '$checkout' AND b.intended_check_out >= '$checkin')";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $collidedRoomNumbers[] = $row['room_no'];
            }
        }

        return $collidedRoomNumbers;
    }

    function getAvailableRoomNumbers($conn, $collidedRoomNumbers) {
        $availableRoomNumbers = [];

        $sql = "SELECT room_no FROM room";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (!in_array($row['room_no'], $collidedRoomNumbers)) {
                    $availableRoomNumbers[] = $row['room_no'];
                }
            }
        }

        return $availableRoomNumbers;
    }

    function generateCombinations($items, $length) {
        if ($length == 0) {
            return [[]];
        }
        
        if (count($items) == 0) {
            return [];
        }

        $first = $items[0];
        $rest = array_slice($items, 1);

        $combinations = [];

        foreach (generateCombinations($rest, $length - 1) as $subCombination) {
            $combinations[] = array_merge([$first], $subCombination);
        }

        foreach (generateCombinations($rest, $length) as $subCombination) {
            $combinations[] = $subCombination;
        }

        return $combinations;
    }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];
        $numberOfRooms = $_POST['rooms'];
        $numberOfAdults = $_POST['adults'];

        $collidedRoomNumbers = getCollidedRoomNumbers($conn, $checkin, $checkout);
        $availableRoomNumbers = getAvailableRoomNumbers($conn, $collidedRoomNumbers);

        $roomCombinations = generateCombinations($availableRoomNumbers, $numberOfRooms);

        

        $uniqueCombinations = [];

        if (!empty($roomCombinations)) {
            $sortedCombinations = []; // Array to store combinations with total prices
            foreach ($roomCombinations as $combination) {
                $totalPrice = 0;
                $roomTypeIds = [];

                foreach ($combination as $roomNumber) {
                    $sql = "SELECT room_type_id, room_price FROM room_type WHERE room_type_id = (SELECT room_type_id FROM room WHERE room_no = '$roomNumber')";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $totalPrice += $row['room_price']; // Add room price to total price
                        $roomTypeIds[] = $row['room_type_id'];
                    }
                }

                sort($roomTypeIds); // Sort room type IDs to ensure consistent ordering

                // Calculate total price based on the number of days
                $checkinDate = new DateTime($checkin);
                $checkoutDate = new DateTime($checkout);
                $numberOfDays = $checkinDate->diff($checkoutDate)->days;
                $totalPrice *= $numberOfDays;

            
                if ($totalPrice >= $numberOfAdults) {
                    $uniqueCombination = implode(', ', $roomTypeIds);
                    if (!in_array($uniqueCombination, $uniqueCombinations)) {
                        $sortedCombinations[$uniqueCombination] = $totalPrice;
                        $uniqueCombinations[] = $uniqueCombination;
                    }
                }
            }

            asort($sortedCombinations); // Sort combinations by total price in ascending order

            foreach ($sortedCombinations as $combination => $totalPrice) {
                $roomTypeQuantities = array_count_values(explode(', ', $combination));
                $formattedRoomQuantities = [];
                foreach ($roomTypeQuantities as $roomTypeId => $quantity) {
                    $fullRoomType = getFullRoomTypeName($roomTypeId);
                    $formattedRoomQuantities[] = "$quantity x $fullRoomType";
                }

                $encodedUserData = base64_encode(serialize([
                    'checkin' => $checkin,
                    'checkout' => $checkout,
                    'rooms' => $numberOfRooms,
                    'adults' => $numberOfAdults,
                    'total_price' => $totalPrice,
                ])); // Encode user input data

                $encodedCombinationData = base64_encode(serialize(['combination' => $combination])); // Encode combination data
                $encodedCollidedRoomNumbers = base64_encode(serialize($collidedRoomNumbers)); // Encode collided room numbers
                echo '<div class="booknew">';
                echo '<p><span class="combination-text">' . implode(' + ', $formattedRoomQuantities) . '</span> <br> Total Price($): <span class="total-price">' . $totalPrice . '</span><br>';
                echo '<a class="book-button"  href="booking.php?user_data=' . urlencode($encodedUserData) . '&combination_data=' . urlencode($encodedCombinationData) . '&collided_room_numbers=' . urlencode($encodedCollidedRoomNumbers) . '">Book Now</a><br><br></p>';
                echo '</div>';

            }
        } else {
            echo "<p>No room combinations available.</p>";
        }
    }  

    function getFullRoomTypeName($abbreviation) {
        $roomTypeNames = [
            'K' => 'King',
            'Q' => 'Queen',
            'P' => 'Penthouse',
            'D' => 'Double',
        ];
        return isset($roomTypeNames[$abbreviation]) ? $roomTypeNames[$abbreviation] : $abbreviation;
    }

    $conn->close();
    ?>
</div>
</div>



<!-- Accommodations Area End -->
	<!-- Deluxe Area Start -->
	<div class="deluxe__area section-padding">
		<div class="container">
			<div class="row align-items-end mb-60">
				<div class="col-xl-5">
					<div class="deluxe__area-title">
						<span class="subtitle__one">Deluxe and Luxury</span>
						<h2>Our Luxury Rooms</h2>
					</div>					
				</div>
				<div class="col-xl-7">
					<div class="deluxe__area-btn">
						<ul>
							
							<li data-filter=".luxury">Penthouse</li>
							<li data-filter=".single">King</li>
							<li data-filter=".suite">Queen</li>
							<li data-filter=".family">Double</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row deluxe__area-active">
				<div class="col-xl-3 col-lg-4 mb-30 suite">
					<div class="deluxe__area-item"> 
						<div class="deluxe__area-item-image">
							<img class="img__full" src="assets/img/luxury/luxury-1.jpg" alt="">
						</div>
						<div class="deluxe__area-item-content"> 
							<h6><a href="#"><span>$134</span> / Night</a></h6>
							<h4><a href="room-details.html">Queen <h6></h6></a></h4>
							<a class="simple-btn" href="room-list.html"><i class="far fa-chevron-right"></i>Learn More</a> 
						</div>
					</div>
				</div>
				
			
				<div class="col-xl-3 col-lg-4 mb-30 family">
					<div class="deluxe__area-item"> 
						<div class="deluxe__area-item-image">
							<img class="img__full" src="assets/img/luxury/luxury-3.jpg" alt="">
						</div>
						<div class="deluxe__area-item-content"> 
							<h6><a href="#"><span>$219</span> / Night</a></h6>
							<h4><a href="room-details.html">Double</a></h4>
							<a class="simple-btn" href="room-list.html"><i class="far fa-chevron-right"></i>Learn More</a> 
						</div>
					</div>
				</div>
			
				<div class="col-xl-6 col-lg-8 lg-mb-30 single">
					<div class="deluxe__area-item"> 
						<div class="deluxe__area-item-image">
							<img class="img__full" src="assets/img/luxury/luxury-4.jpg" alt="">
							</div>
						<div class="deluxe__area-item-content"> 
							<h6><a href="#"><span>$169</span> / Night</a></h6>
							<h4><a href="room-details.html">King</a></h4>
							<a class="simple-btn" href="room-list.html"><i class="far fa-chevron-right"></i>Learn More</a> 
						</div>
					</div>
				</div>
				<div class="col-xl-6 luxury">
					<div class="deluxe__area-item"> 
						<div class="deluxe__area-item-image">
							<img class="img__full" src="assets/img/luxury/luxury-5.jpg" alt="">
						</div>
						<div class="deluxe__area-item-content"> 
							<h6><a href="#"><span>$309</span> / Night</a></h6>
							<h4><a href="room-details.html">Penthouse</a></h4>
							<a class="simple-btn" href="room-list.html"><i class="far fa-chevron-right"></i>Learn More</a> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Deluxe Area End -->



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