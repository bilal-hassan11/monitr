<?php
session_start();
// database connection
include '../connection/config.php';
// end database connection

if(!isset($_SESSION["in"]) || $_SESSION["in"] !== true && $_SESSION["st"] === true){
  header("Location:/h_st/index.php");
  exit;
}else{
//   $userid = $_SESSION["user_id"];
  $name = $_SESSION["name"];
  $sid = $_SESSION["st_id"];
  //  include("/centut/connection/config.php");

$sql_t = "SELECT * FROM `students` where roll_no = '$sid'";
$result_t = mysqli_query($conn,$sql_t);
      $row_t = mysqli_num_rows($result_t);
      while($row = mysqli_fetch_assoc($result_t)){
        $uname = $row['username'];
        $name = $row['name'];
        $email = $row['email'];
        $class = $row['class'];
        $sec = $row['section'];
      }
}
// ------------------------------------//
// to check account approval Status start
$sql_acc = "SELECT * FROM `students` WHERE roll_no = '$sid' and acc_approval = '0'";
$result_acc = mysqli_query($conn,$sql_acc);
$row_acc = mysqli_num_rows($result_acc);

  if($row_acc == 1){
    header("location:/h_st/approval/st_notApproval.php");
    exit;
  }
// to check account approval End
// ------------------------------------//
// To check profile_img is uploaded or not
$sql_img = "select user_image from students where roll_no ='$sid' and user_image = '0'";
$conn_img = mysqli_query($conn,$sql_img);
$p_img= mysqli_num_rows($conn_img);


// profile_img data from database
$sqlp_img = "select * from students where roll_no ='$sid' and user_image <> '0'";
$pro_img = mysqli_query($conn,$sqlp_img);
$pro_num_img = mysqli_num_rows($pro_img);

while($row = mysqli_fetch_assoc($pro_img)){
  $uimg = $row['user_image'];
}
// End of profile_img
// ------------------------- //

// profile_img
$sql_img = "select user_image from students where roll_no ='$sid'";
$conn_img = mysqli_query($conn,$sql_img);
while($row = mysqli_fetch_assoc($conn_img)){
  $uimg = $row['user_image'];
}
// End of profile_img

$date = date('d-m-Y');
$sql_ass="SELECT * FROM `assingments` where class = '$class' and section = '$sec'";
$result_ass = mysqli_query($conn,$sql_ass);
$row_ass = mysqli_num_rows($result_ass);

$sql_da="SELECT * FROM `dairy` where class = '$class' and section = '$sec'";
$result_da = mysqli_query($conn,$sql_da);
$row_da = mysqli_num_rows($result_da);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Student Dashboard</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <!-- custom favicon -->
  <link rel="shortcut icon" href="../assets/images/logo.jpg" type="image/x-icon">
  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    box-shadow: 4px 3px 6px 0 rgb(0 0 0 / 20%);
  }
#loading {
position: fixed;
width: 100%;
height: 100vh;
background: #fff url('assets/img/loading.gif') no-repeat center center;
z-index: 9999;
}
#main_row{
  display: flex;
  justify-content: space-around;
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
      echo  "<img id='profileImage' src='assets/img/pic girls.jpg' class='mobile_profile_image' alt='Please Uploaded Photo'>";
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
              <!--Student Logout Button start-->
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
            <!--Student Logout Button end-->
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
              <a href="results.php" class="nav-link"><i class="fa fa-book" aria-hidden="true"></i><span>Test Results</span></a>
            </li>
            <li class="dropdown">
              <a href="assingment.php" class="nav-link"><i class="fa fa-tasks" aria-hidden="true"></i><span>Assingment</span></a>
            </li>
            <li class="dropdown">
              <a href="dairy.php" class="nav-link"><i class="fa fa-tasks" aria-hidden="true"></i><span>Dairy</span></a>
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

<div class="ann">
<?php
$sql_ann="select * from announcements where send <> '' and remove = '1' and end_date <='$date'";
$result_ann = mysqli_query($conn,$sql_ann);
while($row = mysqli_fetch_assoc($result_ann)){
  $message = $row['message'];
  $send = $row['send'];
  if(strlen($send) === 8){

    echo  "<div class='alert alert-warning alert-dismissible fade show rounded' role='alert'>
    <strong> Announcements ! </strong> $message
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
    </div>";

  }else if(strlen($send) === 17){

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
  }
}
?>
</div>

            <div class="row" id="main_row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">No. Of Assingments Given</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        <?php echo $row_ass ?>
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">No. of Dairy Given</p>
                                        <h5 class="font-weight-bolder mb-0">
                                        <?php echo $row_da; ?>
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
            </div>

