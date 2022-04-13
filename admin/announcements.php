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
$sql_t = "SELECT * FROM `admin` where s_no = '$id'";
$result_t = mysqli_query($conn,$sql_t);
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

if (isset($_POST['del_acc'])){
  $id = $_POST['id'];
  // $sql="DELETE FROM `announcements` WHERE `announcements`.`ann_id` = '$id'";
  $sql="UPDATE announcements SET remove = 0 WHERE ann_id = '$id'";
  $result = mysqli_query($conn,$sql);

  if($result){
  header('location:announcements.php?err=ds');
  }else{
  header('location:announcements.php?err=df');
  }
 }

// if(isset($_POST['enter_sub'])){
//   $mess = $_POST['mess'];
//   // $st_p = $_POST['st_p'];
//   $t_p = $_POST['t_p'];
//   $p_p = $_POST['p_p'];

//   echo $st_p."br";
//   echo $t_p."br";
//   echo $p_p."br";

  // $sql="INSERT INTO `announcements` (`message`, `t_p`, `st_p`, `p_p`) VALUES ('knkkknk', '1', '0', '1');";
  // $result = mysqli_query($conn,$sql);

  // if($result){
  // header('location:add_t.php?err=ed');
  // }else{
  // header('location:add_t.php?err=ef');
  // } 
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Announcements</title>
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
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <!-- font awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">


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
#exam_name{
        font-size: 30px;
    }
    #err{
        font-size: 25px;
        font-weight: 25px;
    }
body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f6f6f6;
    font-size: 14px;
    font-weight: 400;
    font-family: "Nunito", "Segoe UI", arial;
    color: #6c757d;
}

.container {
    background-color: #555;
    color: #ddd;
    border-radius: 10px;
    padding: 20px;
    font-family: 'Montserrat', sans-serif;
    max-width: 700px;
    margin-bottom: 15px;
    margin-top: 15px;
}
.question_form {
    background-color: #555;
    color: #ddd;
    border-radius: 10px;
    padding: 20px;
    font-family: 'Montserrat', sans-serif;
    max-width: 700px;
    margin-bottom: 15px;
    margin-top: 15px;
}

.container>p {
    font-size: 32px
}

.question {
    width: 75%
}

.options {
    position: relative;
    padding-left: 40px
}

#options label {
    display: block;
    margin-bottom: 15px;
    font-size: 14px;
    cursor: pointer
}

.options input {
    opacity: 0
}

.options input:checked~.checkmark:after {
    display: block
}

.options .checkmark:after {
    content: "";
    width: 10px;
    height: 10px;
    display: block;
    background: white;
    position: absolute;
    top: 50%;
    left: 50%;
    border-radius: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 300ms ease-in-out 0s
}
#q-a{
    margin-left: 470px;
}
.options input[type="radio"]:checked~.checkmark {
    background: #21bf73;
    transition: 300ms ease-in-out 0s
}

.options input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1)
}

.btn-primary {
    background-color: #555;
    color: #ddd;
    border: 1px solid #ddd
}

.btn-primary:hover {
    background-color: #0066A2;
    border: 1px solid #0066A2;
}

.btn {
    background: #0066A2;
     color: white;
     border-style: outset;
     border-color: #0066A2;
     height: 40px;
     width: 100px;
     font: bold 15px arial, sans-serif;
     text-shadow:none;
     border-radius: 20px;
}
.btn-submit {
    padding: 10px 0;
    margin: 10px 0;
}
.btn_q {
    background: #0066A2;
     color: white;
     border-style: outset;
     border-color: #0066A2;
     height: 40px;
     width: 100px;
     font: bold 15px arial, sans-serif;
     text-shadow:none;
     border-radius: 20px;
     width: 124px;
}

@media(max-width:576px) {
    .question {
        width: 100%;
        word-spacing: 2px;
    }
}
#heading{
    margin-bottom: 15px;
}
#marks{
    margin-bottom: 10px;
}
.question{
    margin-top: 20px;
}
.question_form{
    margin-top: 20px;
}
p{
    padding: 8px 0;
}
h2{
    padding: 8px 0;
}
h1{
    text-align: center;
}
#countdown{
    font-size: 45px;
    color: Green;
}
#mes-qd{
    display: none;
}
#mes-qf{
    display: none;
}
#mes-md{
    display: none;
}
#mes-mf{
    display: none;
}
#mes-ef{
    display: none;
}
#mes-ed{
    display: none;
}
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
     width: 100px;
     font: bold 15px arial, sans-serif;
     text-shadow:none;
     margin-top: 10px;
     margin-left: 50px;
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
     .btn_p{
        background: #0066A2;
     color: white;
     border-style: outset;
     border-color: #0066A2;
     height: 50px;
     width: 100px;
     font: bold 15px arial, sans-serif;
     text-shadow:none;
     margin-top: 10px;
     }
     .btn_d{
    background: red;
     color: white;
     border-style: outset;
     border-color: red;
     height: 40px;
     width: 180px;
     font: bold 15px arial, sans-serif;
     text-shadow:none;
     border-radius: 20px;
     margin-left: 0px;
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
    if(isset($_GET['err']) && $_GET['err'] == "ds"){
        echo  "<div id='mes' class='alert alert-success alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-check'></i></div>
        <strong>Success!</strong>  Removed Succesfully 
        </div>";
    }else if (isset($_GET['err']) && $_GET['err'] == "df"){
        echo  "<div id='mes' class='alert alert-danger alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-times-circle'></i></div>
        <strong>Error!</strong> Error, Error Code=>RE-90, Contact Admin
        </div>";
    }
}
?>
<br>
<br>
</div>

