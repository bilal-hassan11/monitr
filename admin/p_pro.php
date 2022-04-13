<?php
session_start();
// database connection
include '../connection/config.php';
// end database connection

$id = $_SESSION["id"];
$p_id = $_GET['s'];

//to get the roll_nO;
$sql_st = "SELECT * FROM `parents` where parent_id = '$p_id'";
$result_st = mysqli_query($conn,$sql_st);
while($row_p = mysqli_fetch_assoc($result_st)){
  $name = $row_p['parent_name'];
  $email_p = $row_p['email'];
  $address_p = $row_p['Address'];
  $paddress_p = $row_p['p_Address'];
  $phone_1_p = $row_p['phone_1'];
  $phone_2_p = $row_p['phone_2'];
  $p_cnic = $row_p['cnic'];
  $occ_p = $row_p['occupation'];
  $username_p = $row_p['username'];
  $pass_p = $row_p['password'];
  $roll_no_st = $row_p['roll_no'];
  $user_image_p = $row_p['user_image'];
}
//End to get the roll_nO;

// to get info af parent and students--
$sql_t = "SELECT s.class,s.roll_no,s.father_phone,s.father_cnic,s.father_occupation,s.father_name,s.name as st_name,s.section,s.st_cnic,
s.address,s.p_address,s.st_phone,s.user_image,p.parent_name,p.st_name,p.st_name,p.class,p.phone_1,p.phone_2,p.email as p_email,s.email as st_email
FROM 
parents p JOIN students s
on p.roll_no = s.roll_no
WHERE p.roll_no = '$roll_no_st'";
$result_t = mysqli_query($conn,$sql_t);
$row_t = mysqli_num_rows($result_t);
while($row = mysqli_fetch_assoc($result_t)){
        $roll_no_st = $row['roll_no'];
        $name_st = $row['st_name'];
        $class_st =  $row['class'];
        $sec =  $row['section'];
        $email_st = $row['st_email'];
        $st_cnic =  $row['st_cnic'];
        $fname =  $row['father_name'];
        $st_f_occ =  $row['father_occupation'];
        $father_cnic =  $row['father_cnic'];
        $st_phone =  $row['st_phone'];
        $father_phone =  $row['father_phone'];
        $st_address =  $row['address'];
        $st_paddress =  $row['p_address'];
        $user_image_st =  $row['user_image'];
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
  <title>Parent And Student Profiles</title>
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
     margin-left: 500px;
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
     #img_icon{
  width: 20px;
  height: 20px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
      echo  "<img id='profileImage' src=' assets/img/parent.jfif' alt='Please Uploaded Photo'>";
}else{
   echo  "<img id='profileImage' src='$uimg' class='user-img-radious-style' alt='Uploaded Photo'>";
}
?>
      <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello<?php echo $name;?></div>
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
          <!--  content Strat here -->

      <?php  
    if(isset($_SERVER['HTTP_REFERER'])){
    if(isset($_GET['err']) && $_GET['err'] == "updonep"){
        echo  "<div id='mes' class='alert alert-success alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-check'></i></div>
        <strong>Success!</strong>  Profile Update Succesfull!
        </div>";
    }
    if (isset($_GET['err']) && $_GET['err'] == "upfailp"){
        echo  "<div id='mes' class='alert alert-danger alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-times-circle'></i></div>
        <strong>Error!</strong> Profile Update UnSuccesfull, Please contact Admin
        </div>";
    }
    if(isset($_GET['err']) && $_GET['err'] == "passdone"){
        echo  "<div id='mes' class='alert alert-success alert-white rounded'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
                <div class='icon'><i class='fa fa-check'></i></div>
                <strong>Success!</strong>  Password update succesfully, Please Login Again
                </div>";
    }
    if (isset($_GET['err']) && $_GET['err'] == "passno"){
        echo  "<div id='mes' class='alert alert-danger alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-times-circle'></i></div>
        <strong>Error!</strong> Wrong Password!!!, Contact Admin For recovery
        </div>";
    }
}

?>
    <div class="info">
    <div class="profile_pic">
