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

    /*Delete Method Start*/
    if (isset($_POST['del_sub'])) {
      $ID = $_POST['ID'];
      $sql="UPDATE `tbl_fee_type` SET `Is_Active`= 0,`Is_Delete`= 1 WHERE `tbl_fee_type`.`ID` = '$ID'";
      $result = mysqli_query($conn,$sql);
    
      if($result){
      header('location:fee_form.php?err=ds');
      }else{
      header('location:fee_form.php?err=df');
      }
     }
      /*Delete Method End*/
?>
<!---POST FEE DATA IN DATABASE End---->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Add Teacher</title>
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

/*Radio Button Hide*/
#DateColumn {
        display:none;
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
                <div class="err">

<!--PhP Data post in Database Start-->
  <?php
    if(isset($_SERVER['HTTP_REFERER'])){
    if(isset($_GET['err']) && $_GET['err'] == "ed"){
        echo  "<div id='mes' class='alert alert-success alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-check'></i></div>
        <strong>Success!</strong>  Added Succesfully 
        </div>";
    }else if (isset($_GET['err']) && $_GET['err'] == "ef"){
        echo  "<div id='mes' class='alert alert-danger alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-times-circle'></i></div>
        <strong>Error!</strong> Error, Error Code=>123-ad, Contact Admin
        </div>";}
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
<!--PhP Data post in Database End-->
<br>
<br>
</div>

<!---Html Table Start-->
<!---Define Fee Type Start--->
<div class="Container form-group">
<div class="row">
<div class="col-5 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-0">Add Fee Type</h4>
            <hr />
            <div class="add_sub">
                <form id="feetype" action="" method="post">
                    <table id="table_id_feetype" class="table table-striped table-hover">
                        <tbody>
                            <div>
                                <div class="Container form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label for="FeeType">Fee Type<span id="req">*</span></label>
                                            <input type="text" class="form-control" id="Fee_Type" name="Fee_Type" placeholder="Fee Type" require>
                                        </div>
                                    </div>
                                </div>

                                <div class="Container form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label for="">Frequency<span id="req">*</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="Container form-group">
                                    <div class="row">
                                        <div class="col-sm ml-4" onclick="AddNewFirst()">
                                            <input class="form-check-input" type="radio" id="checkezspeedkit" name="options" value="Monthly" require>
                                            <label class="form-check-label" for="">
                                                Monthly
                                            </label>
                                        </div>
                                        <div class="col-sm ml-4" onclick="AddNewFirst2()">
                                            <input class="form-check-input" type="radio" id="checkezspeedkit2" name="options" value="Session" require>
                                            <label class="form-check-label" for="">
                                                Session
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="Container form-group">
                                    <div class="row">
                                        <div class="col-sm" id="DateColumn">
                                            <label class="form-check-label" for="">
                                                Date
                                            </label>
                                            <input class="form-control" type="date" name="CreatedOn" id="CreatedOn" require>
                                        </div>
                                    </div>
                                </div>

                                <div class="Container form-group">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label for="Status">Status<span id="req">*</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="Container form-group">
                                    <div class="row">
                                        <div class="col-sm ml-4">

                                        <input type="checkbox" class="form-check-input get_value" value="Active" require/>Is-Active
                                          
                                        
                                        </div>
                                    </div>
                                </div>

                                <input class="btn-primary" type="submit" value="submit" name="enter_sub" />
                            </div>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!---Define Fee Type End--->
<!---Gird Table View Start-->
<div class="col-7 grid-margin">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-0">Listing All Fee Type</h4>
                <a href="fee_form.php"><small>Show All</small></a>
            </div>
            <p>All Data of Fee Form Available here</p>
            <div class="table-responsive">
                <table id="table_id_feetype" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Fee Type</th>
                            <th>Frequency</th>
                            <th>Status</th>
                            <th>Created On</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //---------------- Fetch The Fee Type ----------------
                        $i_ft=1;
                        $sql_ft = "SELECT * FROM `tbl_fee_type` where `Is_Active` = 1 and `Is_Delete` = 0";
                        $conn_ft = mysqli_query($conn,$sql_ft);
                        while($row = mysqli_fetch_assoc($conn_ft)){
                        $Fee_Type  = $row['Fee_Type'];
                        $Frequency = $row['Frequency'];
                        $Is_Active = $row['Is_Active'];
                        $CreatedOn = $row['CreatedOn'];
                        $ID = $row['ID'];

                        echo"
                        <tr>
                            ".
                            "
                            <td>
                                ".
                                "<form method='post'>
                                    ".
                                    "<input type='hidden' name='ID' value='"."$ID"."'>
                                    <input type='submit' class='btn-danger' value='Delete' name='del_sub'>
                              &nbsp;
                                    ".
                                "<button type='button' name='Edit' class='btn-success btn-xs edit' name='ID' value='"."$ID"."'>
                                Edit </button>".
                                "
                                </form>".
                                "
                                
                            </td>".
                            "
                            


                            <td>"."$Fee_Type"."</td>".
                            "
                            <td id='Frequency-$i_ft'>"."$Frequency"."</td>".
                            "
                            <td id='Is_Active-$i_ft'>"."$Is_Active"."</td>".
                            "
                            <td>"."$CreatedOn"."</td>".
                            "
                            
                        </tr>";
                        $i_ft++;
                        }
                        //---------------- Fetch The Teacher End----------------
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!---Gird Table View End-->
</div>
</div>
<!---Html Table End-->



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

<!--Js Table Logic Start-->
<script>

//Status
var Is_Active = 'Is_Active-';

//Teacher Online Status Admin Page
var x_ton = <?php echo json_encode($i_ft);?>-1;
for (let i = 1; i <= x_ton; i++) {
    var acc_id_t_on = Is_Active + i;
    var acc_load_t_on = document.getElementById(acc_id_t_on).innerHTML;
    if (acc_load_t_on === '1') {
        let acc_change_on = document.getElementById(acc_id_t_on).innerHTML = "Active";
        document.getElementById(acc_id_t_on).style.color = "green";
    }
    else if (acc_load_t_on === '0') {
        let acc_change_on = document.getElementById(acc_id_t_on).innerHTML = "UnActive";
        document.getElementById(acc_id_t_on).style.color = "red";
    }
    else {
        let acc_change_on = document.getElementById(acc_id_t_on).innerHTML = "UnActive";
        document.getElementById(acc_id_t_on).style.color = "red";
    }
}

</script>


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

// call jquey--->
$(document).ready(function () {
    $('#table_id_feetype').DataTable();
});
    
    //Click Show Date Column Start
    //First Radio Button
    function AddNewFirst() {
        if ($('#checkezspeedkit').prop(":checked", true)) {
            $("#DateColumn").show();
        }
        else if ($('#checkezspeedkit').prop(":checked", false)) {
            $("#DateColumn").hide();
        }
        else {
            $("#DateColumn").hide();
        }
    }

    //Second Radio Button
    function AddNewFirst2() {
        if ($('#checkezspeedkit2').prop(":checked", true)) {
            $("#DateColumn").hide();
        }
        else if ($('#checkezspeedkit2').prop(":checked", false)) {
            $("#DateColumn").hide();
         }
        else {
            $("#DateColumn").hide();
        }
    }
    //Click Show Date Column End

//Post Data with Ajax Fee_type Form Start
$('#feetype').submit(function () {
    //e.preventDefault();

    var Fee_Type = $('#Fee_Type').val();
    var Frequency = $("input[type='radio'][name='options']:checked").val();
    var CreatedOn = $('#CreatedOn').val();

    $(".options").each(function () {
        if ($(this).is(":checked")) {
            Frequency.push($(this).val());
        }
    });

    var Status = [];
    $('.get_value').each(function () {
        if ($(this).is(":checked")) {
            Status.push($(this).val());
        }
        else {
            Status = 'Un-Active';
        }
    });
    Status = Status.toString();

    if (Fee_Type !== '' && Frequency !== '') {
        $.ajax({
            url: "insert_feetypeform.php",
            method: "POST",
            data: { Fee_Type: Fee_Type, Frequency: Frequency, CreatedOn: CreatedOn, Status: Status },
            success: function (data) {
                $('#feetype').trigger('reset');
                //alert(data);
            }
        });
    } else {
        alert("Fill All Fields Please");
    }
});
//Post Data with Ajax Fee_type Form End


</script>

<!--Js Table Logic End-->

</body>
</html>