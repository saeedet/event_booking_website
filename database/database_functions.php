<?php 

include('database.php');


//--------------------------------------------------------------------------//

function user_add($username,$password,$email)
{
	GLOBAL $link;
	$error_key = false;
	$error_details = array();

	$check = mysqli_query($link , "SELECT * FROM `users` WHERE `username` = '$username'");
	if (mysqli_fetch_array($check)) 
	{
		$error_key = true;
		array_push($error_details, "This USERNAME is already taken!!");
	}
	if ($error_key == false) 
	{
		$sql = mysqli_query($link , "INSERT INTO `users`(`username`, `password`, `email`) VALUES ('$username','$password','$email')" );
	}
	
	

	return array(
						"error_key" => $error_key,
						"error_details" => $error_details
		);
}

//----------------------------------------------------------------------------//

function user_check($us , $ps)
{
	GLOBAL $link;
	$error_key = false;
	$admin_key = false;
	$this_user = array();
	$error_details = array();

	$sql = mysqli_query($link , "SELECT * FROM `users` WHERE `username` = '$us' AND `password` = '$ps'");
	$sql_admin = mysqli_query($link , "SELECT * FROM `admins` WHERE `username` = '$us' AND `password` = '$ps'");

	if ($row = mysqli_fetch_array($sql)) 
	{
		if ($row2 = mysqli_fetch_array($sql_admin)) 
		{
			$admin_key = true;
		}	

		$this_user = array(
				"ID" => (int)$row['ID'],
				"username" => $row['username'],
				"password" => $row['password'],
				"admin_key" => $admin_key

			);
		

	}
	else
	{
		$error_key = true;
		array_push($error_details, "WRONG USERNAME or PASSWORD!!");
	}
	
	return array(
						"error_key" => $error_key,
						"error_details" => $error_details,
						"user" => $this_user

		);
}

//-------------------------------------------------------------------------------------//


function add_event($event_nam,$txt,$event_date,$address,$capacity,$image,$promo_code,$price)
{
	GLOBAL $link;
	$sql = mysqli_query($link , "INSERT INTO `events`(`event_name`, `txt`, `event_date`, `address`, `capacity`, `image`, `promo_code`, `price`) 
										VALUES ('$event_nam','$txt','$event_date','$address','$capacity','$image','$promo_code', '$price')"
												);
}

//-------------------------------------------------------------------------------------------///

function events_show()
{
	GLOBAL $link;
	$sql = mysqli_query($link , "SELECT * FROM `events` ORDER BY `event_date` DESC");
	return $sql;
}
function current_events_show()
{
	GLOBAL $link;
	$events = mysqli_query($link , "SELECT * FROM `events` WHERE `events`.`event_date` > (CURRENT_DATE)");
	return $events;
}

function main_current_events_show()
{
	GLOBAL $link;
	$events = mysqli_query($link , "SELECT * FROM `events` WHERE `events`.`event_date` > (CURRENT_DATE) ORDER BY `event_date` ASC LIMIT 6");
	return $events;
}


///---------------------------------------------------------------------////////////////

function capacity($event_name)
{
	GLOBAL $link;
	$capacity = 0;
	$sql = mysqli_query($link , "SELECT * FROM `events` WHERE `event_name` = '$event_name'");
	if ($row = mysqli_fetch_array($sql))
	{
		$event_id = $row['ID'];
		$event_capacity = $row['capacity'];
		$sql2 = mysqli_query($link , "SELECT COUNT(*) FROM `booked_events` WHERE `event_id` = '$event_id'");
		$num = mysqli_fetch_array($sql2);
		$booked_event = $num['0'];
		$capacity = (int)$event_capacity - $booked_event;
	}

	return $capacity;


}

/////////--------------------------------------

function one_event($event_id)
{
	GLOBAL $link;
	$sq1 = mysqli_query($link , "SELECT * FROM `events` WHERE `ID` = '$event_id'");
	$this_event = mysqli_fetch_array($sq1);
	return $this_event;
}




///////------------------------------------

function update_event($event_name,$txt,$event_date,$address,$capacity,$image,$promo_code,$event_id,$price)
{

GLOBAL $link;
$sql = mysqli_query($link , "UPDATE `events` 
											SET 
												`event_name`='$event_name',
												`txt`='$txt',
												`event_date`='$event_date',
												`address`='$address',
												`capacity`='$capacity',
												`image`='$image',
												`promo_code`='$promo_code', 
												`price` = '$price'
												  WHERE 
												  `events`.`ID` = '$event_id'"
												);


}

////////////---------------------------------------
function delete_event($event_id)
{
	GLOBAL $link;
	$sql = mysqli_query($link , "DELETE FROM `events` WHERE `events`.`ID` = '$event_id'");



}
function delete_event_order($event_id,$user_id)
{

	GLOBAL $link;
	$sql = mysqli_query($link , "DELETE FROM `booked_events` WHERE `user_id` = '$user_id' AND `event_id` = '$event_id' ");	


}


function booking_history($user_id)
{

	GLOBAL $link;
	$user_events = mysqli_query($link , "SELECT * FROM `events` LEFT JOIN `booked_events` ON `events`.`ID` = `booked_events`.`event_id` WHERE `user_id` = '$user_id'");

	// $user_events = mysqli_fetch_array($sq1);
	return $user_events;


}


function user_booking($event_id,$user_id)
{
	GLOBAL $link;
	$sql = mysqli_query($link , "INSERT INTO `booked_events`(`event_id`, `user_id`)
										 VALUES ($event_id,$user_id)");

}















 ?>