<img src="<?php echo $user_image_p;?>"  id='profile_image' alt="Not uploaded">
    </div>
    <div class="info of Parent">
    <form method="post">
    <label>
    Name
    <span id="req">*</span>
    </label>
    <input type="text" name="p_name" id="" class="data_st" value="<?php echo $name;?>" placeholder="Enter Name" readonly> <br>
    <label>
    Email
    <span id="req">*</span>
    </label>
    <input type="text" name="p_email" id="" class="data_st" value="<?php echo $email_p;?>" placeholder="Enter Email" readonly> <br>
    <label>
    CNIC Number
    <span id="req">*</span>
    </label>
    <input type="text" name="p_cnic" id="" class="data_st" value="<?php echo $p_cnic;?>" placeholder="Enter CNIC" readonly> <br>
    <label>
    Occupation
    <span id="req">*</span>
    </label>
    <input type="text" name="p_occ" id="" class="data_st" value="<?php echo $occ_p;?>" placeholder="Enter Father Occupation" readonly> <br>
    <label>
    Phone Number-1
    <span id="req">*</span>
    </label>
    <input type="text" name="f_phone" id="" class="data_st" value="<?php echo $phone_1_p;?>" placeholder="Enter Phone Number-1" readonly> <br>
    <label>
    Phone Number-2
    <span id="req">*</span>
    </label>
    <input type="text" name="f_phone_2" id="" class="data_st" value="<?php echo $phone_2_p;?>" placeholder="Enter Phone Number-2" readonly> <br>
    <label>
    Current Address
    <span id="req">*</span>
    </label>
    <textarea id="address" class="data_st" name="address" rows="6" cols="50" readonly>
    <?php echo $address_p;?>
    </textarea>
    <br>
    <label>
    Permement Address
    <span id="req">*</span>
    </label>
    <textarea id="address" class="data_st" name="p_address" rows="6" cols="50" readonly>
    <?php echo $paddress_p;?>
    </textarea>
    <br>
    <input type="submit" value="Submit" class="btn" name="submit_profile_info" readonly>
    </form>
    </div>
</div>

<h1>Your Child Information</h1>

    <div class="info of student">
<div class="profile_pic_st">
<h4 style="color:red"><img src='<?php echo $user_image_st;?>' id='profile_image' alt='Photo Not Uploaded Yet By Your child'></h4>
</div>
    <label>
    Roll no
    <span id="req">*</span>
    </label>
    <input type="text" name="roll_no" id="" class="data_st" value=" <?php echo $roll_no_st;?>" placeholder="Enter Roll NO" readonly> <br>
    <label>
    Name
    <span id="req">*</span>
    </label>
    <input type="text" name="name" id="" class="data_st" value="<?php echo $name_st;?>" placeholder="Enter Name" readonly> <br>
    <label>
    Class
    <span id="req">*</span>
    </label>
    <input type="text" name="class" id="" class="data_st" value="<?php echo $class_st;?>" placeholder="Enter class" readonly> <br>
    <label>
    Section
    <span id="req">*</span>
    </label>
    <input type="text" name="section" id="" class="data_st" value="<?php echo $sec;?>" placeholder="Enter Section"  readonlyreadonly> <br>
    <label>
    Email
    <span id="req">*</span>
    </label>
    <input type="text" name="email" id="" class="data_st" value="<?php echo $email_st;?>" placeholder="Enter Email" readonly> <br>
    <label>
    Student CNIC/B-FORM Number
    <span id="req">*</span>
    </label>
    <input type="text" name="st_cnic" id="" class="data_st" value="<?php echo $st_cnic;?>" placeholder="Enter Student CNIC" readonly> <br>
    <label>
    Father Name
    <span id="req">*</span>
    </label>
    <input type="text" name="fname" id="" class="data_st" value="<?php echo $fname;?>" placeholder="Enter Father Name" readonly> <br>
    <label>
    Father Occupation
    <span id="req">*</span>
    </label>
    <input type="text" name="st_f_occ" id="" class="data_st" value="<?php echo $st_f_occ;?>" placeholder="Enter Father Occupation" readonly> <br>
    <label>
    Father CNIC
    <span id="req">*</span>
    </label>
    <input type="text" name="f_cnic" id="" class="data_st" value="<?php echo $father_cnic;?>" placeholder="Enter Father CNIC" readonly> <br>
    <label>
    Student Phone Number
    <span id="req">*</span>
    </label>
    <input type="text" name="st_phone" id="" class="data_st" value="<?php echo $st_phone;?>" placeholder="Enter Student Phone Number" readonly> <br>
    <label>
    Father Phone Number
    <span id="req">*</span>
    </label>
    <input type="text" name="f_phone" id="" class="data_st" value="<?php echo $father_phone;?>" placeholder="Enter Father Number" readonly> <br>
    <label>
    Current Address
    <span id="req">*</span>
    </label>
    <textarea id="address" class="data_st" name="address" rows="6" cols="50" readonly>
    <?php echo $st_address;?>
    </textarea>
    <br>
    <label>
    Permement Address
    <span id="req">*</span>
    </label>
    <textarea id="address" class="data_st" name="p_address" rows="6" cols="50" readonly>
    <?php echo $st_paddress;?>
    </textarea>
    <br>
    </div>
</div>

<!-- username login details -->
<div class="registration">
  <h1>Parents Account Login Information</h1>
Username <br>
<input type="text" class="data_st" id="" value="<?php echo $username_p; ?>" readonly> <br>
Password <br>
<input type="password" class="data_st" id="" value="<?php echo $pass_p; ?>" readonly> <br>
</div>

<!--  content End here -->
          </div>
        </section>
        <!-- side theme  setting -->
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
$('textarea').val($('textarea').val().trim())
  </script>
</body>
</html>