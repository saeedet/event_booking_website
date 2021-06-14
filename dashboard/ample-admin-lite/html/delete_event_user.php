<?php 
session_start();
include('../../../database/database_functions.php');
$event_id = $_GET['id'];
$user_id = $_SESSION['message']['user']['ID'];
delete_event_order($event_id,$user_id);
header("Location: dashboard.php");
exit();















 ?>