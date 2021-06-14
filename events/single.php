
<!DOCTYPE html>
<?php 
session_start();
include_once('../protect.php');
$event_id = $_GET['id'];

$guest_user = true; 
$event_booked ="";
if (isset($_SESSION['message']['user'])) 
{
	$event_booked = false;
	$guest_user = false; 
	$user_id = $_SESSION['message']['user']['ID'];
	$user_events = booking_history($user_id);
	
	foreach ($user_events as $key)
	{
		if ($key['event_id'] == $event_id)
		{
			$event_booked = true;
		}
	} 

}




$this_event = one_event($event_id);
if ($this_event['price'] == 0) 
{
    $price = "FREE";
}
else
{
    $price = "$".$this_event['price'];
}	

$capacity = capacity($this_event['event_name']);
if ($capacity == 0) 
{
	$status = "FULL";
}
else
{
	$status = $capacity;

}






?>
 <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>UOW BOOKING SYSTEM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="events,UOW, university of wollongong," />
	<meta name="author" content="silk road group" />

	

	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="../css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>


	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<header id="fh5co-header">
		
		<div class="container-fluid">
			<nav class="gtco-nav" role="navigation">
				<div class="gtco-container" >
					
					<div class="row">
						<div class="col-sm-2 col-xs-12">
							<div id="gtco-logo"><a href="index.html">University of wollongong</div>
						</div>
						<div class="col-xs-10 text-right menu-1">
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

	<div class="container-fluid">
		<div class="row fh5co-post-entry single-entry">
			<article class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				<h2 class="fh5co-article-title animate-box"><a href="single.html"><?php echo $this_event['event_name'] ; ?></a></h2>
				<figure class="animate-box">
					<img src="images/single_1.jpg" alt="Image" class="img-responsive">
				</figure>
				<span class="fh5co-meta animate-box"><a <?php if ($guest_user == true) {  echo "href=../LoginForm/index3.php";} elseif ($event_booked == false) {echo "href=\""."single_ex.php?id=".$event_id."\"";} ?> class="btn btn-danger"><?php if ($event_booked == true) { echo "Already Booked";} else { echo "BOOK NOW";} ?></a></span>

				<span class="fh5co-meta fh5co-date animate-box">DATE: <?php echo $this_event['event_date'] ; ?></span>
				<span class="fh5co-meta fh5co-date animate-box">ADDRESS: <?php echo $this_event['address'] ; ?></span>
				<span class="fh5co-meta fh5co-date animate-box">PRICE: <?php echo $price; ?></span>
				<span class="fh5co-meta fh5co-date animate-box" <?php if ($capacity == 0) { echo "style=\"display:none;\"";} ?>>CAPACITY: <?php echo $this_event['capacity']; ?> ---  AVAILABLE: <?php echo $capacity ?></span>

				
				<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-left content-article">
					<div class="row">
						<div class="col-lg-8 fh5co-highlight animate-box">
							<p><?php echo $this_event['txt']; ?></p>
						</div>
	
					</div>

					
					
				</div>
			</article>
		</div>
	</div>
		<footer id="gtco-footer" class="gtco-section" role="contentinfo">
			<div class="gtco-container" id="jump_here">
				<div class="row row-pb-md">
					<div class="col-md-4 gtco-widget gtco-footer-paragraph">
						<h3>University of Wollongong Event Booking Website</h3>
						<p>This is a place where you can find all the upcoming events and book for events that you are interested in...</p>
					</div>
					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6 gtco-footer-link">
								<h3>Links</h3>
								<ul class="gtco-list-link">
									<li><a href="../index.php">Home</a></li>
									<li><a href="https://www.uow.edu.au/index.html">University of Wollongong</a></li>
									<li><a href="https://www.library.uow.edu.au/index.html">UOW Library</a></li>
									<li><a href="#">Contact</a></li>
								</ul>

							</div>
						</div>

					</div>
					<div class="col-md-4">
							<ul >
								<li class="address">Wollongong wollongong</li>
								<li class="phone"><a href="tel://1234567890">1235 2355 980</a></li>
								<li class="email"><a href="#">info@yoursite.com</a></li>
								<li class="url"><a href="#">www.yoursite.com</a></li>
							</ul>

					</div>				
			</div>
			<div class="gtco-copyright">
				<div class="gtco-container">
					<div class="row">
						<div class="col-md-6 text-left">
							<p><small>&copy; 2018 All Rights Reserved. </small></p>
						</div>
						<div class="col-md-6 text-right">
							<p><small>Designed by <a href="#" target="_blank">Silk Road Group</a> </small> </p>
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

	</body>
</html>

