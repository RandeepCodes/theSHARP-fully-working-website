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
	<title>Employee List</title>
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
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .employee-info {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
        h3 {
            margin-top: 0;
        }
        .employee-field {
            margin-bottom: 10px;
        }
        .employee-field label {
            font-weight: bold;
        }
        .employee-field hr {
            margin: 10px 0;
            border: none;
            border-top: 1px solid #ccc;
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
                            <p style="color: white; font-size: 40px;">Employee List</p>
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
	  // Database connection settings
	  $server = "localhost";
	  $username = "root";
	  $password = "";
	  $database = "hoteldatabase";
	  
	  // Create connection
	  $conn = new mysqli($server, $username, $password, $database);
	  
	  // Check connection
	  if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
	  }
	  
	  // Fetch and display active employees by employee type
	  $employeeTypes = array("M01", "R01", "H01");
	  
	  foreach ($employeeTypes as $employeeType) {
		  $activeEmployeesQuery = "SELECT CONCAT(employee_fname, ' ', employee_lname) AS full_name, gender, phone_number, email, hire_date FROM employee WHERE end_date IS NULL AND employee_type_id = '$employeeType'";
	  
		  $activeEmployeesResult = $conn->query($activeEmployeesQuery);
	  
		  echo "<h3>Active " . getEmployeeTypeLabel($employeeType) . ":</h3>";
		  while ($row = $activeEmployeesResult->fetch_assoc()) {
			  echo "Full Name: " . $row["full_name"] . "<br>";
			  echo "Gender: " . $row["gender"] . "<br>";
			  echo "Phone Number: " . $row["phone_number"] . "<br>";
			  echo "Email: " . $row["email"] . "<br>";
			  echo "Start of Employment: " . $row["hire_date"] . "<br>";
			  echo "<hr>";
		  }
	  }
	  
	  // Fetch and display past employees by employee type
	  foreach ($employeeTypes as $employeeType) {
		  $pastEmployeesQuery = "SELECT CONCAT(employee_fname, ' ', employee_lname) AS full_name, gender, phone_number, email, hire_date, end_date FROM employee WHERE end_date IS NOT NULL AND employee_type_id = '$employeeType'";
	  
		  $pastEmployeesResult = $conn->query($pastEmployeesQuery);
	  
		  echo "<h3>Past " . getEmployeeTypeLabel($employeeType) . ":</h3>";
		  while ($row = $pastEmployeesResult->fetch_assoc()) {
			  echo "Full Name: " . $row["full_name"] . "<br>";
			  echo "Gender: " . $row["gender"] . "<br>";
			  echo "Phone Number: " . $row["phone_number"] . "<br>";
			  echo "Email: " . $row["email"] . "<br>";
			  echo "Start of Employment: " . $row["hire_date"] . "<br>";
			  echo "End of Employment: " . $row["end_date"] . "<br>";
			  echo "<hr>";
		  }
	  }
	  
	  $conn->close();
	  
	  // Function to get employee type label based on employee_type_id
	  function getEmployeeTypeLabel($employeeType) {
		  if ($employeeType === "M01") {
			  return "Manager";
		  } elseif ($employeeType === "R01") {
			  return "Receptionist";
		  } elseif ($employeeType === "H01") {
			  return "Housekeeper";
		  }
	  }
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