<?php
$servername = "localhost";
$username = "root";
$password = "";
$datbase = "portal";
$conn = mysqli_connect($servername,$username,$password,$datbase);
//  ----
$mess = $_POST["mess"];
$send = $_POST["send"];
$max = $_POST["max"];
$date = date("d-m-Y");
$time = strtotime($max);
$newformat = date("d-m-Y",$time);

// echo $newformat."<br>";
// echo gettype($newformat);
// echo ($);
// sql sa string ma data aya ga ussa date ma change karna ha taka sql jo fetch kar rahi ha data ussa haam 

$sql = "INSERT INTO `announcements` (`message`, `send`,`date`,`end_date`) VALUES ('$mess', '$send','$date','$newformat');"; 
// $sql = "INSERT INTO `announcements` (`message`, `send`,`date`,`end_date`) VALUES ('$mess', '$send','$date','$max');"; 

if(mysqli_query($conn, $sql)){
	echo "Successfully Saved.";
}else{
	echo "Can't Saved Error Ad-100. Repeort To Admin"; 
}
?>
