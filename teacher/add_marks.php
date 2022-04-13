<?php
session_start();
// database connection
include '../connection/config.php';
// end database connection

//parameter from url
$test_name = $_GET['ex_n'];
$test_id = $_GET['e_i'];
$tid = $_SESSION["t_id"];
$url_sub = $_GET["s"];

$sql_t = "SELECT * FROM `teachers` where t_id = '$tid'";
$result_t = mysqli_query($conn,$sql_t);
$row_t = mysqli_num_rows($result_t);
while($row = mysqli_fetch_assoc($result_t)){
        $t_id = $row['t_id'];
        $name = $row['name'];
        $section = $row['section'];
        $class = $row['class'];
        $subject = $row['subject'];
}

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
if (isset($_POST['open_profile'])) {
  $roll_no = $_POST['roll'];
  $sec = $_POST['sec'];
  header('location:../teacher/st_pro.php?s='.$roll_no.'');
}
// ---------------------------------------
// entry the data in marksheet
$sql_chek = "SELECT * FROM `marksheet` WHERE test_name = '$test_name' and class = '$class' and section = '$section' and total_marks_obtained = 'pending' and remarks = 'pending'";
$con_chek = mysqli_query($conn,$sql_chek);
$no_chek = mysqli_num_rows($con_chek);
// echo 'No_CHCK=> '.$no_chek.'<br>';


$sql_st = "select * from students  where class = '$class' and section = '$section'";
$con_st = mysqli_query($conn,$sql_st);
$no_st = mysqli_num_rows($con_st);
// echo 'No_st =>'.$no_st.'<br>';

