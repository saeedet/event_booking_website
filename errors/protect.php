<?php 
	session_start();

	if (isset($_SESSION['user']))
	{
		
		include_once("var.php");	
 
		$us = $_SESSION['user']['username'];
		$ps = $_SESSION['user']['password'];


		$trust = false;
		for ($i=0; $i < count($usernames) ; $i++) 
		{ 
			if ($usernames[$i] == $us && $passwords[$i] == $ps)
			{
				$trust = true;
			}
		}

		if ($trust == false)
		{
			unset($_SESSION['user']);
			header("Location: login.php");
			exit();
		}


	}
	else
	{
		header("Location: login.php");
		exit();
	}


?>