<?php
session_start();
// database connection
include '../connection/config.php';
// end database connection
if(!isset($_SESSION["in"]) || $_SESSION["in"] !== true && $_SESSION["t"] = true){
  header("Location:/h_st/index.php");
  exit;
}else{
//   $userid = $_SESSION["user_id"];
  $name = $_SESSION["name"];
  $tid = $_SESSION["t_id"];
}
$sql_t = "SELECT * FROM `teachers` where t_id = '$tid'";
$result_t = mysqli_query($conn,$sql_t);
      $row_t = mysqli_num_rows($result_t);
      while($row = mysqli_fetch_assoc($result_t)){
        $uname = $row['username'];
        $name = $row['name'];
        $email = $row['email'];
        $t_cnic = $row['t_cnic'];
        $sub = $row['subject'];
        $class = $row['class'];
        $sec = $row['section'];
      }
      // ------------------------------------//
// to check account approval Status start
$sql_acc = "SELECT * FROM `teachers` WHERE t_id = '$tid' and acc_approval = '0'";
$result_acc = mysqli_query($conn,$sql_acc);
$row_acc = mysqli_num_rows($result_acc);

  if($row_acc == 1){
    header("location:/h_st/approval/t_notApproval.php");
    }
// to check account approval End
// ------------------------------------//

// ------------------------- //
// To check profile_img is uploaded or not
$sql_img = "select user_image from `teachers` where t_id ='$tid' and user_image = '0'";
$conn_img = mysqli_query($conn,$sql_img);
$p_img= mysqli_num_rows($conn_img);


// profile_img data from database
$sqlp_img = "select user_image from `teachers` where t_id ='$tid' and user_image <> '0'";
$pro_img = mysqli_query($conn,$sqlp_img);
$pro_num_img = mysqli_num_rows($pro_img);

while($row = mysqli_fetch_assoc($pro_img)){
  $uimg = $row['user_image'];
}
// End of profile_img
// ------------------------- //
// ------------------------- //

// attendance daat here
// ----------------------- 

// $dateTaken = date("Y-n-j");
$dateTaken = date("Y-m-d");
$qurty=mysqli_query($conn,"select * from att_entry  where t_id = '$tid' and class = '$class' and section = '$sec' and dateTaken='$dateTaken' and status = '1' and subject = '$sub' ");
$count_all = mysqli_num_rows($qurty);


if($count_all == 0){ //if Record does not exsit, insert the new record

  $count_all_check=mysqli_query($conn,"select * from att_entry  where t_id = '$tid' and class = '$class' and section = '$sec' and dateTaken='$dateTaken' and status = '0' and subject = '$sub' ");
  $count_all_check_r = mysqli_num_rows($count_all_check);

  if($count_all_check_r == 1){
  }else{
  // echo "in count_all";
  //insert the students record into the attendance table on page load
  $qus=mysqli_query($conn,"select * from students  where class = '$class' and section = '$sec'");
  while ($ros = $qus->fetch_assoc())
  {
      $qquery=mysqli_query($conn,"insert into attendance(roll_no,class,section,status,dateTaken,subject,t_id) value('$ros[roll_no]','$class','$sec','0','$dateTaken','$sub','$tid')");
  }


  $sql = "INSERT INTO `att_entry` (`t_id`, `class`, `section`, `dateTaken`,`status`,`subject`) VALUES ('$tid', '$class', '$sec', '$dateTaken','0','$sub');";
  $result = mysqli_query($conn,$sql);
}
}
// -----------------------





// post the ateendance data into server to database
if(isset($_POST['save'])){
// sid in array
$roll_no=$_POST['roll_no'];
// attendance check in array
$check=$_POST['check'];
$N = count($roll_no);
$status = "";

$qurty_1=mysqli_query($conn,"select * from att_entry  where t_id = '$tid' and class = '$class' and section = '$sec' and dateTaken='$dateTaken' and status = '1'");
$count = mysqli_num_rows($qurty_1);
//check here the entrty
if($count == 1){

    // echo 'Attende done================================';
    echo "<script>console.log('done att');</script>";

}
//update the status to 1 for the checkboxes checked 
else {

for($i = 0; $i < $N; $i++){
        $roll_no[$i]; //Roll_no

        if(isset($check[$i])) //the checked checkboxes
        {
              $qquery=mysqli_query($conn,"update attendance set status='1' where roll_no = '$check[$i]'");

              if ($qquery) {
                $att_check_i = "UPDATE `att_entry` SET `status` = '1' WHERE `att_entry`.`t_id`='$tid' and `att_entry`.`subject` = '$sub' and `att_entry`.`dateTaken` = '$dateTaken';";
                  $re_check_i = mysqli_query($conn,$att_check_i);

                  if($re_check_i){
                    header('location:../teacher/att_st.php?err=ats');
                  }
              }
              else
              {
                  header('location:../teacher/att_st.php?err=atr');
              }
          
        }
}
}
}

// ------------------------- //
// attendance data End here
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Take Attendance</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <!-- custom favicon -->
  <link rel="shortcut icon" href="../assets/images/logo.jpg" type="image/x-icon">

