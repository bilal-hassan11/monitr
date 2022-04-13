<?php

include('../connection/config.php');
$date = date('Y-m-d');

$sql_st="select * from students where acc_approval = '1'";
$result_st = mysqli_query($conn,$sql_st);
$row_st = mysqli_num_rows($result_st);

$sql_t="select * from teachers where acc_approval = '1'";
$result_t = mysqli_query($conn,$sql_t);
$row_t = mysqli_num_rows($result_t);

$sql_em ="SELECT * FROM `subjects`";
$result_em =mysqli_query($conn,$sql_em);
$row_em = mysqli_num_rows($result_em);

$sql_ed ="SELECT * FROM `attendance` WHERE dateTaken = '$date' and status = '1';";
$result_ed =mysqli_query($conn,$sql_ed);
$row_ed = mysqli_num_rows($result_ed);
?>