<?php
//Logout student Status
include '../connection/config.php';
// Initialize the session
session_start();

//Parents LOGOUT BUTTON
$username = $_SESSION["username"];
 $setOfflineStatus_p = "UPDATE parents set online_status = 0 WHERE username = '$username'";
 $result_st = mysqli_query($conn,$setOfflineStatus_p);

// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to index page
header("location:/h_st/index.php");
exit;
?>





