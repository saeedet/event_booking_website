
<!DOCTYPE html>
<?php 
session_start();
include_once('../protect.php');
?>
<html class="no-js"> 
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>University of Wollongong Events Booking</title>

	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
		<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/icomoon.css">
	<link rel="stylesheet" href="../css/themify-icons.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
	<header id="fh5co-header" style="padding-top: 0;">
		<div class="container-fluid">
			<nav class="gtco-nav" role="navigation" style="padding-bottom: 10px; padding-top: 10px;">
				<div class="gtco-container" >
					
					<div class="row">
						<div class=" col-m-4 col-sm-4 col-xs-4" >
							<img src="./../images/logo.svg" style="width:100px;">
						</div>
						<div class="col-m-8 col-xs-8 text-right menu-1">
							<ul>
								<li class="active"><a href="../index.php">Home</a></li>
								<li class="active" <?php if (!isset($_SESSION['message']['user'])) { echo "style=\"display:none;\"";} ?> ><a <?php if (isset($user_admin) && $user_admin == true ) {
								echo "href=\"../dashboard/ample-admin-lite/html/admin_dashboard.php\""; } else { echo "href=\"../dashboard/ample-admin-lite/html/dashboard.php\"";} ?>>Dashboard</a></li>
								

								<li><a href="events.php">Upcoming Events</a></li>
								<li <?php if (isset($_SESSION['message']['user'])) { echo "style=\"display:none;\"";} ?>><a href="../LoginForm/index3.php">SignUp/SignIn</a></li>

								</li>

								<li><a href="#jump_here">Contact</a></li>
								<li><a href="#jump_here">About</a></li>
								<li class="active" <?php if (!isset($_SESSION['message']['user'])) { echo "style=\"display:none;\"";} ?> ><a href="../dashboard/ample-admin-lite/html/log_out.php">LogOUT</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</nav>

			<div class="row">

				<div class="col-lg-12 col-md-12 text-center">
					<h1 id="fh5co-logo"><a href="index.html"></a></h1>
				</div>

			</div>
		
		</div>

	</header>
	<!-- END #fh5co-header -->
	<!--  main body start ///////////////////////////////////////////////////////////// -->
	<div class="container-fluid">
		<div class="row fh5co-post-entry">

			<?php 
				if (isset($_SESSION['message']['user'])) 
				{
					$user_id = $_SESSION['message']['user']['ID'];
				}
				$current_events = current_events_show();				
				foreach ($current_events as $key) 
				{
	                if ($key['price'] == 0) 
	                {
	                    $price = "FREE";
	                    $color = "";
	                }
	                else
	                {
	                    $price = "$".$key['price'];
	                    $color = "style=\"color:red;\"";
	                }					
					echo "<article class=\"col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xxs-12 animate-box\">";
					echo "<figure>";
					echo "<a href=\"/events/single.php?id=".$key['ID']."\">"."<img src=\"images/pic_2.jpg\" alt=\"Image\" class=\"img-responsive\"></a>";
					echo "</figure>";
					echo "<span class=\"fh5co-meta\"><a".$color." href=\"#\">".$price."</a></span>";
					echo "<h2 class=\"fh5co-article-title\">"."<a href=\"/events/single.php?id=".$key['ID']."\">".$key['event_name']."</a></h2>";
					echo "<span class=\"fh5co-meta fh5co-date\">".$key['event_date']."</span>";
					echo "</article>";
				}
			 ?>

		</div>
	</div>
	<!-- end of the body////////////////////////////////////////////////////////////// -->
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
									<li><a href="./../index.php" style="text-transform: capitalize;">Home</a></li>
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
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="js/main.js"></script>

	<script src="../js/owl.carousel.min.js"></script>

	

	</body>
</html>

