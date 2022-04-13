<?php
//Logout student Status
include '../connection/config.php';
// Initialize the session
session_start();

//STUDENT LOGOUT BUTTON
$roll_no = $_SESSION["st_id"];
$setOfflineStatus = mysqli_query($conn, "UPDATE students set online_status = 0 WHERE roll_no='$roll_no'");
$result_st = mysqli_query($conn,$setOfflineStatus);
$row_st = mysqli_num_rows($result_st);

// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to index page
header("location:/h_st/index.php");
exit;
?>





