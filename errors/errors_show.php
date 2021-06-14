<?php 

	if (isset($_SESSION['message']) && $_SESSION['message']['error_key'] === true)
	{

		// echo print_r($_SESSION['message']);




		echo "<ul class='err_11'>";
		foreach ($_SESSION['message']['error_details'] as $err)
		{
			echo "<li>".$err ."</li>";
		}
		echo "</ul>";
		unset($_SESSION['message']);
	}

?>