if($no_chek == 0){

  $sql_chek_2 = "SELECT * FROM `marksheet` WHERE test_name = '$test_name' and class = '$class' and section = '$section' and total_marks_obtained <> 'pending' and remarks <> 'pending'";
  $con_chek_2 = mysqli_query($conn,$sql_chek_2);
  $no_chek_2 = mysqli_num_rows($con_chek_2);
  // echo "No_cek_2=>".$no_chek_2."<br>";
  
  if($no_st == $no_chek_2){

  }
  else if($no_st == $no_chek){
    // echo "chota if";
  }else{
    echo 'dosra else';
    $qus=mysqli_query($conn,"select * from students  where class = '$class' and section = '$section'");
    while ($ros = $qus->fetch_assoc())
    {
        $qquery=mysqli_query($conn,
        "INSERT INTO `marksheet` (`roll_no`, `subject`, `class`, `section`, `t_id`, `test_id`, `total_marks_obtained`, `test_name`, `remarks`)
         VALUES ('$ros[roll_no]', '$url_sub', '$class', '$section', '$tid', '$test_id', 'pending', '$test_name', 'pending');");
    }
    if($qquery){
      header("Refresh:0");
    }
}
}
//-------------------
// input test data
if(isset($_POST['submit'])){
  $num = $_POST['num'];
  $remarks = $_POST['remarks'];
  $roll_no = $_POST['roll_no'];

  $sql = "UPDATE `marksheet` SET `total_marks_obtained` = '$num',remarks = '$remarks'  WHERE `marksheet`.`roll_no` = '$roll_no' and `marksheet`.`test_name` = '$test_name' and `marksheet`.`test_id` = '$test_id';";
  $result =mysqli_query($conn,$sql);
  if($result){
    // header("location:add_marks.php?i='$tid'&e_i='$test_id'&ex_n='$test_name'&err=ams"); // not working line 49 not rendering check it later
    header("add_marks.php?i='$tid'&e_i='$test_id'&ex_n='$test_name'");
  }else{
    // header("location:add_marks.php?i='$tid'&e_i='$test_id'&ex_n='$test_name'&err=amf"); // not working line 49 not rendering check it later
    header("add_marks.php?i='$tid'&e_i='$test_id'&ex_n='$test_name'");
  }
}
// input test data End

// // FInal Submit
// if(isset($_POST['submit_fi'])){
// $sql = "UPDATE `test_data` SET `status` = 'Done' WHERE `test_data`.`t_id` = '$tid' and `test_data`.`subject` = '$subject' and `test_data`.`test_name` = '$test_name' and `test_data`.`test_id` = '$test_id';";
//   $result =mysqli_query($conn,$sql);
//   if($result){
//     header("location:../teacher/marks.php?err=subs");
//   }else{
//     header("location:../teacher/marks.php?err=subf");
//   }
// }
// input test data End
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Add Marks</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <!-- custom favicon -->
  <link rel="shortcut icon" href="../assets/images/logo.jpg" type="image/x-icon">
  <!-- datatable css -->
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
.btn{
    background: #0066A2;
     color: white;
     border-style: outset;
     border-color: #0066A2;
     height: 50px;
     width: 150px;
     font: bold 15px arial, sans-serif;
     text-shadow:none;
     margin-top: 10px;
     padding: 0px;
     border-radius: 80px;
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
      width: 150px;
      height: 150px;
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
  #btn{
    background: #0066A2;
     color: white;
     border-style: outset;
     border-color: #0066A2;
     height: 40px;
     width: 100px;
     font: bold 15px arial, sans-serif;
     text-shadow:none;
     border-radius: 20px;
     margin-left: 0px;
     }
     #st_img{
         width: 70px;
         height: 70px;
         border-radius: 50px;
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
              <a href="/h_exams/connection/logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
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
            <div class="subject">
    <div class="test_info">
        <h1>Test Name "<?Php echo $test_name;?>"</h1><br>
        <h3>Showing Students:</h3>
    </div>
    <div class="err">
<?php
if(isset($_SERVER['HTTP_REFERER'])){
	if(isset($_GET['err']) && $_GET['err'] == "ams"){
        echo  "<div id='mes' class='alert alert-success alert-white rounded'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
                <div class='icon'><i class='fa fa-times-circle'></i></div>
                <strong>Done !!!</strong> Marks Added Sussecfully!!!.
                </div>";
    }else if (isset($_GET['err']) && $_GET['err'] == "amf"){
        echo  "<div id='mes' class='alert alert-danger alert-white rounded'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
                <div class='icon'><i class='fa fa-times-circle'></i></div>
                <strong>Error!</strong> Operation Failed!!! Contact Admin.
                </div>";
    
    }
}
?>
    </div>
<table id="st">
  <thead>
    <tr>
    <th>#</th>
      <th>Roll_no</th>
      <th>Name</th>
      <th>Section</th>
      <th>Class</th>
      <th>Number</th>
      <th>Remarks</th>
      <th>Submit</th>
    </tr>
   </thead>
   <tbody>
    <?php
// $sql_sub = "SELECT * from students  where class = '$class' and section = '$section'";
$sql_sub = "SELECT * FROM marksheet m join students s
on s.roll_no = m.roll_no
WHERE s.section = '$section' and s.class = '$class' and m.test_name='$test_name'";
$result_sub = mysqli_query($conn,$sql_sub);
$i = 1;
while($row = mysqli_fetch_assoc($result_sub)){
        $img = $row['user_image'];
        $roll_no = $row['roll_no'];
        $name = $row['name'];
        $fname =  $row['father_name'];
        $class =  $row['class'];
        $sec = $row['section'];
        $remarks = $row['remarks'];
        $number = $row['total_marks_obtained'];
        echo
        "<tr>".
        "<form method='post'>".
            "<td scope='row'>$i</td>".
            "<td>"."$roll_no"."</td>".
            "<td>"."$name"."</td>".
            "<td>"."$sec"."</td>".
            "<td>"."$class"."</td>".
            "<td>"."<input placeholder='$number' name='num' type='text' placeholder='Enter Test Numbers here'>"."</td>".
            "<td>"."
            <select required name='remarks'>
                          <option>--$remarks--</option>
                          <option value='Excellent'>Excellent</option>
                          <option value='Good'>Good</option>
                          <option value='Fair'>Fair</option>
                          <option value='Fail'>Fail</option>
                        </select>".
            "<td>"."<input type='hidden' value='$roll_no' name='roll_no'>
            <input type='submit' class='btn' value='Submit' name='submit'>"."</td>".
            "</form>".
            "</tr>";
            $i =$i +1;
    }
    ?>
  </div>
  <br>
    <div class="sub_f">
      <button class='btn' id="myButton">Submit</button>
  <!-- <form method="post">
    <input type="submit" class="btn" value="Submit Results" name="submit_fi">
  </form> -->
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
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script>
    // call jquey
$(document).ready( function () {
    $('#st').DataTable();
} );
  </script>
  <script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "../teacher/marks.php?e=s";
    };
</script>
</body>
</html>

<!-- // re-sending the st query check php if loginc -->