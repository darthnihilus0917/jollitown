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
	<!-- //header -->
	<!-- banner -->
	<?php include('includes/banner.php'); ?>
	<!-- //banner --> 
	<!--//Header-->
	<!-- //Modal1 -->
	<?php include('includes/modal.php'); ?>
	<!-- //Modal1 -->
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
<!-- team -->

<!-- //team -->
<!-- Gallery -->

<!-- //gallery -->
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
	 <!--// rooms & rates -->
  <!-- visitors -->
	
  <!-- visitors -->
<!-- contact -->
<section class="contact-w3ls" id="contact">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h4>Contact Us</h4>
				<p class="contact-agile2">Sign Up For Our News Letters</p>
				<form  method="post" name="sentMessage" id="contactForm" >
					<div class="control-group form-group">
                        
                            <label class="contact-p1">Full Name:</label>
                            <input type="text" class="form-control" name="name" id="name" required >
                            <p class="help-block"></p>
                       
                    </div>	
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Phone Number:</label>
                            <input type="tel" class="form-control" name="phone" id="phone" required >
							<p class="help-block"></p>
						
                    </div>
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Email Address:</label>
                            <input type="email" class="form-control" name="email" id="email" required >
							<p class="help-block"></p>
						
                    </div>
                    
                    
                    <input type="submit" name="sub" value="Send Now" class="btn btn-primary">	
				</form>
				<?php
				if(isset($_POST['sub']))
				{
					$name =$_POST['name'];
					$phone = $_POST['phone'];
					$email = $_POST['email'];
					$approval = "Not Allowed";
					$sql = "INSERT INTO `contact`(`fullname`, `phoneno`, `email`,`cdate`,`approval`) VALUES ('$name','$phone','$email',now(),'$approval')" ;
					
					
					if(mysqli_query($con,$sql))
					echo"OK";
					
				}
				?>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
			<h4>Connect With Us</h4>
			<p class="contact-agile1"><strong>Phone :</strong>+94 (65)222-44-55</p>
			<p class="contact-agile1"><strong>Email :</strong> <a href="mailto:name@example.com">INFO@SUNRISE.COM</a></p>
			<p class="contact-agile1"><strong>Address :</strong> New Kalmunai Road, Batticaloa, Sri Lanka</p>
																
			<div class="social-bnr-agileits footer-icons-agileinfo">
				<ul class="social-icons3">
								<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
								<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
								<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li> 
								
							</ul>
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3074.7905052320443!2d-77.84987248482734!3d39.586871613613056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c9f6a80ccf0661%3A0x7210426c67abc40!2sVirginia+Welcome+Center%2FSafety+Rest+Area!5e0!3m2!1sen!2sin!4v1485760915662" ></iframe>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<!-- /contact -->
<?php include('includes/footer.php'); ?>
<!--/footer -->
<!-- js -->
<script type="text/javascript" src="assets/scripts/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="assets/scripts/jquery-ui.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.swipebox.min.js"></script>
<script type="text/javascript" src="assets/scripts/jquery.flexslider.js" defer ></script>
<script type="text/javascript" src="assets/scripts/jqBootstrapValidation.js"></script>
<script type="text/javascript" src="assets/scripts/jollitown.js"></script>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!-- start-smoth-scrolling -->
<script src="js/responsiveslides.min.js"></script>
			<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
			</script>
		<!--search-bar-->
		<script src="js/main.js"></script>	
<!--//search-bar-->
<!--tabs-->
<script src="js/easy-responsive-tabs.js"></script>
<script>
$(document).ready(function () {
$('#horizontalTab').easyResponsiveTabs({
type: 'default', //Types: default, vertical, accordion           
width: 'auto', //auto or any width like 600px
fit: true,   // 100% fit in a container
closed: 'accordion', // Start closed if in accordion view
activate: function(event) { // Callback function if tab is switched
var $tab = $(this);
var $info = $('#tabInfo');
var $name = $('span', $info);
$name.text($tab.text());
$info.show();
}
});
$('#verticalTab').easyResponsiveTabs({
type: 'vertical',
width: 'auto',
fit: true
});
});
</script>
<!--//tabs-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	
	<div class="arr-w3ls">
		<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
<!-- //smooth scrolling -->
	<script type="text/javascript" src="assets/scripts/bootstrap-3.1.1.min.js"></script>
</body>
</html>