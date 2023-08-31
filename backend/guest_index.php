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
	<title>The Sharp - Luxury Hotel Booking </title>
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
	<!-- Preloader start -->
	<div class="theme-loader">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>
	<!-- Preloader end -->
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
	<div class="banner__area" data-background="assets/img/banner-1.jpg">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="banner__area-title">
						<h1>Harmony of Opulence<span>and Warmth</span></h1>
						<div class="banner__area-title-video">
							<div class="video__play">
								<a class="video-popup" href="#"><i class="fas fa-play"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
			<form action="booking_combinations.php" method="post">
			<div class="check__area">
						<div class="check__area-item">
        <label for="checkin">Check-in Date:</label>
        <input type="date" id="checkin" name="checkin" required><br>
</div>
<div class="check__area-item">
        <label for="checkout">Check-out Date:</label>
        <input type="date" id="checkout" name="checkout" required><br>
		</div>
						<div class="check__area-item"> 
						<div class="check__area-item-room">
        <label for="rooms">Number of Rooms:</label>
        <input type="number" id="rooms" name="rooms" required><br>
        </div>
						</div>
						<div class="check__area-item">
							<div class="check__area-item-room">
        <label for="adults">Number of Adults:</label>
        <input type="number" id="adults" name="adults" required><br>
        
		</div>
						</div>
						<div class="check__area-item button">
							<button class="theme-btn" type="submit">Check Now</button>
						</div>
					</div>
				</form>
			</div>
			
		</div>
	</div>
	<!-- Banner Area End -->
	<!-- Accommodations Area Start -->
	<div class="accommodations__area section-padding">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-5 col-lg-6 lg-mb-30">
					<div class="accommodations__area-title">
						<span class="subtitle__one">Accommodations</span>
						<h2>Welcome To  <h1>The Sharp Hotel</h1></h2>
						<p>Savvy travelers are looking for more than just the next destination on the map. They are looking for a memorable experience and to make new friends along the way.</p>
						<a class="theme-btn" href="about.html">Read More<i class="fal fa-long-arrow-right"></i></a>
					</div>
				</div>
				<div class="col-xl-7 col-lg-6">
					<div class="accommodations__area-right">
						<div class="accommodations__area-right-image">
							<img src="assets/img/hotel/hotel-1.jpg" alt="" style="width: 500px; height: auto;">
							<div class="accommodations__area-right-image-two">
								<img src="assets/img/hotel/hotel-2.jpg" alt="" style="width: 350px; height: auto;">
							</div>
						</div>
					</div>
				</div>
			</div>
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
	<!-- Video Area Start -->
	<div class="video__area" data-background="assets/img/video.jpg">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xxl-6 col-xl-7 col-lg-8">
					<div class="video__area-title">
						<h2>Book hotel rooms, get deals & book flights online.</h2>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-5 col-lg-4">
					<div class="video__area-right">
						<div class="video__play">
							<a class="video-popup" href="#"><i class="fas fa-play"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Video Area End -->
	<!-- Services Area Start -->
	<div class="services__area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 lg-mb-30">
					<div class="services__area-item">
						<div class="services__area-item-icon">
							<img src="assets/img/icon/cleaning.png" alt="">
						</div>
						<div class="services__area-item-content">
							<h5><a href="#">Room Cleaning</a></h5>
							<p>Experience pristine luxury with our meticulous cleaning standards.</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 sm-mb-30">
					<div class="services__area-item">
						<div class="services__area-item-icon">
							<img src="assets/img/icon/wifi.png" alt="">
						</div>
						<div class="services__area-item-content">
							<h5><a href="#">Room Wifi</a></h5>
							<p>Uninterrupted high speed Internet at your fingertips.</p>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
					<div class="services__area-item">
						<div class="services__area-item-icon">
							<img src="assets/img/icon/location.png" alt="">
						</div>
						<div class="services__area-item-content">
							<h5><a href="#">Pickup & Drop Off</a></h5>
							<p>Available 24/7.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Services Area End -->
	<!-- Feature Area Start -->
	<div class="feature__area">
		<div class="container">
			<div class="row align-items-center bg-left mb-60">
				<div class="col-xl-6 col-lg-6">
					<div class="feature__area-image">
						<img class="img__full" src="assets/img/features/feature-1.jpg" alt="">
					</div>
				</div>
				<div class="col-xl-6 col-lg-6">
					<div class="feature__area-left">
						<div class="feature__area-left-title">
							<span class="subtitle__one">Our Food</span>
							<h2>Restaurant Tadka</h2>
							<p>Cuisines from all over the world.</p>
							<a class="theme-border-btn" href="services-details.html">Read More<i class="fal fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row align-items-center bg-right mb-60">
				<div class="col-xl-6 col-lg-6  order-last order-lg-first">
					<div class="feature__area-left">
						<div class="feature__area-left-title">
							<span class="subtitle__one">Read Our Books</span>
							<h2>The Library</h2>
							<p>We offer peace.</p>
							<a class="theme-border-btn" href="services-details.html">Read More<i class="fal fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6">
					<div class="feature__area-image">
						<img class="img__full" src="assets/img/features/feature-2.jpg" alt="">
					</div>
				</div>
			</div>
			<div class="row align-items-center bg-left mb-60">
				<div class="col-xl-6 col-lg-6">
					<div class="feature__area-image">
						<img class="img__full" src="assets/img/features/feature-3.jpg" alt="">
					</div>
				</div>
				<div class="col-xl-6 col-lg-6">
					<div class="feature__area-left">
						<div class="feature__area-left-title">
							<span class="subtitle__one">Fitness Equipment</span>
							<h2>Exercise equipment</h2>
							<p>For your workout needs.</p>
							<a class="theme-border-btn" href="services-details.html">Read More<i class="fal fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row align-items-center bg-right">
				<div class="col-xl-6 col-lg-6 order-last order-lg-first">
					<div class="feature__area-left">
						<div class="feature__area-left-title">
							<span class="subtitle__one">Experiences</span>
							<h2>Swimming Pool</h2>
							<p>Stay chill.</p>
							<a class="theme-border-btn" href="services-details.html">Read More<i class="fal fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6">
					<div class="feature__area-image">
						<img class="img__full" src="assets/img/features/feature-4.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Feature Area End -->
	<!-- Blog Area Start -->	
	<div class="blog__area section-padding">
		<div class="container">
			<div class="row mb-60">
				<div class="col-xl-12">
					<div class="blog__area-title">
						<span class="subtitle__one">Our Blog</span>
						<h2>Read Our Blog and News</h2>						
					</div>					
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-lg-6 xl-mb-30">
					<div class="blog__area-item">
						<div class="blog__area-item-image">
							<a href="blog-details.html"><img src="assets/img/blog/blog-1.jpg" alt=""></a>
						</div>
						<div class="blog__area-item-content">
							<div class="blog__area-item-content-box">
								<div class="blog__area-item-content-box-date">
									<h3>7</h3>
									<span>July 2023</span>
								</div>
								<div class="blog__area-item-content-box-title">
									<h5><a href="blog-details.html">The ultimate guide to finding the best hotels in your area.</a></h5>
								</div>
							</div>
							<div class="blog__area-item-content-btn">
								<a class="simple-btn-2" href="blog-details.html">Read More<i class="fal fa-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 lg-mb-30">
					<div class="blog__area-item blog__area-item-hover">
						<div class="blog__area-item-image">
							<a href="blog-details.html"><img src="assets/img/blog/blog-2.jpg" alt=""></a>
						</div>
						<div class="blog__area-item-content">
							<div class="blog__area-item-content-box">
								<div class="blog__area-item-content-box-date">
									<h3>7</h3>
									<span>July 2023</span>
								</div>
								<div class="blog__area-item-content-box-title">
									<h5><a href="blog-details.html">Book a room today at most affordable rates.</a></h5>
								</div>
							</div>
							<div class="blog__area-item-content-btn">
								<a class="simple-btn-2" href="blog-details.html">Read More<i class="fal fa-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6">
					<div class="blog__area-item">
						<div class="blog__area-item-image">
							<a href="blog-details.html"><img src="assets/img/blog/blog-3.jpg" alt=""></a>
						</div>
						<div class="blog__area-item-content">
							<div class="blog__area-item-content-box">
								<div class="blog__area-item-content-box-date">
									<h3>7</h3>
									<span>July 2023</span>
								</div>
								<div class="blog__area-item-content-box-title">
									<h5><a href="blog-details.html">The Sharp is the best choice for hotel booking.</a></h5>
								</div>
							</div>
							<div class="blog__area-item-content-btn">
								<a class="simple-btn-2" href="blog-details.html">Read More<i class="fal fa-long-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Blog Area End -->	
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