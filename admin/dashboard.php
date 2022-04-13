<?php
session_start();
// database connection
include '../connection/config.php';
// end database connection

if(!isset($_SESSION["in"]) || $_SESSION["in"] !== true && $_SESSION["admin"] !== true){
  header("Location:/h_st/index.php");
  exit;
}else{
//   $userid = $_SESSION["user_id"];
  $name = $_SESSION["name"];
  $id = $_SESSION["id"];
  //  include("/centut/connection/config.php");
$sql = "SELECT * FROM `admin` where s_no = '$id'";
$result_t = mysqli_query($conn,$sql);
      $row_t = mysqli_num_rows($result_t);
      while($row = mysqli_fetch_assoc($result_t)){
        $uname = $row['username'];
        $name = $row['name'];
        $email = $row['email'];
        $cnic =  $row['cnic'];
        $address = $row['address'];
        $paddress = $row['p_address'];
      }
}
// ------------------------------------//
// To check profile_img is uploaded or not
$sql_img = "select user_image from admin where s_no ='$id' and user_image = '0'";
$conn_img = mysqli_query($conn,$sql_img);
$p_img= mysqli_num_rows($conn_img);


// profile_img data from database
$sqlp_img = "select * from admin where s_no ='$id' and user_image <> '0'";
$pro_img = mysqli_query($conn,$sqlp_img);
$pro_num_img = mysqli_num_rows($pro_img);

while($row = mysqli_fetch_assoc($pro_img)){
  $uimg = $row['user_image'];
}
// End of profile_img
// ------------------------- //

// profile_img
$sql_img = "select user_image from admin where s_no ='$id'";
$conn_img = mysqli_query($conn,$sql_img);
while($row = mysqli_fetch_assoc($conn_img)){
  $uimg = $row['user_image'];
}
// End of profile_img
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <!-- custom favicon -->
  <link rel="shortcut icon" href="assets/img/logo.jpg" type="image/x-icon">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" type="text/css" rel="stylesheet">
    <!-- datatable -->
    <link href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css " rel="stylesheet">
<style>
  #logo_header{
    width: 60px;
    height: 60px;
  }
  #profileImage {
    width: 60px;
    border-radius: 50px;
    height: 60px;
}
.info{
            background: 	rgba(220,220,220,0.18);
            padding: 12px;
            padding-left: 25px;
}
.img{
            color: white;
            font-size: 20px;
            margin-bottom: 10px;
}

.num{
            font-size: 55px;
            color: white;
            padding-left: 5px;
            position: absolute;

}

#icon{
            padding-top: 7px;
            font-size: 35px;
            color: black;
}
.border{
            width: 300px;
            height: 130px;
            background-color: rgba(23, 116, 255, 0.89);
            border-radius: 10px;
            padding: 40px;
            display: inline-block;
            margin-right: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.25);
}

#loading {
position: fixed;
width: 100%;
height: 100vh;
background: #fff url('assets/img/loading.gif') no-repeat center center;
z-index: 9999;
}
#img_icon{
  width: 20px;
  height: 20px;
}
</style>
</head>

