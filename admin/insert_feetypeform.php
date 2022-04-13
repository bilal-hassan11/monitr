<?php

include '../connection/config.php';

//POST FEE DATA IN DATABASE Start 
$Fee_Type = $_POST['Fee_Type'];
$Frequency = $_POST['Frequency'];
$Status = $_POST['Status'];
$CreatedOn = $_POST['CreatedOn'];

$sql="INSERT INTO `tbl_fee_type` (`Fee_Type`,`Frequency`,`Status`,`CreatedOn`,`Is_Active`,`Is_Delete`) VALUES ('$Fee_Type', '$Frequency', '$Status', '$CreatedOn',1,0);";
  $result = mysqli_query($conn,$sql);

  if($result){
  echo '1';

  }else{
  echo '0';
}
//POST FEE DATA IN DATABASE End
?>
