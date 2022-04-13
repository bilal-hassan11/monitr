<?php
//Logout student Status
include '../connection/config.php';
// Initialize the session
session_start();

//Teacher LOGOUT BUTTON
$tid = $_SESSION["t_id"];
$setOfflineStatus_t= mysqli_query($conn, "UPDATE teachers set online_status = 0 WHERE t_id = '$tid'");
$result_t = mysqli_query($conn,$setOfflineStatus_t);
$row_t = mysqli_num_rows($result_t);


// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to index page
header("location:/h_st/index.php");
exit;
?>





