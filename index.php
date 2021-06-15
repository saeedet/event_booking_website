<!DOCTYPE HTML>

<?php
	session_start();
	include_once('protect.php');
	if (isset($_SESSION['message']['user']))
	{
		$user_admin = $_SESSION['message']['user']['admin_key'];
	}
	$latest_events = main_current_events_show();
?>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>UOW Event Booking</title>

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>



	</head>
	<body>

	<div class="gtco-loader"></div>

	<div id="page">

		<nav class="gtco-nav" role="navigation" style="padding-bottom: 10px; padding-top: 10px;">
			<div class="gtco-container">

				<div class="row">
					<div class=" col-m-4 col-sm-4 col-xs-4" >
						<img src="./images/logo.svg" style="width:100px;">
					</div>
					<div class="col-m-8 col-xs-8 text-right menu-1">
						<ul>
							<li class="active"><a href="index.php">Home</a></li>
							<li class="active" <?php if (!isset($_SESSION['message']['user'])) { echo "style=\"display:none;\"";} ?> ><a <?php if (isset($user_admin) && $user_admin == true ) {
								echo "href=\"dashboard/ample-admin-lite/html/admin_dashboard.php\""; } else { echo "href=\"dashboard/ample-admin-lite/html/dashboard.php\"";} ?>>Dashboard</a></li>

							<li class="has-dropdown">
								<a href="#">Services</a>
								<ul class="dropdown">
									<li><a href="events/events.php">Upcoming Events</a></li>
									<li <?php if (isset($_SESSION['message']['user'])) { echo "style=\"display:none;\"";} ?>><a href="LoginForm/index3.php">SignUp/SignIn</a></li>

								</ul>
							</li>

							<li><a href="#jump_here">Contact</a></li>
							<li><a href="#jump_here">About</a></li>
							<li class="active" <?php if (!isset($_SESSION['message']['user'])) { echo "style=\"display:none;\"";} ?> ><a href="dashboard/ample-admin-lite/html/log_out.php">LogOUT</a></li>
						</ul>
					</div>
				</div>

			</div>
		</nav>

		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12">
					<div class="owl-carousel owl-carousel-fullwidth">
						<div class="item">
							<a href="#">
								<img src="images/pic3.jpg" alt="UOW EVENTS">
								<div class="slider-copy">
									<h2>Architecture #1</h2>
								</div>
							</a>
						</div>
						<div class="item">
							<a href="#">
								<img src="images/pic2.jpg" alt="UOW EVENTS">
								<div class="slider-copy">
									<h2>Architecture #1</h2>
								</div>
							</a>
						</div>
						<div class="item">
							<a href="#">
								<img src="images/pic1.jpg" alt="UOW EVENTS">
								<div class="slider-copy">
									<h2>Architecture #1</h2>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="gtco-section">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 gtco-heading text-center">
						<h2>Events</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus placerat enim et urna sagittis, rhoncus euismod erat tincidunt. Donec tincidunt volutpat erat.</p>
					</div>
				</div>
				<div class="row">

					<div class="col-md-12">
						<div class="owl-carousel owl-carousel-carousel">
							<?php
								if (!empty($latest_events)) {
									foreach ($latest_events as $key)
									{
										echo "<div class=\"item\">";
										echo "<div class=\"gtco-item\">";
										echo "<a href=\"events/single.php?id=".$key['ID']."\"><img src=\"images/img_1.jpg\" alt=\"\" class=\"img-responsive\"></a>";
										echo "<h2><a href=\"#\">".$key['event_name']."</h2></a>";
										echo "<p class=\"role\">".$key['address']."</p>";
										echo "</div>";
										echo "</div>";
									}
								}
								else{
									echo "<h3>No upcoming event!</h3>";
								}
							 ?>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- END Event section -->
		</div>
		<footer id="gtco-footer" class="gtco-section" role="contentinfo">
			<div class="gtco-container" id="jump_here">
				<div class="row row-pb-md">
					<div class="col-md-6 gtco-widget gtco-footer-paragraph">
						<h3>UOW Event Booking Website</h3>
						<p style="width: 260px;">This is a place where you can find all the upcoming events and book the ones that you are interested in...</p>
					</div>
					<div class="col-md-6">
							<div class="gtco-footer-link" style="position: relative; float: right; margin-right: 40px;">
								<h3>Links</h3>
								<ul class="gtco-list-link">
									<li><a href="index.php" style="text-transform: capitalize;">Home</a></li>
									<li><a href="https://www.uow.edu.au/index.html" style="text-transform: capitalize;">UOW Website</a></li>
									<li><a href="https://www.library.uow.edu.au/index.html" style="text-transform: capitalize;">UOW Library</a></li>
									<li><a href="#" style="text-transform: capitalize;">Contact</a></li>
								</ul>
							</div>
					</div>
			</div>
			<div class="gtco-copyright">
				<div class="gtco-container">
					<div class="row">
						<div class="col-md-6 text-left">
							<p><small>&copy; 2019 All Rights Reserved. </small></p>
						</div>
						<div class="col-md-6 text-right">
							<p><small>Designed by <a href="#" target="_blank">Saeed ET</a> </small> </p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- END footer -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>

	<!-- Main -->
	<script src="./js/script_files.js">

	</script>

	</body>
</html>

