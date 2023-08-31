<!DOCTYPE html>
<html>
<head>
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
    <title>Booking Info</title>

    <style> .booknew {
            background-color: white;
            padding: 10px;
            border: 5px solid black;

            .welcome-message {
    background-color: #f0f0f0;
    padding: 15px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 18px;
}

.guest-name {
    font-weight: bold;
    color: #007bff;
}

.booking-success-message {
    background-color: #d4edda;
    padding: 15px;
    border: 1px solid #c3e6cb;
    font-size: 18px;
}

.booking-id {
    font-weight: bold;
    color: #28a745;
}


        }</style>
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
						<h1>Your Booking Information</span></h1>
						
					</div>
				</div>
			</div>

            <div class="booknew">
		<div class="container">
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
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['user_data']) && isset($_GET['combination_data']) && isset($_GET['collided_room_numbers'])) {
       
        $encodedUserData = $_GET['user_data'];
        $decodedUserData = unserialize(base64_decode(urldecode($encodedUserData)));

        $encodedCombinationData = $_GET['combination_data'];
        $decodedCombinationData = unserialize(base64_decode(urldecode($encodedCombinationData)));
        $selectedCombination = $decodedCombinationData['combination'];

        $encodedCollidedRoomNumbers = $_GET['collided_room_numbers'];
        $decodedCollidedRoomNumbers = unserialize(base64_decode(urldecode($encodedCollidedRoomNumbers)));

        // Extract user's input data
        $checkin = $decodedUserData['checkin'];
        $checkout = $decodedUserData['checkout'];
        $numberOfRooms = $decodedUserData['rooms'];
        $numberOfAdults = $decodedUserData['adults'];

        // Display user's input data
        echo "<h2>Booking Details:</h2>";
        echo "Check-in Date: $checkin<br>";
        echo "Check-out Date: $checkout<br>";
        echo "Number of Rooms: $numberOfRooms<br>";
        echo "Number of Adults: $numberOfAdults<br>";

       // Display selected combination with prices
echo "<h2>Your Room Choice:</h2>";

$roomTypeNames = [
    'K' => 'King',
    'Q' => 'Queen',
    'P' => 'Penthouse',
    'D' => 'Double',
];
$formattedSelectedCombination = [];
$totalPrice = 0;

foreach (explode(', ', $selectedCombination) as $roomTypeId) {
    $sql = "SELECT room_type_id, room_price FROM room_type WHERE room_type_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $roomTypeId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $roomType = $roomTypeNames[$row['room_type_id']];
        $roomPrice = $row['room_price'];
        $totalPrice += $roomPrice;

        $formattedSelectedCombination[] = "$roomType (Price: $roomPrice)";
    }
}

echo "Combination: " . implode(", ", $formattedSelectedCombination) . "<br>";