<div class="row">


<div class="col-md-7 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <h4 class="card-title mb-0">Test Report</h4>
                          <a href="results.php"><small>Show All</small></a>
                        </div>
                        <p>All Data of Test Available here</p>
                        <div class="table-responsive">
                          <table id="table_id2" class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>S.NO</th>
                                <th>Subject</th>
                                <th>Section</th>
                                <th>class</th>
                                <th>Test Name</th>
                                <th>Date</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
<?php
                            //---------------- Fetch The Test ----------------
                            $sql_sub = "SELECT * FROM test_data WHERE class = '$class' and section = '$sec'";
                            $result_sub = mysqli_query($conn,$sql_sub);
                            $i =1;
                            while($sub = mysqli_fetch_assoc($result_sub)){
                                $Subject = $sub['subject'];
                                $status = $sub['status'];
                                $section = $sub['section'];
                                $class = $sub['class'];
                                $test_name = $sub['test_name'];
                                $test_id = $sub['test_id'];
                                $date = $sub['created'];
                                $date = substr($date,0,10);
                                    echo "<tr>".
                                        "<th scope='row'>$i</th>".
                                        "<form method='post'>".
                                        "<td>"."$Subject"."</td>".
                                        "<td>"."$section"."</td>".
                                        "<td>"."$class"."</td>".
                                        "<td>"."$test_name"."</td>".
                                        "<td>"."$date"."</td>".
                                        "<td>"."$status"."</td>".
                                        "</tr>";
                                        $i =$i +1;
                                
}
                            //---------------- Fetch The Test End----------------
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
                          <h4 class="card-title mb-0">Assingments Report</h4>
                          <a href="assingment.php"><small>Show All</small></a>
                        </div>
                        <p>All Data of Assingment Available here</p>
                        <div class="table-responsive">
                          <table id="table_id" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Assingment Title</th>
                                <th>Subject</th>
                                <th>Uploaded Date</th>
                                <th>Assinged By</th>
                                <th>Class</th>
                                <th>Section</th>
                              </tr>
                            </thead>
                            <tbody>
<?php
// teacher data
$i_st=1;
$sql_tid_fetch="select * from assingments where class='$class' and section = '$sec'";
$result_tid_fetch = mysqli_query($conn,$sql_tid_fetch);
while($row_f = mysqli_fetch_assoc($result_tid_fetch)){
  $t_name = $row_f['t_name'];
  $sub = $row_f['subject'];
  $class = $row_f['class'];
  $date = $row_f['date'];
  $title = $row_f['title'];
  $sec = $row_f['section'];
            echo"<tr>
            <td>$i_st</td>
            <td>$title</td>
            <td>$sub</td>
            <td>$date</td>
            <td>$t_name</td>
            <td>$class</td>
            <td>$sec</td>
            <td></td>
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

<div class="col-md-7 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <h4 class="card-title mb-0">Dairy Report</h4>
                          <a href="assingment.php"><small>Show All</small></a>
                        </div>
                        <p>All Data of Dairy Available here</p>
                        <div class="table-responsive">
                          <table id="table_id3" class="table table-striped table-hover" >
                            <thead>
                              <tr>
                                <th>S.No</th>
                                <th>Dairy</th>
                                <th>subject</th>
                                <th>class</th>
                                <th>Date</th>
                                <th>Section</th>
                              </tr>
                            </thead>
                            <tbody>
<?php
                            //---------------- Fetch The Dairy ----------------
$i_p=1;
$sql_t = "SELECT `file`,`sub`,`dairy`,`class`,`section`,`date` FROM `dairy` WHERE class = '$class' and section = '$sec';";
$conn_t = mysqli_query($conn,$sql_t);
while($row = mysqli_fetch_assoc($conn_t)){
  $dairy = $row['dairy'];
  $sub = $row['sub'];
  $date = $row['date'];
                             echo"<tr>
                                <td>$i_p</td>
                                <td>$dairy</td>
                                <td>$sub</td>
                                <td>$class</td>
                                <td>$date</td>
                                <td>$sec</td>
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
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
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