<div class="add_aanouc">
<form action="" method="post" id="acc_form">
<h1>Add Announcements:</h1><br>
Add message <span id="req">*</span><br>
<input class="data_st" id="mess" type="text" name="mess" placeholder="Enter Your message here" require><br>
<br>
<label>Students <input class='options' type='checkbox' name='st_p' value='students'> <span class='checkmark'></span> </label><br>
<label>Teachers <input class='options' type='checkbox' name='t_p'value='teacher'> <span class='checkmark'></span> </label><br>
<label>Parents <input  class='options'type='checkbox' name='p_p' value='parent'> <span class='checkmark'></span> </label><br>
<br>
End Date
<br>
<input type="date" id="acc_pan">
<br>
<br>
<input class="btn" type="submit" id="sub_acc" value="submit" name="enter_sub">
</form>
</div>
<br>
<br>
<br>
<br>
<div class="made_annoc">
<h1>All Announcements :</h1>
<table id="acc-t">
  <thead>
    <tr>
      <th>#</th>
      <th>Message</th>
      <th>Send To</th>
      <th>Date</th>
      <th>End Date</th>
      <th>Delete Button</th>
    </tr>
   </thead>
   <tbody>
<?php
$sql_sub = "SELECT  `ann_id`,`message`,`send`,`date`,`end_date`  FROM  announcements where remove=1";
$result_sub = mysqli_query($conn,$sql_sub);
$i =1;
while($sub = mysqli_fetch_assoc($result_sub)){
    $id = $sub['ann_id'];
    $mess = $sub['message'];
    $send = $sub['send'];
    $date = $sub['date'];
    $end_date = $sub['end_date'];
        echo"<tr>".
            "<td scope='row'>$i</td>".
            "<td>"."$mess"."</td>".
            "<td>"."$send"."</td>".
            "<td>"."$date"."</td>".
            "<td>"."$end_date"."</td>".
            "<td>".
            "<form method='post'>".
            "<input type='hidden' name='id' value='"."$id"."'>
            <input type='submit' class='btn_d' value='Delete Annoncement' name='del_acc'>
            </form>".
            "</td>".
            "<td>".
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

</div>   <!-- div of content end -->
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
  <!-- JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <script src="../assets/js/script.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>


  <script>
jQuery(document).ready(function() {
    jQuery('#loading').fadeOut(3);
    $('#acc-t').DataTable();
    // $("#acc_form").submit(function(event){
    //   event.preventDefault();
    // var st_p = $("input:checkbox[name=st_p]:checked").val();
    // var t_p = $("input:checkbox[name=t_p]:checked").val();
    // var p_p = $("input:checkbox[name=p_p]:checked").val();
    // console.log("studnest=>>>".st_p);
    // console.log("tahvher".t_p);
    // console.log("papkpa=>>>".p_p);
    // });

    $('#acc_form').submit(function(e){
      e.preventDefault();
      var maxD = $('#acc_pan').val();
      var mess = $('#mess').val();
      var selection = [];

      $(".options").each(function(){
        if($(this).is(":checked")){
          selection.push($(this).val());
        }
      });
      selection = selection.toString();

      // console.log(maxD);
      // console.log(selection);
      // console.log(mess);
      // console.log(maxD);

      

      // // for student
      // if(selection[0] !== undefined){
      //   var st_p = 1;
      //   console.log(st_p);
      // }else if(selection[0] === undefined)  {
      //   var st_p = 0;
      //   console.log(st_p);
      // }
      // // for teacher
      // if(selection[1] !== undefined){
      //   var t_p = 1;
      //   console.log(t_p);
      // }else if(selection[0] === undefined){
      //   var t_p = 0;
      //   console.log(t_p);
      // }
      // // for parents
      // if(selection[2] !== undefined){
      //   var p_p = 1;
      //   console.log(p_p);
      // }else if(selection[0] === undefined){
      //   var p_p = 0;
      //   console.log(p_p);
      // }
  //   if(mess != ''){
  //       $.ajax({
  //         url : "insert-data-acc.php",
  //         method : "POST",
  //         data : {mess : mess, selection0: st_p, selection1: t_p, selection2: p_p},
  //         success : function(data){
  //           $('#acc_form').trigger('reset');
  //           alert(data);
  //         }
  //     });
  // }



    if(mess !== '' && maxD !== ''){
        $.ajax({
          url : "insert-data-acc.php",
          method : "POST",
          data : {mess : mess, send: selection, max: maxD},
          success : function(data){
            $('#acc_form').trigger('reset');
            alert(data);
          }
      });
  }else{
    alert("Fill All Fields Please");
  }




// var chars = selection.split(',');
// chars.forEach((item, index)=>{
// 	console.log(item);
// })
      // }else{
      //   alert("Please fill the required form fields.");
      // }
    });



});
</script>
</body>
</html>