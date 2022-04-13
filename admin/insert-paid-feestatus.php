<?php

include '../connection/config.php';
$json = file_get_contents('php://input');
//print_r($json);
//print_r($_POST);
//exit();
// Converts it into a PHP object
//echo "yews";
$data = json_decode($json,true);
//rint_r($data);
//exit();
$class_no = $data['class_no'];
$roll_no = $data['roll_no'];
$Total_Amount = $data['Total_Amount'];
$admin = $data['admin'];

$DataArrPr = $data['DataArrPr'];

$sql = "INSERT INTO `tbl_fees_amount_paid` (`class_no`,`roll_no`,`Total_Amount`,`CreatedBy`) VALUES ('$class_no', '$roll_no', '$Total_Amount', '$admin')";
 $result = mysqli_query($conn,$sql);

 if($result){
  $id = mysqli_insert_id($conn);
  foreach($DataArrPr as $obj){
  $Fee_Type  = $obj['Fee_Type'];
  $Frequency  = $obj['Frequency'];
  $Status  = $obj['Status'];
  $Amount  = $obj['Amount'];

  $sql1 =   "INSERT INTO `tbl_feestype_amountpaid` (`Fee_Amount_Paid`,`Fee_Type`, `Frequency`, `Status`, `Amount`,`Is_Active`, `Is_Delete`) values('$id','$Fee_Type', '$Frequency', $Status , '$Amount',1,0)";
  $result1 = mysqli_query($conn,$sql1);
    if(!$result1){
      echo mysqli_error($conn);
    }
  }
}else{
  echo mysqli_error($conn);
}
if($sql && $sql1){
  echo 1;
}
  
  //POST FEE DATA IN DATABASE End
?>


