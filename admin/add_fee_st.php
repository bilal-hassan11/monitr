<?php
include '../connection/config.php';

$class = $_POST['class_list'];
$roll_no = $_POST['roll_no'];
$selection = $_POST['selection'];

//   $sql="INSERT INTO `tbl_fees_amount_paid` (`class`,`roll_no`,`Fee_Type`,`Frequency`,`Status`,`Amount`,`Total_Amount`,`CreatedBy`,`CreatedAt`) VALUES ('$class', '$roll_no', '$Fee_Type', '$Frequency', '$Status', '$Amount','$Total_Amount','$name',now());";
//   $result = mysqli_query($conn,$sql);

//   if($result){
//     echo '1';
// }else{
//     echo '0';
// }

  echo "Class =>>>".$class;
  echo "Roll No =>>>".$roll_no.'<br>';
  echo "Selection =>>>".$selection.'<br>';


?>