echo "Total Price($): $totalPrice<br>";



        // dummy form for payment details
       echo "<h2>Enter Payment Details</h2>";
       echo "<form action='' method='post'>";
       echo "<label for='card_number'>Card Number (16 digits):</label>";
       echo "<input type='text' name='card_number' pattern='[0-9]{16}' required><br>";
       echo "<label for='card_holder_name'>Card Holder Name:</label>";
       echo "<input type='text' name='card_holder_name' required><br>";
       echo "<label for='expiry_date'>Expiry Date (MM/YY):</label>";
       echo "<input type='text' name='expiry_date' pattern='^(0[1-9]|1[0-2])\/?([0-9]{2})$' placeholder='MM/YY' required><br>";
       echo "<label for='cvv'>CVV:</label>";
       echo "<input type='text' name='cvv' pattern='[0-9]{3,4}' required><br>";
       
       echo "</form>";

        
        //  form to confirm booking
        echo "<form action='' method='post'>";
        echo "<input type='hidden' name='encoded_user_data' value='$encodedUserData'>";
        echo "<input type='hidden' name='encoded_combination_data' value='$encodedCombinationData'>";
        echo "<input type='hidden' name='encoded_collided_room_numbers' value='$encodedCollidedRoomNumbers'>";
        echo "<button type='submit' name='confirm_booking'>Confirm Booking</button>";
        echo "</form>";
    
    }
    
 elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_payment'])) {
    // Retrieve and decode data
    $encodedUserData = $_POST['encoded_user_data'];
    $decodedUserData = unserialize(base64_decode(urldecode($encodedUserData)));

    $encodedCombinationData = $_POST['encoded_combination_data'];
    $decodedCombinationData = unserialize(base64_decode(urldecode($encodedCombinationData)));

    $encodedCollidedRoomNumbers = $_POST['encoded_collided_room_numbers'];
    $decodedCollidedRoomNumbers = unserialize(base64_decode(urldecode($encodedCollidedRoomNumbers)));

    $cardNumber = $_POST['card_number'];
    $cardHolderName = $_POST['card_holder_name'];
    $expiryDate = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];

  

    // Once payment is successfully submitted, display the confirm booking button
    echo "<form action='' method='post'>";
    echo "<input type='hidden' name='encoded_user_data' value='$encodedUserData'>";
    echo "<input type='hidden' name='encoded_combination_data' value='$encodedCombinationData'>";
    echo "<input type='hidden' name='encoded_collided_room_numbers' value='$encodedCollidedRoomNumbers'>";
    echo "<button type='submit' name='confirm_booking'>Confirm Booking</button>";
    echo "</form>";

}
    elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_booking'])) {
        // Retrieve and decode data
        $encodedUserData = $_POST['encoded_user_data'];
        $decodedUserData = unserialize(base64_decode(urldecode($encodedUserData)));

        $encodedCombinationData = $_POST['encoded_combination_data'];
        $decodedCombinationData = unserialize(base64_decode(urldecode($encodedCombinationData)));

        $encodedCollidedRoomNumbers = $_POST['encoded_collided_room_numbers'];
        $decodedCollidedRoomNumbers = unserialize(base64_decode(urldecode($encodedCollidedRoomNumbers)));

        // Extract data
        $checkin = $decodedUserData['checkin'];
        $checkout = $decodedUserData['checkout'];
        $numberOfAdults = $decodedUserData['adults'];
        $selectedCombination = $decodedCombinationData['combination'];
       

     
        $query = "SELECT guest_id, guest_fname, guest_lname FROM guest WHERE email = ?";
        $stmt = $conn->prepare($query);
    
        $userEmail = $_SESSION["user_email"];
        $stmt->bind_param("s", $userEmail);
    
        $stmt->execute();
        $stmt->bind_result($guestId, $firstName, $lastName);
        
        
        if ($stmt->fetch()) {
            // Display fetched guest_id
           
            echo "<div class='welcome-message'>";
            echo "<p>Welcome <span class='guest-name'>$firstName $lastName</span> to The Sharp Experience!</p>";
            echo "</div>";
            

            $stmt->close(); // Close the prepared statement
 // Insert booking details into the booking table
 $intendedCheckin = $checkin;
 $intendedCheckout = $checkout;
 $noOfAdults = $numberOfAdults;
 
        // Prepare and execute the insert query for booking
$insert_query = "INSERT INTO booking (intended_check_in, intended_check_out, no_of_adults, guest_id)
                 VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($insert_query);
$stmt->bind_param("ssii", $intendedCheckin, $intendedCheckout, $noOfAdults, $guestId);

if ($stmt->execute()) {
    $bookingId = $stmt->insert_id;
  // Get room numbers for selected room types and insert into booking_room
  $roomTypeIds = explode(', ', $selectedCombination);
  $roomsToBook = array_count_values($roomTypeIds); // Count selected room types
  $bookedRooms = array(); // Initialize booked rooms array

  foreach ($roomTypeIds as $roomTypeId) {
      $bookedRooms[$roomTypeId] = 0; // Initialize booked count for each room type

      $sql = "SELECT room_no FROM room WHERE room_type_id = ? ";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $roomTypeId);
      $stmt->execute();
      $result = $stmt->get_result();

      while ($row = $result->fetch_assoc()) {
          $roomNo = $row['room_no'];

          if (!in_array($roomNo, $decodedCollidedRoomNumbers)) {
              if ($bookedRooms[$roomTypeId] < $roomsToBook[$roomTypeId]) {
                  // Insert into booking_room
                  $insert_booking_room = "INSERT INTO booking_room (booking_id, room_no)
                                          VALUES (?, ?)";
                  $stmt_booking_room = $conn->prepare($insert_booking_room);
                  $stmt_booking_room->bind_param("ii", $bookingId, $roomNo);

                  if ($stmt_booking_room->execute()) {
                    
                      $bookedRooms[$roomTypeId]++; // Increment booked count
                  }
              }
          }
      }
  }

  echo "<div class='booking-success-message'>";
  echo "<p>Your booking was successful! Your Booking ID is: <span class='booking-id'>$bookingId</span></p>";
  echo "</div>";

  $stmt_booking_room->close();
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close(); // Close the prepared statement
$conn->close(); // Close the database
}}

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