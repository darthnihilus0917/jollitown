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

		function hideURLbar() { 
			window.scrollTo(0,1); 
		} 
	</script>
	<!-- //for-mobile-apps -->
	<?php include('includes/styles_fonts.php'); ?>
</head>
<body>
	<!-- header -->
	<?php include('includes/header.php'); ?>
	<!-- banner -->
	<?php include('includes/banner.php'); ?>	
	<!-- modal -->
	<?php include('includes/modal.php'); ?>
	<!-- welcome -->
	<?php include('includes/welcome.php'); ?>
	<!-- about -->
	<?php include('includes/about.php'); ?>
	<!--sevices-->
	<?php include('includes/services.php'); ?>
	<!-- rooms & rates -->
	<section id="theme">
		<div class="plans-section" id="menu">
			<div class="container">
				<h3 class="title-w3-agileits title-black-wthree">THEME FAVORS</h3>
				<div class="priceing-table-main">
					<div class="col-md-3 price-grid">
						<?php include('includes/party_hats.php'); ?>
					</div>
					<div class="col-md-3 price-grid ">
						<?php include('includes/invitational_cards.php'); ?>
					</div>
					<div class="col-md-3 price-grid lost">
						<?php include('includes/trayliner.php'); ?>
					</div>
					<div class="col-md-3 price-grid wthree lost">
						<?php include('includes/message_board.php'); ?>
					</div>
					<div class="clearfix"></div>
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