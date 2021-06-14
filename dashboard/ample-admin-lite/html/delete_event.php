<?php 

include('../../../database/database_functions.php');
$event_id = $_GET['id'];
delete_event($event_id);
header("Location: admin_dashboard.php");
exit();




















 ?>