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
  $name_admin = $_SESSION["name"];
  $id = $_SESSION["id"];
  //  include("/centut/connection/config.php");
$sql_t = "SELECT * FROM `admin` where s_no = '$id'";
$result_t = mysqli_query($conn,$sql_t);
      $row_t = mysqli_num_rows($result_t);
      while($row = mysqli_fetch_assoc($result_t)){
        $uname = $row['username'];
        $name_admin = $row['name'];
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
if (isset($_POST['enter_data'])) {
  $roll_no = $_POST['roll_no'];
  $name_st = $_POST['name'];
  $class_st = $_POST['class'];
  $sec_st = $_POST['sec'];
  $uname_st = $_POST['uname_st'];
  $pass_st = $_POST['pass_st'];
  // parents
  $name_p = $_POST['name_p'];
  $uname_p = $_POST['uname_p'];
  $pass_p = $_POST['pass_p'];
  $cnic_p = $_POST['cnic_p'];
  $rel_p = $_POST['rel'];
  $roll_no_p = $_POST['roll_no_p'];
  $roll_no_p_name = $_POST['roll_no_p_name'];

  // echo "roll_no => ".$roll_no."<br>".
  // "name_st => ".$name_st."<br>".
  // "class_st => ".$class_st."<br>".
  // "sec_st => ".$sec_st."<br>".
  // "uname_st => ".$uname_st."<br>".
  // "pass_st => ".$pass_st."<br>".
  // "name_p => ".$name_p."<br>".
  // "uname_p => ".$uname_p."<br>".
  // "pass_p => ".$pass_p."<br>".
  // "cnic_p => ".$cnic_p."<br>".
  // "rel_p => ".$rel_p."<br>".
  // "roll_no_p => ".$roll_no_p."<br>".
  // "roll_no_p_name => ".$roll_no_p_name."<br>";

  

// students
  $sql_st="INSERT INTO `students` (`roll_no`,`name`,`class`,`section`,`username`,`password`,`addedby`) VALUES ('$roll_no','$name_st','$class_st','$sec_st','$uname_st','$pass_st','$name_admin');";
  $result_st = mysqli_query($conn,$sql_st);
  // parents
  $sql_p="INSERT INTO `parents` (`parent_name`,`username`,`password`,`cnic`,`roll_no`,`st_name`,`relationship`,`addedby`) VALUES ('$name_p','$uname_p','$pass_p','$cnic_p','$roll_no_p','$roll_no_p_name','$rel_p','$name_admin');";
  $result_p = mysqli_query($conn,$sql_p);

  if($result_st && !$result_p){
  header('location:add_st.php?err=01');
  // echo 'st';
  }else if(!$result_st && $result_p){
  header('location:add_st.php?err=10');
  // echo 'p';
  }else if($result_st && $result_p){
  header('location:add_st.php?err=11');
  // echo 'both';
  }
}
if (isset($_POST['del_sub'])) {
  $id = $_POST['id'];
  $sql="DELETE FROM `students` WHERE `students`.`roll_no` = '$id'";
  $result = mysqli_query($conn,$sql);

  if($result){
  header('location:add_st.php?err=ds');
  }else{
  header('location:add_st.php?err=df');
  }
 }
if (isset($_POST['del_par'])) {
  $id = $_POST['id'];
  $sql="DELETE FROM `parents` WHERE `parents`.`parent_id` = '$id'";
  $result = mysqli_query($conn,$sql);

  if($result){
  header('location:add_st.php?err=ds');
  }else{
  header('location:add_st.php?err=df');
  }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Add Student</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <!-- custom favicon -->
  <link rel="shortcut icon" href="assets/img/logo.jpg" type="image/x-icon">
  <!-- // css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">  
<!-- // jquery Google cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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
    #req{
        color: red;
    }
    .data_st{
    width: 40%;
    padding: 12px 20px;
    margin: 8px 0;
    margin-left: 13px;
    border-width:0px;
    border:none;
    outline-style: 1px solid #eee;
    border-radius: 20px;
    }
    .info{
        width: 100vw;
        padding: 25px;
    }
    .data_st:focus {
    border: 2px solid #e5e6e7;
    outline: none;
    }
@media only screen and (max-width: 600px) {
    .data_st {
	width: 65%;
  }
}
    .img_p{
         height: 250px;
         width: 250px;
     }
     .profile_pic{
         width: 100vw;
         padding-left: 27%;
     }
     #profile_image{
      width: 100px;
      height: 100px;
      border-radius: 130px;
     }
  #logo_header{
    width: 60px;
    height: 60px;
  }
  #profileImage{
    width: 60px;
  }
  #sub{
  margin: 8px 12px;
