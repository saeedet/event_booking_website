<?php 

session_start();
include('../database/database_functions.php');
$new_us = "";
$new_ps = "";
$email = "";
$error_key = false;
$error_details = array();



if (isset($_POST['new_us']) && isset($_POST['new_ps']) && isset($_POST['email']) && isset($_POST['new_ps_confirm'])) 
{
	if ($_POST['new_ps'] == $_POST['new_ps_confirm']) 
	{
		$new_us = $_POST['new_us'];
		$new_ps = $_POST['new_ps'];
		$email = $_POST['email'];
		$message = user_add($new_us,$new_ps,$email);
		if ($message['error_key'] == true) 
		{
			$_SESSION['message'] = $message;
			header("Location: ../LoginForm/index3.php");
			exit();	
		}
		else
		{
			header("Location: ../index.php");
			exit();	
		}

		// dataaaaaaaaaaaaaaaaaaaaa baseeeeeeeeeeeeeeeeeeee ///////////////////////////////////////////// dont forget $new_ps = "uow" . $new_ps . "xim" ///// $new_ps_hash = md5($new_ps)
	}
	else
	{
		$error_key = true;
		array_push($error_details , "Please confirm your PASSWORD correctly!");
	}

	

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



 ?>