<body>
<div id="loading"></div>
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
      echo  "<img id='profileImage' src='assets/img/admin.png' class='mobile_profile_image' alt='Please Uploaded Photo'>";
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
              <!--Logout Button Start-->
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
              <!--Logout Button End-->
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="dashboard.php"> <img alt="image" src="assets/img/logo.jpg" id="logo_header" class="header-logo" /> <span
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
              <a href="profile.php" class="nav-link"><i class="far fa-user"></i><span>Profile</span></a> 
            </li>
            <li class="dropdown">
              <a href="teacher.php" class="nav-link"><i class="fas fa-chalkboard-teacher"></i><span>Teachers</span></a>
            </li>
            <li class="dropdown">
              <a href="addsub.php" class="nav-link"><i class="fas fa-award"></i></i><span>Subjects</span></a>
            </li>
            <li class="dropdown">
              <a href="st.php" class="nav-link"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Students</span></a>
            </li>
            <li class="dropdown">
              <a href="pt.php" class="nav-link"><img id="img_icon" src="assets/img/parenticon.png" class="mr-2"><span>Parents</span></a>
            </li>
            <li class="dropdown">
              <a href="add_t.php" class="nav-link"><img id="img_icon" src="assets/img/add_teacher.png" class="mr-2"><span>Add Teacher</span></a>
            </li>
            

            <li class="dropdown">
              <a href="add_st.php" class="nav-link"><img id="img_icon" src="assets/img/add_st.png"><span>Add Student</span></a>
            </li>
            <!--Fees Start-->
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-fees" aria-expanded="false" aria-controls="form-fees">
            <img id="img_icon" src="assets/img/fees.png" class="mr-2"><span>Fees</span></a>
            </a>

            <div class="collapse" id="form-fees">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                <a class="nav-link" href="fee_form.php"><i class="fas fa-chalkboard"></i><span>Define Fee Type</span></a>
                </li>  
                <li class="nav-item">
                <a class="nav-link" href="Class_Fees.php"><i class="fas fa-chalkboard"></i><span>Class Fees</span></a>
                </li>  
             </ul>
            </div>
          </li>
          <!--Fees End-->
            <li class="dropdown">
              <a href="instruction.php" class="nav-link"><i class="fas fa-book-open"></i><span>Instruction</span></a>
            </li>
            <li class="dropdown">
              <a data-toggle="collapse" class="nav-link"><i class="fa fa-bullhorn" aria-hidden="true"></i><span>Announcements</span></a>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
<?php include('info.php');?>
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">No. of Students</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        <?php echo $row_st ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="text-end">
                                <i id="icon" class="fas fa-user-graduate text-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">No. of Teachers</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        <?php echo $row_t; ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="text-end">
                                <i id="icon" class="fas fa-chalkboard-teacher text-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total No. Subjects</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        <?php echo $row_em; ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="text-end">
                                <i id="icon" class="fas fa-book text-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Attandance Took Today:</p>
                                        <h5 class="font-weight-bolder mb-0">
                                          <?php echo $row_ed; ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <i id="icon" class="fa fa-check text-lg" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- <div class="info">
    <div class="border">
        <span class="num"> //echo $row_st; ?></span>
        <span class="img">No. of Students</span>
        <i id = "icon" class="fas fa-user-graduate"></i>
    </div>
   
    <div class="border">
        <span class="num"> //echo $row_t; ?></span>
        <span class="img">No. of Teachers</span>
        <i id = "icon" class="fas fa-chalkboard-teacher"></i>
    </div>
   
    
    <div class="border">
        <span class="num"> //echo $row_em; ?></span>
        <span class="img">Total No. Subjects</span>
        <i id="icon" class="fas fa-book"></i>
    </div>


    
    <div class="border">
        <span class="num"> //echo $row_ed; ?></span>
        <span class="img">Attandance Took Today:</span>
        <i id="icon" class="fa fa-check" aria-hidden="true"></i>
    </div>
</div> -->
<div class="row">
<div class="col-md-7 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <h4 class="card-title mb-0">Students</h4>
                          <a href="st.php"><small>Show All</small></a>
                        </div>
                        <p>All Data of Students Available here</p>
                        <div class="table-responsive">
                          <table id="table_id" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Roll No</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Student Phone</th>
                                <th>Father Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
<?php
                            //---------------- Fetch The Studens ----------------
$i_st=1;
$sql_st = "select roll_no,name,online_status,father_name,st_phone,father_phone,acc_approval from students;";
$conn_st = mysqli_query($conn,$sql_st);
while($row = mysqli_fetch_assoc($conn_st)){
  $roll_no_st = $row['roll_no'];
  $name_st = $row['name'];
  $father_name = $row['father_name'];
  $st_phone = $row['st_phone'];
  $father_phone = $row['father_phone'];
  $acc_approval = $row['acc_approval'];
  $acc_on = $row['online_status'];
                             echo"<tr>
                                <td>$i_st</td>
                                <td>$roll_no_st</td>
                                <td>$name_st</td>
                                <td>$father_name</td>
                                <td>$st_phone</td>
                                <td>$father_phone</td>
                                <td id='acc-$i_st'>$acc_approval</td>
                                <td id='acc_on-$i_st'>$acc_on</td>
                              </tr>";
                              $i_st++;
}
                            //---------------- Fetch The Studens End----------------
?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