box-sizing: border-box;
outline: none;
padding: 12px 20px;
    margin: 8px 0;
    margin-left: 13px;
    border-width:0px;
    border:none;
    outline-style: 1px solid #eee;
    border-radius: 20px;
  }
  td{
    padding: 8px;
  }
  th{
    padding: 8px;
  }
  .btn{
    background: #0066A2;
     color: white;
     border-style: outset;
     border-color: #0066A2;
     height: 40px;
     width: 150px;
     font: bold 15px arial, sans-serif;
     text-shadow:none;
     border-radius: 20px;
     margin-left: 0px;
     }
  .btn_d{
    background: red;
     color: white;
     border-style: outset;
     border-color: red;
     height: 40px;
     width: 150px;
     font: bold 15px arial, sans-serif;
     text-shadow:none;
     border-radius: 20px;
     margin-left: 0px;
     }
  .btn_ap{
    background: green;
     color: white;
     border-style: outset;
     border-color: #c3e6cb;
     height: 40px;
     width: 150px;
     font: bold 15px arial, sans-serif;
     text-shadow:none;
     border-radius: 20px;
     margin-left: 0px;
     }
  .btn_b{
    background: #da4932;
     color: white;
     border-style: outset;
     border-color: #ca452e;;
     height: 40px;
     width: 150px;
     font: bold 15px arial, sans-serif;
     text-shadow:none;
     border-radius: 20px;
     margin-left: 0px;
     }
     a {
    color: #0060B6;
    text-decoration: none;
}

