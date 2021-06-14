<?php 

	include("sql/connection_string.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


	<?php 

		$sql = mysqli_query($link , "SELECT `news`.* , `users`.`name` 								from `news`
									left join `users` on `users`.`ID` = `news`.`users_admin_ID`
									ORDER BY `news`.`ID` DESC
									");

		while ($row = mysqli_fetch_array($sql)) 
		{
			echo $row['name'] . "<br>" . $row['title_fa'] . "<br>" . $row['text_fa'] . "<hr>";
		}

	?>


</body>
</html>