<div class="col-md-5 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <h4 class="card-title mb-0">Teachers</h4>
                          <a href="teacher.php"><small>Show All</small></a>
                        </div>
                        <p>All Data of Teachers Available here</p>
                        <div class="table-responsive">
                          <table id="table_id2" class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>S.NO</th>
                                <th>GR.No</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Section</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
<?php
                            //---------------- Fetch The Teacher ----------------
$i_t=1;
$sql_t = "select t_id,name,name,class,subject,section,acc_approval,online_status,t_phone from teachers;";
$conn_t = mysqli_query($conn,$sql_t);
while($row = mysqli_fetch_assoc($conn_t)){
  $t_id = $row['t_id'];
  $name_t = $row['name'];
  $class = $row['class'];
  $sub = $row['subject'];
  $section = $row['section'];
  $acc_approval_t = $row['acc_approval'];
  $ph = $row['t_phone'];
  $acc_on_t = $row['online_status'];
                             echo"<tr>
                                <td>$i_t</td>
                                <td>$t_id</td>
                                <td>$name_t</td>
                                <td>$class</td>
                                <td>$sub</td>
                                <td>$section</td>
                                <td>$ph</td>
                                <td id='acc-t-$i_t'>$acc_approval_t</td>
                                <td id='acc_on_t-$i_t'>$acc_on_t</td>
                              </tr>";
                              $i_t++;
}
                            //---------------- Fetch The Teacher End----------------
?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

<div class="col-md-7 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <h4 class="card-title mb-0">Parents</h4>
                          <a href="pt.php"><small>Show All</small></a>
                        </div>
                        <p>All Data of Parents Available here</p>
                        <div class="table-responsive">
                          <table id="table_id3" class="table table-striped table-hover" >
                            <thead>
                              <tr>
                                <th>S.No</th>
                                <th>Parent Name</th>
                                <th>Student Name</th>
                                <th>St Roll No</th>
                                <th>Relation</th>
                                <th>Section</th>
                                <th>class</th>
                                <th>Phone-1</th>
                                <th>Phone-2</th>
                                <th>Status-2</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
<?php
                            //---------------- Fetch The Parents ----------------
$i_p=1;
$sql_t = "select 	parent_name,st_name,roll_no,relationship,section,class,phone_1,phone_2,acc_approval,online_status from parents;";
$conn_t = mysqli_query($conn,$sql_t);
while($row = mysqli_fetch_assoc($conn_t)){
  $parent_name = $row['parent_name'];
  $st_name = $row['st_name'];
  $roll_no_st_p = $row['roll_no'];
  $relationship = $row['relationship'];
  $section_p_st = $row['section'];
  $class_st_p = $row['class'];
  $acc_approval_p = $row['acc_approval'];
  $pho1 = $row['phone_1'];
  $pho2 = $row['phone_2'];
  $acc_on_p = $row['online_status'];
                             echo"<tr>
                                <td>$i_p</td>
                                <td>$parent_name</td>
                                <td>$st_name</td>
                                <td>$roll_no_st_p</td>
                                <td>$relationship</td>
                                <td>$section_p_st</td>
                                <td>$class_st_p</td>
                                <td>$pho1</td>
                                <td>$pho2</td>
                                <td id='acc-p-$i_p'>$acc_approval_p</td>
                                <td id='acc_on_p-$i_p'>$acc_on_p</td>
                              </tr>";
                              $i_p++;
}
                            //---------------- Fetch The Parents End----------------
?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
          
<div class="col-md-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <h4 class="card-title mb-0">Announcements</h4>
                          <a href="announcements.php"><small>Show All</small></a>
                        </div>
                        <p>Previous Announcements Made:</p>
                        <div class="table-responsive">
                          <table id="table_id4" class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>S.No</th>
                                <th>Message</th>
                                <th>Send To</th>
                                <th>Due Date</th>
                              </tr>
                            </thead>
                            <tbody>
<?php
$i_acc = 1;
$sql_sub = "SELECT `message`,`send`,`date`,`end_date`  FROM  announcements where remove = 1;";
$result_sub = mysqli_query($conn,$sql_sub);
$i =1;
while($sub = mysqli_fetch_assoc($result_sub)){
    $mess = $sub['message'];
    $send = $sub['send'];
    $date = $sub['date'];
    $end_date = $sub['end_date'];
                              echo "<tr>
                                <td>$i_acc</td>
                                <td>$mess</td>
                                <td>$send</td>
                                <td>$end_date</td>
                              </tr>";
                              $i_acc++;
}
?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
</div>
        </div>     <!-- end div of row class  -->
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
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
  <script>
