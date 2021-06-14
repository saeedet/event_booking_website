<?php 

session_start();
include('../database/database_functions.php');
$us = "";
$ps = "";
$error_key = false;
$error_details = array();


if (isset($_POST['us']) && isset($_POST['ps'])) 
{
	$us = $_POST['us'];
	$ps = $_POST['ps'];
	$message = user_check($us , $ps);
	if ($message['error_key'] == true)
	{
		$_SESSION['message'] = $message;
		header("Location: ../LoginForm/index3.php");
		exit();
	}
}
else
{
	$error_key = true;
	array_push($error_details, "Fill all the required information please!");
}


$_SESSION['message'] = $message;
header("Location: ../index.php");
exit();


 ?>