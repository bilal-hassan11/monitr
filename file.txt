<?php

include '../connection/config.php';
$mess = $_POST["mess"];
$send = $_POST["send"];
$max = $_POST["max"];
$date = date("m-d-Y");
$time = strtotime($max);
$newformat = date('m-d-Y',$time);

$sql = "INSERT INTO `announcements` (`message`, `send`,`date`,`end_date`) VALUES ('$mess', '$send','$date','$newformat');"; 

if(mysqli_query($conn, $sql)){
	echo "Successfully Saved.";
}else{
	echo "Can't Saved Error Ad-100. Repeort To Admin"; 
}
?>
