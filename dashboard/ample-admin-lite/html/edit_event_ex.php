<?php 
$error_key = false;
$error_details = array();
include('../../../database/database_functions.php');

$event_id = $_GET['id'];


if (isset($_POST['event_name']) && isset($_POST['txt']) && isset($_POST['event_date']) && isset($_POST['address']) && isset($_POST['capacity']) && isset($_POST['fileToUpload']) && isset($_POST['price'])) 
{

	$event_name = $_POST['event_name'];
	$txt = $_POST['txt'];
	$event_date = $_POST['event_date'];
	$address = $_POST['address'];
	$capacity = $_POST['capacity'];
	$image = $_POST['fileToUpload'];
	$promo_code = $_POST['promo_code'];
	$price = $_POST['price'];

	update_event($event_name,$txt,$event_date,$address,$capacity,$image,$promo_code,$event_id,$price);

}
else
{
	$error_key = true;
	array_push($error_details , "Fill all the required information please!");

}
if ($error_key == true) 
{
	$message = array(
						"error_key" => $error_key,
						"error_details" => $error_details
		);

	$_SESSION['message'] = $message;
	header("Location: ../LoginForm/index3.php");
	exit();
}
header("Location: admin_dashboard.php");
exit();









 ?>