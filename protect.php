<?php 

  	// include_once(__DIR__."/database/database.php");
	include_once(__DIR__."/database/database_functions.php");



	if (isset($_SESSION['message']['user']))
	{
		$us = $_SESSION['message']['user']['username'];
		$ps = $_SESSION['message']['user']['password'];

		$temp = user_check($us , $ps);
		if ($temp['error_key'] === true) 
		{
			unset($_SESSION['message']);
			header("Location: /LoginForm/index3.php");
		}
	 
	} 



?>
