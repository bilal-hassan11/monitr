<?php
$servername = "localhost";
$username = "root";
$password = "";
$datbase = "portal";
$conn = mysqli_connect($servername,$username,$password,$datbase);
?>

<div class="ann">
<?php
$date = date('d-M-Y');
echo $date;
$sql_ann="select message,end_date,send from announcements where send <> '' and remove = '1'";
$result_ann = mysqli_query($conn,$sql_ann);
$result_ann_r = mysqli_num_rows($result_ann);
// echo $result_ann_r;
if($result_ann_r >= 1){
while($row = mysqli_fetch_assoc($result_ann)){
  $message = $row['message'];
  $end_date = $row['end_date'];
  $send = $row['send'];



  echo "<br>";  
  echo $message."<br>";
  echo $send."<br>";
  echo $end_date."<br>";
  echo strlen($send)."<br>";


if($end_date >= $date){
  if(strlen($send) === 7){

    echo  "<div class='alert alert-warning alert-dismissible fade show rounded' role='alert'>
      <strong> Announcements ! </strong> $message
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
  
    }else if(strlen($send) === 23){
  
      echo  "<div class='alert alert-warning alert-dismissible fade show rounded' role='alert'>
      <strong> Announcements ! </strong> $message
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
  
    }else if(strlen($send) === 14){
  
      echo  "<div class='alert alert-warning alert-dismissible fade show rounded' role='alert'>
      <strong> Announcements ! </strong> $message
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
    }else if(strlen($send) === 16){
  
      echo  "<div class='alert alert-warning alert-dismissible fade show rounded' role='alert'>
      <strong> Announcements ! </strong> $message
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
      </div>";
    }
}
}
}
?>
</div>

           