jQuery(document).ready(function() {
    jQuery('#loading').fadeOut(3);
    $('#table_id').DataTable();
    $('#table_id2').DataTable();
    $('#table_id3').DataTable();
    $('#table_id4').DataTable();
});
</script>
<script>
var acc = 'acc-';

var acc_p = 'acc-p-';
var acc_on = 'acc_on-';

//Teacher Status & Action
var acc_t = 'acc-t-';
var acc_on_t ='acc_on_t-';

//Parents Status & Action
var acc_on_p ='acc_on_p-';


var x = <?php echo json_encode($i_st); ?>-1;
for(let i=1; i<=x; i++){
  var acc_id = acc+i;
  var acc_load = document.getElementById(acc_id).innerHTML;
  if(acc_load === '1'){
  let acc_change = document.getElementById(acc_id).innerHTML="Approved";
  document.getElementById(acc_id).style.color = "green";
}else{
  let acc_change = document.getElementById(acc_id).innerHTML="Blocked";
  document.getElementById(acc_id).style.color = "red";
}
}
var x_t = <?php echo json_encode($i_t);?>-1;
for(let i=1; i<=x_t; i++){
  var acc_id_t = acc_t+i;
  var acc_load_t = document.getElementById(acc_id_t).innerHTML;
  if(acc_load_t === '1'){
  let acc_change_t = document.getElementById(acc_id_t).innerHTML="Approved";
  document.getElementById(acc_id_t).style.color = "green";
}else{
  let acc_change_t = document.getElementById(acc_id_t).innerHTML="Blocked";
  document.getElementById(acc_id_t).style.color = "red";

}
}
var x_p = <?php echo json_encode($i_p);?>-1;
for(let i=1; i<=x_p; i++){
  var acc_id_p = acc_p+i;
  var acc_load_p = document.getElementById(acc_id_p).innerHTML;
  if(acc_load_p === '1'){
  let acc_change_p = document.getElementById(acc_id_p).innerHTML="Approved";
  document.getElementById(acc_id_p).style.color = "green";
}else{
  let acc_change_p = document.getElementById(acc_id_p).innerHTML="Blocked";
  document.getElementById(acc_id_p).style.color = "red";
}
}

var x_on = <?php echo json_encode($i_st);?>-1;
for(let i=1; i<=x_on; i++){
  var acc_id_on = acc_on+i;
  var acc_load_on = document.getElementById(acc_id_on).innerHTML;
  if(acc_load_on === '1'){
  let acc_change_on = document.getElementById(acc_id_on).innerHTML="Online";
  document.getElementById(acc_id_on).style.color = "green";
}else{
  let acc_change_on = document.getElementById(acc_id_on).innerHTML="Offline";
  document.getElementById(acc_id_on).style.color = "red";
}
}

//Teacher Online Status Admin Page
var x_ton = <?php echo json_encode($i_t);?>-1;
for(let i=1; i<=x_ton; i++){
  var acc_id_t_on = acc_on_t+i;
  var acc_load_t_on = document.getElementById(acc_id_t_on).innerHTML;
  if(acc_load_t_on === '1'){
  let acc_change_on = document.getElementById(acc_id_t_on).innerHTML="Online";
  document.getElementById(acc_id_t_on).style.color = "green";
}else{
  let acc_change_on = document.getElementById(acc_id_t_on).innerHTML="Offline";
  document.getElementById(acc_id_t_on).style.color = "red";
}
}

//Parents Online Status Admin Page
var x_pon = <?php echo json_encode($i_p);?>-1;
for(let i=1; i<=x_pon; i++){
  var acc_id_p_on = acc_on_p+i;
  var acc_load_p_on = document.getElementById(acc_id_p_on).innerHTML;
  if(acc_load_p_on === '1'){
  let acc_change_on = document.getElementById(acc_id_p_on).innerHTML="Online";
  document.getElementById(acc_id_p_on).style.color = "green";
}else{
  let acc_change_on = document.getElementById(acc_id_p_on).innerHTML="Offline";
  document.getElementById(acc_id_p_on).style.color = "red";
}
}


</script>
</body>
</html>