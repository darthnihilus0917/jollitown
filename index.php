<?php include('config/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Jollibee: Welcome to Jollitown</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />	
	<script type="application/x-javascript"> 
		addEventListener("load", function() { 
			setTimeout(hideURLbar, 0); 
		}, false);

		function hideURLbar(){ 
			window.scrollTo(0,1); 
		} 
	</script>
	<!-- //for-mobile-apps -->
	<?php include('includes/styles_fonts.php'); ?>
<!--//fonts-->
</head>
<body>
	<!-- header -->
	<?php include('includes/header.php'); ?>
	<!-- banner -->
	<?php include('includes/banner.php'); ?>
	<!--//Header-->
	<!-- //Modal1 -->
	<?php include('includes/modal.php'); ?>
	<div id="availability-agileits">
		<div class="col-md-12 book-form-left-w3layouts">
			<a href="reserve.html"><h2>WELCOME TO JOLIITOWN THEME PARK!!</h2></a>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- /about -->
 	<div class="about-wthree" id="about">
		  <div class="container">
				   <div class="ab-w3l-spa">
                            <h3 class="title-w3-agileits title-black-wthree">About JolliTown</h3> 
						   <p class="about-para-w3ls">All our brands are trusted and well-loved, craved around the world:
								Renowned for consistently great tasting food.
								Recognized for high value for money.
								Endeared for warm and sincere distinct service to our customers.
								Admired for our beautiful stores in excellent location.
							</p>
						   <img src="images/abouts2.jpg" class="img-responsive" alt="Hair Salon">
										<div class="w3l-slider-img">
											<img src="images/abouts.jpg" class="img-responsive" alt="Hair Salon">
										</div>
                                       <div class="w3ls-info-about">
										    <h4>We are acknowledged as one of the Best Companies to Work for,</h4>
											<p>regarded for our efficient systems and processes, highly engaged teams and people-focused culture. </p>
										</div>
		          </div>
		   	<div class="clearfix"> </div>
    </div>
</div>
 	<!-- //about -->
<!--sevices-->
<?php include('includes/services.php'); ?>
<!--//sevices-->

<!-- rooms & rates -->
<section id="theme">

      <div class="plans-section" id="menu">
				 <div class="container">
				 <h3 class="title-w3-agileits title-black-wthree">THEME FAVORS</h3>
						<div class="priceing-table-main">
				 <div class="col-md-3 price-grid">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img src="images/hats.jpg" alt=" " class="img-responsive" />
							<h4>Party Hats</h4>
						</div>
						<div class="price-gd-bottom">
							   <div class="price-list">
									<ul>
										<?php
											for ($i=1;$i<=5;$i++) {
												echo "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
											}
										?>
								    </ul>
							</div>
							<div class="price-selet">	
												
								<a href="admin/reservation.php" >Book Now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid ">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img src="images/card.jpg" alt=" " class="img-responsive" />
							<h4>Invitational Card</h4>
						</div>
						<div class="price-gd-bottom">
							<div class="price-list">
								<ul>
									<?php
										for ($i=1;$i<=5;$i++) {
											echo "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
										}
									?>
								</ul>
							</div>
							<div class="price-selet">
							
								<a href="admin/reservation.php" >Book Now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid lost">
					<div class="price-block agile">
						<div class="price-gd-top">
						<img src="images/liner.jpeg" alt=" " class="img-responsive" />
							<h4>Trayliner</h4>
						</div>
						<div class="price-gd-bottom">
							<div class="price-list">
								<ul>
									<?php
										for ($i=1;$i<=5;$i++) {
											echo "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
										}
									?>
								</ul>
							</div>
							<div class="price-selet">
								
								<a href="admin/reservation.php" >Book Now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 price-grid wthree lost">
					<div class="price-block agile">
						<div class="price-gd-top ">
							<img src="images/boards.jpg" alt=" " class="img-responsive" />
							<h4>Message Board</h4>
						</div>
						<div class="price-gd-bottom">
							<div class="price-list">
								<ul>
									<?php
										for ($i=1;$i<=4;$i++) {
											echo "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
										}
									?>
									<li><i class="fa fa-star-o" aria-hidden="true"></i></li>
								</ul>
							</div>
							<div class="price-selet">
								<a href="admin/reservation.php" >Book Now</a>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	</section>
	<!-- contact -->
	<section class="contact-w3ls" id="contact">
		<div class="container">
			<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
				<?php include('includes/contact_us.php'); ?>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
				<?php include('includes/connect_with_us.php'); ?>
			</div>
			<div class="clearfix"></div>
		</div>
	</section>
	
	<!--footer -->
	<?php include('includes/footer.php'); ?>
	
	<!-- js -->
	<script type="text/javascript" src="assets/scripts/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="assets/scripts/jquery-ui.js"></script>
	<script type="text/javascript" src="assets/scripts/bootstrap-3.1.1.min.js"></script>
	<script type="text/javascript" src="assets/scripts/jquery.swipebox.min.js"></script>
	<script type="text/javascript" src="assets/scripts/jquery.flexslider.js" defer ></script>
	<script type="text/javascript" src="assets/scripts/jqBootstrapValidation.js"></script>
	<script type="text/javascript" src="assets/scripts/move-top.js"></script>
	<script type="text/javascript" src="assets/scripts/easing.js"></script>
	<script type="text/javascript" src="assets/scripts/responsiveslides.min.js"></script>
	<script type="text/javascript" src="assets/scripts/main.js"></script>
	<script type="text/javascript" src="assets/scripts/easy-responsive-tabs.js"></script>
	<script type="text/javascript" src="assets/scripts/jollitown.js"></script>

	<!-- smooth scrolling -->	
	<div class="arr-w3ls">
		<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>

</body>
</html>