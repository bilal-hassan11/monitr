<?php

	$conn = mysqli_connect("localhost","root","","portal") or die("Connection failed");

	if($_POST['type'] == ""){
		$sql = "SELECT DISTINCT class FROM `students` ORDER BY class DESC";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['class']}'>{$row['class']}</option>";
		}
	}else if($_POST['type'] == "stateData"){

		$sql = "SELECT  * FROM students WHERE class = '{$_POST['id']}'";

		$query = mysqli_query($conn,$sql) or die("Query Unsuccessful.");

		$str = "";
		while($row = mysqli_fetch_assoc($query)){
		  $str .= "<option value='{$row['roll_no']}'>{$row['roll_no']}</option>";
		}
	}

	echo $str;
 ?>