a:hover {
    color:#00A0C6; 
    text-decoration:none; 
    cursor:pointer;  
}
#go:hover{
  cursor:pointer;
}
#img_icon{
  width: 20px;
  height: 20px;
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
      echo  "<img id='profileImage' src='assets/img/admin.png' class='mobile_profile_image' alt='Please Uploaded Photo'>";
}else{
   echo  "<img id='profileImage' src='$uimg' class='mobile_profile_image' alt='Uploaded Photo'>";
}
?>
      <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?php echo $name_admin;?></div>
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
              <a href="pt.php" class="nav-link"><img id="img_icon" src="assets/img/parenticon.png"><span>Parents</span></a>
            </li>
            <li class="dropdown">
              <a href="add_t.php" class="nav-link"><img id="img_icon" src="assets/img/add_teacher.png"><span>Add Teacher</span></a>
            </li>
            <li class="dropdown">
              <a href="add_st.php" class="nav-link"><img id="img_icon" src="assets/img/add_st.png"><span>Add Student</span></a>
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
  <div class="err">
  <?php
    if(isset($_SERVER['HTTP_REFERER'])){
    if(isset($_GET['err']) && $_GET['err'] == "11"){
        echo  "<div id='mes' class='alert alert-success alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-check'></i></div>
        <strong>Success!</strong>  Added Succesfully 
        </div>";
    }else if (isset($_GET['err']) && $_GET['err'] == "10"){
        echo  "<div id='mes' class='alert alert-danger alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-times-circle'></i></div>
        <strong>Error!</strong> Error, Error Code=>st-n-10, Contact Admin
        </div>";
    }else if (isset($_GET['err']) && $_GET['err'] == "01"){
        echo  "<div id='mes' class='alert alert-danger alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-times-circle'></i></div>
        <strong>Error!</strong> Error, Error Code=>pn-01, Contact Admin
        </div>";
      }
        else if(isset($_GET['err']) && $_GET['err'] == "ds"){
        echo  "<div id='mes' class='alert alert-success alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-check'></i></div>
        <strong>Success!</strong>  Delete Succesfully 
        </div>";
    }else if (isset($_GET['err']) && $_GET['err'] == "df"){
        echo  "<div id='mes' class='alert alert-danger alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-times-circle'></i></div>
        <strong>Error!</strong> Error, Error Code=>124-ad, Contact Admin
        </div>";}
}
?>
<br>
<br>
</div>

<div class="add_sub">
<form action="" method="post">
<h1>Add Student:</h1><br>
GR No / Roll No <span id="req">*</span><br>
<input class="data_st" id="st" type="text" name="roll_no" placeholder="Enter GR No / Roll No" require><br>
<br>
Full Name <span id="req">*</span><br>
<input class="data_st" type="text" name="name" placeholder="Enter Full Name" require><br>
<br>
Class <span id="req">*</span><br>
<input class="data_st" type="text" name="class" placeholder="Enter class" require><br>
<br>
Section <span id="req">*</span><br>
<input class="data_st" type="text" name="sec" placeholder="Enter Section" require><br>
<br>
Username <span id="req">* Note (This is one time only. Student have to change it as they want)</span><br>
<input class="data_st" type="text" name="uname_st" placeholder="Enter username for portal use of Student" require><br>
<br>
Password <span id="req">* Note (This is one time only. Student have to change it as they want)</span><br>
<input class="data_st" type="password" name="pass_st" placeholder="Enter username for portal use of Student" require><br>
<br>


<h1>Enter Parent Details:</h1><br>
Name Of Parent/Guardian <span id="req">*</span><br>
<input class="data_st" type="text" name="name_p" placeholder="Enter Name of Parent/Guardian" require><br>
<br>
Username <span id="req">* Note (This is one time only. Student have to change it as they want)</span><br>
<input class="data_st" type="text" name="uname_p" placeholder="Enter Username of parent" require><br>
<br>
Password <span id="req">* Note (This is one time only. Student have to change it as they want)</span><br>
<input class="data_st" type="password" name="pass_p" placeholder="Enter Password of parent" require><br>
<br>
Relation <span id="req">*</span><br>
<input class="data_st" type="text" name="rel" placeholder="Enter Relation" require><br>
<br>
CNIC <span id="req">*</span><br>
<input class="data_st" type="text" name="cnic_p" placeholder="Enter CNIC" require><br>
<br>
<br>
<h5>Information who belongs to this particular parent</h5><span id="req">* Note(Please Cross Check the roll no because this is unchangable after creating account)</span><br>
Student GR.No/Roll No<span id="req">*</span><br>
<input class="data_st" type="text" id="nd" name="roll_no_p" placeholder="Enter GR.No/Roll No" require><br>
Student Full Name<span id="req">*</span><br>
<input class="data_st" type="text" id="nd" name="roll_no_p_name" placeholder="Enter Full Name" require><br>
<br>
<input class="btn" type="submit" value="submit" name="enter_data">
</form>
</div>
<br>
<br>
<br>
<div class="SelectSsub">
<h1>All Students :</h1>
<table id="te">
  <thead>
    <tr>
      <th>#</th>
      <th>Roll No</th>
      <th>Name</th>
      <th>class</th>
      <th>Section</th>
      <th>Added By</th>
      <th>Delete Button</th>
    </tr>
   </thead>
   <tbody>
<?php
$sql_sub = "SELECT  * FROM students";
$result_sub = mysqli_query($conn,$sql_sub);
$i =1;
while($sub = mysqli_fetch_assoc($result_sub)){
    $t_name = $sub['name'];
    $class = $sub['class'];
    $name_admin = $sub['addedby'];
    $section = $sub['section'];
    $id = $sub['roll_no'];
        echo"<tr>".
            "<td scope='row'>$i</td>".
            "<td>"."$id"."</td>".
            "<td>"."$t_name"."</td>".
            "<td>"."$class"."</td>".
            "<td>"."$section"."</td>".
            "<td>"."$name_admin"."</td>".
            "<td>".
            "<form method='post'>".
            "<input type='hidden' name='id' value='"."$id"."'>
            <input type='submit' class='btn_d' value='Delete Student' name='del_sub'>
            </form>".
            "</td>".
            "</tr>";
            $i++;
    }
echo "</tbody>
      </table>";

?>
<h1>All Parents :</h1>
<table id="te">
  <thead>
    <tr>
      <th>#</th>
      <th>Parent Name</th>
      <th>Relation</th>
      <th>Student Name</th>
      <th>Roll No</th>
      <th>class</th>
      <th>Section</th>
      <th>Added By</th>
      <th>Delete Button</th>
    </tr>
   </thead>
   <tbody>
<?php
$sql_sub = "SELECT  * FROM parents";
$result_sub = mysqli_query($conn,$sql_sub);
$i =1;
while($sub = mysqli_fetch_assoc($result_sub)){
    $p_name = $sub['parent_name'];
    $name_admin = $sub['addedby'];
    $id = $sub['parent_id'];
    $st_p_roll_no = $sub['roll_no'];
    $p_st_name = $sub['st_name'];
    $p_st_class = $sub['class'];
    $p_st_sec = $sub['section'];
    $p_st_relation = $sub['relationship'];
        echo"<tr>".
            "<td scope='row'>$i</td>".
            "<td>"."$p_name"."</td>".
            "<td>"."$p_st_relation"."</td>".
            "<td>"."$p_st_name"."</td>".
            "<td>"."$st_p_roll_no"."</td>".
            "<td>"." $p_st_class"."</td>".
            "<td>"."$p_st_sec"."</td>".
            "<td>"."$name_admin"."</td>".
            "<td>".
            "<form method='post'>".
            "<input type='hidden' name='id' value='"."$id"."'>
            <input type='submit' class='btn_d' value='Delete Student' name='del_par'>
            </form>".
            "</td>".
            "</tr>";
            $i++;
    }
echo "</tbody>
      </table>";
?>
</div>
<div class="back">
    <!-- <input class="btn"><a href="dashboard.php">Go Back</a> -->
    <a href="dashboard.php"><input id="go" class="btn" type="text" value="Go Back">
</input></a> 
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
  <script src="../assets/js/script.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <!-- // Js -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script src="../assets/js/script.js"></script>
<script>
var acc = 'acc-';
var ap_btn = 'btn_ap-';
var b_btn = 'btn_b-';
var x = <?php echo json_encode($i); ?>-1;
for(let i=1; i<=x; i++){
  var acc_id = acc+i;
  var btn_ap_id = ap_btn+i;
  var btn_b_id = b_btn+i;
  var acc_load = document.getElementById(acc_id).innerHTML;
  var btn_b_load = document.getElementById(btn_b_id);
  var btn_ap_load = document.getElementById(btn_ap_id);
  if(acc_load === '1'){
    btn_ap_load.style.display = 'none';
  let acc_change = document.getElementById(acc_id).innerHTML="Approved";
  // acc_change;
}
  if(acc_load === '0'){
    btn_b_load.style.display = 'none';
    let acc_change = document.getElementById(acc_id).innerHTML="Block";
}
}
// call jquey -->
$(document).ready( function () {
    $('#te').DataTable();
} );
// var st = document.getElementById("st");
// var nd = document.getElementById("nd");
// st.addEventListener("focusout",()=>{
//   // nd.value = st.value;
//   console.log('jbjbjkb');
// });
// console.log(nd.value);
</script>
</body>
</html>