<style>
  #logo_header{
    width: 60px;
    height: 60px;
  }
  #profileImage{
    width: 50px;
    height: 50px;
    border-radius: 30px;
  }
</style>

</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
              <!-- <img alt="image" src="assets/img/user.png" class="user-img-radious-style"> -->
    <?php
    if($p_img == 1){
      echo  "<img id='profileImage' src='assets/img/teacher.png' class='mobile_profile_image' alt='Please Uploaded Photo'>";
}else{
   echo  "<img id='profileImage' src='$uimg' class='mobile_profile_image' alt='Uploaded Photo'>";
}
      ?>
      <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $name;?></div>
              <a href="profile.php" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="/h_st/connection/logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="../assets/images/logo.jpg" id="logo_header" class="header-logo" /> <span
                class="logo-name">HAYAT</span>
            </a>
          </div>
          <!-- sidebar -->
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="select_s.php" class="nav-link"><i class="fas fa-user-graduate"></i><span>Students</span></a>
            </li>
            <li class="dropdown">
              <a href="pre_att.php" class="nav-link"><i class="fa fa-tasks" aria-hidden="true"></i><span>Attendances</span></a>
            </li>
            <li class="dropdown">
              <a href="marks.php" class="nav-link"><i class="fas fa-book-open"></i><span>Test Marks</span></a>
            </li>
            <li class="dropdown">
              <a href="assingment.php" class="nav-link"><i class="fas fa-shapes"></i><span>Assingment</span></a>
            </li>
            <li class="dropdown">
              <a href="profile.php" class="nav-link"><i class="far fa-user"></i><span>Profile</span></a> 
            </li>
            <li class="dropdown">
              <a href="instruction.php" class="nav-link"><i class="fas fa-book-open"></i><span>Instruction</span></a>
            </li>
            <li class="dropdown">
              <a href="dairy.php" class="nav-link"><i class="fas fa-book-open"></i><span>Dairy</span></a>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->

<div class="date">
<h1>Take Attendance (Today's Date : <?php echo $todaysDate = date("m-d-Y");?>)</h1>
</div>


<div class="st">
<h6 >All Student in (<?php echo '(class => '.$class.' / Sec = > '.$sec?>)</h6>
<h6 >Note: <i>Click on the checkboxes besides each student to take attendance!!</i></h6>
</div>

<div class="table">
<?php 
if(isset($_SERVER['HTTP_REFERER'])){
	if(isset($_GET['err']) && $_GET['err'] == "ats"){
        echo  "<div id='mes' class='alert alert-success alert-white rounded'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
                <div class='icon'><i class='fa fa-times-circle'></i></div>
                <strong>Done !!!</strong> Attendacne Taken Sussecfully!!!.
                </div>";
    }else if (isset($_GET['err']) && $_GET['err'] == "atr"){
        echo  "<div id='mes' class='alert alert-danger alert-white rounded'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
                <div class='icon'><i class='fa fa-times-circle'></i></div>
                <strong>Error!</strong> problem acc err no: '12'!!! Contact Admin.
                </div>";
    
    }
}
?>
<form method="post">
<table class="table align-items-center table-flush table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>Roll No</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Check</th>
                      </tr>
                    </thead>
                    
                    <tbody>
<?php
echo $sec;
echo $class;
$sql_st = "SELECT name,father_name,roll_no,class,section from students  WHERE section = '$sec' and class = '$class'";
$rs = $conn->query($sql_st);
$num = $pro_num_img = mysqli_num_rows($rs);
$sn=0;
$status="";
// number of row to validate attendance is done or not
if($num > 0)
{ 
  while ($rows = $rs->fetch_assoc())
    {
       $sn = $sn + 1;
       echo "<tr>
       <td>".$sn."</td>
       <td>".$rows['name']."</td>
       <td>".$rows['father_name']."</td>
       <td>".$rows['roll_no']."</td>
       <td>".$rows['class']."</td>
       <td>".$rows['section']."</td>
       <td><input name='check[]' type='checkbox' value=".$rows['roll_no']." class='form-control'></td>
     </tr>";
     echo "<input name='roll_no[]' value=".$rows['roll_no']." type='hidden' class='form-control'>"; 
  }
}
?>
</tbody>
                  </table>
                  <br>
                  <?php
                  $att_check_q = "select * from att_entry  where t_id = '$tid' and class = '$class' and section = '$sec' and dateTaken='$dateTaken' and status = '1' and subject = '$sub'";
                  $re_check = mysqli_query($conn,$att_check_q);
                  $row_check = mysqli_num_rows($re_check);
                  if($row_check == 1){
                    echo  "<div id='mes' class='alert alert-danger alert-white rounded'>
                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
                              <div class='icon'><i class='fa fa-times-circle'></i></div>
                              <strong>Done!</strong> Taken Already!!!.
                              </div>";
                  }else{
                    echo "<button type='submit' name='save' class='btn btn-primary'>Take Attendance</button>";
                  }
                  ?>
</form>
                  </div> <!-- // div end of table -->
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
	<script src="../assets/js/script.js"></script>

  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
</body>
</html>