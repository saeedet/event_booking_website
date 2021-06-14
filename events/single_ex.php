<?php 
session_start();
include_once('../protect.php');
$event_id =  $_GET['id'];
$user_id = $_SESSION['message']['user']['ID'];



user_booking($event_id,$user_id);
header("Location: ../dashboard/ample-admin-lite/html/dashboard.php");
exit();

















 ?>