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

$date = date('d-m-Y');

$sql_st="select * from students where acc_approval = '1' and class='$class' and section = '$sec'";
$result_st = mysqli_query($conn,$sql_st);
$row_st = mysqli_num_rows($result_st);

$sql_t="SELECT * FROM `test_data` where t_id = '$tid'";
$result_t = mysqli_query($conn,$sql_t);
$row_test = mysqli_num_rows($result_t);

$sql_em ="SELECT * FROM `assingments` WHERE class = '$class' and section = '$sec' and t_name = '$name'";
$result_em =mysqli_query($conn,$sql_em);
$row_ass = mysqli_num_rows($result_em);

$sql_ed ="SELECT `file`,`sub`,`dairy`,`class`,`section`,`date` FROM `dairy` WHERE class = '$class' and section = '$sec' and t_id = '$tid'";
$result_ed =mysqli_query($conn,$sql_ed);
$row_da = mysqli_num_rows($result_ed);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Teacher Dashboard</title>
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
  #profileImage{
    width: 50px;
    height: 50px;
    border-radius: 30px;
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
              </a>
            </li>
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

<div class="ann">
<?php
$sql_ann="select * from announcements where send <> '' and remove = '1' and end_date <='$date'";
$result_ann = mysqli_query($conn,$sql_ann);
while($row = mysqli_fetch_assoc($result_ann)){
  $message = $row['message'];
  $send = $row['send'];
  if(strlen($send) === 7){

  echo  "<div class='alert alert-warning alert-dismissible fade show rounded' role='alert'>
    <strong> Announcements ! </strong> $message
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
    </div>";

  }else if(strlen($send) === 15){

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
  }
}
?>
</div>

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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">No. of Test Taken</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        <?php echo $row_test; ?>
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total No. Assingments</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        <?php echo $row_ass; ?>
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Total No. Dairy</p>
                                        <h5 class="font-weight-bolder mb-0">
                                          <?php echo $row_da; ?>
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

<div class="row">
<div class="col-md-7 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <h4 class="card-title mb-0">Students</h4>
                          <a href="select_s.php"><small>Show All</small></a>
                        </div>
                        <p>All Data of Students Under you Available here</p>
                        <div class="table-responsive">
                          <table id="table_id" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Roll No</th>
                                <th>Name</th>
                                <th>father Name</th>
                                <th>Class</th>
                                <th>Section</th>
                              </tr>
                            </thead>
                            <tbody>
<?php
                            //---------------- Fetch The Studens ----------------
$i_st=1;
$sql_st = "select roll_no,name,father_name,class,section from students where class='$class' and section = '$sec';";
$conn_st = mysqli_query($conn,$sql_st);
while($row = mysqli_fetch_assoc($conn_st)){
  $roll_no_st = $row['roll_no'];
  $name_st = $row['name'];
  $father_name = $row['father_name'];
  $class_st = $row['class'];
  $sec_st = $row['section'];
                             echo"<tr>
                                <td>$i_st</td>
                                <td>$roll_no_st</td>
                                <td>$name_st</td>
                                <td>$father_name</td>
                                <td>$class_st</td>
                                <td>$sec_st</td>
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
                          <h4 class="card-title mb-0">Test Report</h4>
                          <a href="marks.php"><small>Show All</small></a>
                        </div>
                        <p>All Data of Test Available here</p>
                        <div class="table-responsive">
                          <table id="table_id2" class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>S.NO</th>
                                <th>Test Name</th>
                                <th>subject</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
<?php
                            //---------------- Fetch The Teacher ----------------
$i_t=1;
$sql_t = "SELECT `test_name`,`subject`,`class`,`status`,`section` FROM `test_data` where t_id = '$tid';";
$conn_t = mysqli_query($conn,$sql_t);
while($row = mysqli_fetch_assoc($conn_t)){
  $test_name = $row['test_name'];
  $subject = $row['subject'];
  $class = $row['class'];
  $sec = $row['section'];
  $status = $row['status'];
                             echo"<tr>
                                <td>$i_t</td>
                                <td>$test_name</td>
                                <td>$subject</td>
                                <td>$class</td>
                                <td>$sec</td>
                                <td>$status</td>
                              </tr>";
                              $i_t++;
}
                            //---------------- Fetch The Test End----------------
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
                          <h4 class="card-title mb-0">Assingments Report</h4>
                          <a href="assingment.php"><small>Show All</small></a>
                        </div>
                        <p>All Data of Assingment Available here</p>
                        <div class="table-responsive">
                          <table id="table_id3" class="table table-striped table-hover" >
                            <thead>
                              <tr>
                                <th>S.No</th>
                                <th>Title</th>
                                <th>subject</th>
                                <th>class</th>
                                <th>Section</th>
                                <th>Date</th>
                              </tr>
                            </thead>
                            <tbody>
<?php
                            //---------------- Fetch The Parents ----------------
$i_p=1;
$sql_t = "SELECT `title`,`subject`,`section`,`class`,`date` FROM `assingments` WHERE class = '$class' and section = '$sec' and t_name = '$name'";
$conn_t = mysqli_query($conn,$sql_t);
while($row = mysqli_fetch_assoc($conn_t)){
  $title = $row['title'];
  $class = $row['class'];
  $subject = $row['subject'];
  $sec = $row['section'];
  $date = $row['date'];
                             echo"<tr>
                                <td>$i_p</td>
                                <td>$title</td>
                                <td>$subject</td>
                                <td>$class</td>
                                <td>$sec</td>
                                <td>$date</td>
                              </tr>";
                              $i_p++;
}
                            //---------------- Fetch The Assingment End----------------
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
                          <h4 class="card-title mb-0">Dairies</h4>
                          <a href="dairy.php"><small>Show All</small></a>
                        </div>
                        <p>Previous Dairies Given:</p>
                        <div class="table-responsive">
                          <table id="table_id4" class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>S.No</th>
                                <th>Dairy</th>
                                <th>Subject</th>
                                <th>class</th>
                                <th>Section</th>
                                <th>Date</th>
                              </tr>
                            </thead>
                            <tbody>
<?php
$i_acc = 1;
$sql_sub = "SELECT `sub`,`dairy`,`class`,`section`,`date` FROM `dairy` WHERE class = '$class' and section = '$sec' and t_id = '$tid'";
$result_sub = mysqli_query($conn,$sql_sub);
$i =1;
while($sub = mysqli_fetch_assoc($result_sub)){
    $subject = $sub['sub'];
    $dairy = $sub['dairy'];
    $sec = $sub['section'];
    $class = $sub['class'];
    $date = $sub['date'];
                              echo "<tr>
                                <td>$i_acc</td>
                                <td>$dairy</td>
                                <td>$subject</td>
                                <td>$class</td>
                                <td>$sec</td>
                                <td>$date</td>
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
</body>
</html>