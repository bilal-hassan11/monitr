<?php
session_start();
// database connection
include '../connection/config.php';
// end database connection

if(!isset($_SESSION["in"]) || $_SESSION["in"] !== true && $_SESSION["p"] === true){
  header("Location:/h_st/index.php");
  exit;
}else{
  $p_id = $_SESSION["p_id"];
  $st_roll = $_SESSION["roll_st"];

$sql_t = "SELECT * FROM `parents` where parent_id = '$p_id'";
$result_t = mysqli_query($conn,$sql_t);
      $row_t = mysqli_num_rows($result_t);
      while($row = mysqli_fetch_assoc($result_t))
      {
        $uname = $row['username'];
        $email = $row['email'];
        $name = $row['parent_name'];
      }

$sql_st = "SELECT * FROM `students` where roll_no = '$st_roll'";
$result_st = mysqli_query($conn,$sql_st);
      while($row_st = mysqli_fetch_assoc($result_st))
      {
        $class_st = $row_st['class'];
        $sec_st = $row_st['section'];
        // $_st = $row_st[''];
      }
}
// ------------------------------------//
// to check account approval Status start
$sql_acc = "SELECT * FROM `parents` WHERE username = '$p_id' and acc_approval = '0'";
$result_acc = mysqli_query($conn,$sql_acc);
$row_acc = mysqli_num_rows($result_acc);

  if($row_acc == 1){
    header("location:/h_st/approval/p_notApproval.php");
    exit;
  }
// to check account approval End
// ------------------------------------//
// To check profile_img is uploaded or not
$sql_img = "select user_image from parents where parent_id ='$p_id' and user_image = '0'";
$conn_img = mysqli_query($conn,$sql_img);
$p_img= mysqli_num_rows($conn_img);


// profile_img data from database
$sqlp_img = "select * from parents where parent_id ='$p_id' and user_image <> '0'";
$pro_img = mysqli_query($conn,$sqlp_img);
$pro_num_img = mysqli_num_rows($pro_img);
while($row = mysqli_fetch_assoc($pro_img)){;
$uimg = $row['user_image'];
}
// End of profile_img
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Attendances</title>
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
    box-shadow: 4px 3px 6px 0 rgb(0 0 0 / 20%);
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
  echo  "<img id='profileImage' src='assets/img/parent.jfif' class='mobile_profile_image' alt='Please Uploaded Picture'>";
}else{
echo  "<img id='profileImage' src='$uimg' class='mobile_profile_image' alt='Profile Picture'>";
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
            <a href="dashboard.php"> <img alt="image" src="../assets/images/logo.jpg" id="logo_header" class="header-logo" /> <span
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
              <a href="attendance.php" class="nav-link"><i class="fas fa-school"></i></i><span>Attendance</span></a>
            </li>
            <li class="dropdown">
              <a href="results.php" class="nav-link"><i class="fa fa-book" aria-hidden="true"></i><span>Results</span></a>
            </li>
            <li class="dropdown">
              <a href="assingment.php" class="nav-link"><i class="fa fa-tasks" aria-hidden="true"></i><span>Assingment</span></a>
            </li>
            <li class="dropdown">
              <a href="profile.php" class="nav-link"><i class="far fa-user"></i><span>Profile</span></a> 
            </li>
            <li class="dropdown">
              <a href="instruction.php" class="nav-link"><i class="fas fa-book-open"></i><span>Instruction</span></a>
          </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->



            <div class="heading">
<h1 class="h3 mb-0 text-gray-800">View Class Attendance</h1>
</div>

<div class="datesel">
<h6>View Class Attendance</h6>
<form method="post">
    <label class="label">Select Date<span class="text-danger ml-2">*</span></label>
        <input type="date" name="dateTaken" placeholder="Enter Date" onmouseleave="takeDate()" id="date_take"><br> 
        <label class="label">Select Subject<span class="text-danger ml-2">*</span></label>
                    <div class="form-group">
                    <select required name="userType">
                    <option value=''>--Select Subject--</option>
                                      <?php
                    $sql_sub = "SELECT * FROM subjects WHERE class = '$class_st'";
                    $result_sub = mysqli_query($conn,$sql_sub);
                    while($sub = mysqli_fetch_assoc($result_sub)){
                        $sub_name = $sub['name'];
                            echo  "<option value='$sub_name'>$sub_name</option>";
                          }
                            ?>
                    </select>
                    </div>
        <button type="submit" name="view" class="btn btn-primary">View Attendance</button>
</form>
</div>

<div class="show_repot">
<table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>#</th>
                        <th>Roll_no</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Attendance</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                   
                    <tbody>

                    <?php

if(isset($_POST['view'])){

  $dateTaken =  $_POST['dateTaken'];
  $sub_taken = $_POST['userType'];
  $query = "SELECT * 
  FROM attendance a JOIN students s 
  on a.roll_no = s.roll_no
  WHERE a.class='$class_st' and a.section = '$sec_st' and s.class='$class_st' and s.section = '$sec_st' and a.roll_no='$st_roll' and a.dateTaken = '$dateTaken' and a.subject = '$sub_taken'";
  $rs = $conn->query($query);
  $num = mysqli_num_rows($rs);
  $sn=0;
  $status="";
  echo "<br><h2>Showing Attandence Of '$dateTaken of Subject : $sub_taken' :</h2>";
  if($num > 0)
  { 
    while ($rows = $rs->fetch_assoc())
      {
          if($rows['status'] == '1'){$status = "Present"; $colour="#00FF00";}else{$status = "Absent";$colour="#FF0000";}
         $sn = $sn + 1;
        echo"
          <tr>
            <td>".$sn."</td>
            <td>".$rows['roll_no']."</td>
             <td>".$rows['name']."</td>
            <td>".$rows['class']."</td>
            <td>".$rows['section']."</td>
            <td style='background-color:".$colour."'>".$status."</td>
            <td>".$rows['dateTaken']."</td>
          </tr>";
      }
  }
  else
  {
       echo   
       "<div class='alert alert-danger' role='alert'>
        No Record Found!
        </div>";
  }
}
  ?>
</div>
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
  <script>
// var time = document.getElementById('date_take');
//   console.log('jkbjkjkb')
//   console.log(time.value);

// function myFunction() {
//   console.log(document.getElementById("date_take").value);
// }

// onmouseenter="()"
 
 function takeDate(){
console.log('leave');
var time = document.getElementById('date_take');
  console.log(time.value);
 }

  </script>
</body>
</html>