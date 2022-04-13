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

//POST FEE DATA IN DATABASE Start
if (isset($_POST['enter_sub'])) {
  echo 'Done';
  // $class = $_POST['class'];
  // $roll_no = $_POST['roll_no'];
  // $Fee_Type = $_POST['Fee_Type'];
  // $Frequency = $_POST['Frequency'];
  // $Status = $_POST['Status'];
  // $Amount = $_POST['Amount'];
  // $Total_Amount = $_POST['Total_Amount'];
  // $CreatedAt = $_POST['CreatedAt'];
  // $CreatedBy = $_POST['CreatedBy'];

  // echo $class."<br>";
  // echo $roll_no."<br>";
  // echo $Fee_Type."<br>";
  // echo $Frequency."<br>";
  // echo $Status."<br>";
  // echo $Amount."<br>";
  // echo $Total_Amount."<br>";
  // echo $CreatedAt."<br>";
  // echo $CreatedBy."<br>";

  // $sql="INSERT INTO `tbl_fees_amount_paid` (`class`,`roll_no`,`Fee_Type`,`Frequency`,`Status`,`Amount`,`Total_Amount`,`CreatedBy`,`CreatedAt`) VALUES ('$class', '$roll_no', '$Fee_Type', '$Frequency', '$Status', '$Amount','$Total_Amount','$name',now());";
  // $result = mysqli_query($conn,$sql);

  // if($result){
  // header('location:Class_Fees.php?err=ed');
  // }else{
  // header('location:Class_Fees.php?err=ef');
  // }
}

//POST FEE DATA IN DATABASE End
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

/*Ammount Input Hide
#txtamount {
        display:none;
    }*/

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
<!-- DONE -->
<div id='suc_in' style='display:none' class='alert alert-success alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-check'></i></div>
        <strong>Success!</strong>  Added Succesfully
        </div>
        <!-- FAIL -->
        <div id='fail_in' style='display:none' class='alert alert-danger alert-white rounded'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true' id='cut'>×</button>
        <div class='icon'><i class='fa fa-times-circle'></i></div>
        <strong>Error!</strong> Error, Error Code => 601, Contact Admin
        </div>

<!--PhP Data post in Database End-->
<br>
<br>
</div>

<!---Html Table Start-->
<!---Define Fee Type Start--->
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-0">Add Fee</h4>
            <hr />
            <div class="add_sub">
                <form id="sub_fee">
                    <table id="table_id_feetype" class="table table-striped table-hover">
                        <tbody>
                            <div>
                             <div class="row">
                             <div class="col-3">
                                <label>Class Wise List : </label>
                                <select id="country">
                                    <option value="">Selete Class</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label>Roll No Wise List : </label>
                                <select id="state">
                                    <option value="">Selete Roll No</option>
                                </select>
                            </div>

                             </div>
                            </div>
                                <thead>
                        <tr>
                            <th>Fee Type</th>
                            <th>Frequency</th>
                            <th>Status</th>
                            <th>Amount</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //---------------- Fetch The Fee Type ----------------
                        $i_ft=1;
                        $sql_ft = "SELECT * FROM `tbl_fee_type` where `Status` = 1";
                        $conn_ft = mysqli_query($conn,$sql_ft);
                        while($row = mysqli_fetch_assoc($conn_ft)){
                        $Fee_Type  = $row['Fee_Type'];
                        $Frequency = $row['Frequency'];
                        $Status = $row['Status'];
                        ///$AmountFee = $row['AmountFee'];
                        $ID = $row['ID'];
                        
echo"
<tr>
    
    <td>"."".
    "
    <input id='Fee_Type$i_ft' value='$Fee_Type' readonly><br>"."</td>
    ".
    "
    <td>"."".
    "
    <input id='Frequency$i_ft' value='$Frequency' readonly><br>"."</td>
    ".
    "
    <td>
        ".
        // checkbox form
        "<form method='post'>
            ".
            "
            <div onclick='AddNewFirst()'>

              <input class='form-check-input' type='checkbox' id='checkezspeedkit$i_ft' require>
            </div>
        </form>".
        "
    </td>".
    "
    <td>
        ".
        "<form method='post'>
            ".
            "
            <input type='number' name='$Fee_Type' onchange='CalculateAmountEX($i_ft)' id='GetBodytxtAmountEX$i_ft'>
        </form>".
        "
    </td>".
    "
</tr>";
                        $i_ft++;
                      }
                        
                        //---------------- Fetch The Teacher End----------------
                        ?>
                        </div>
                    </tbody>           
                    </tbody>
                   </table>
                   <div class="footer">
                
                <div class="row">
                <div class="col-7">
                </div>
                    <div class="col-2">
                      <label>Total Amount</label>
                      <input type="number" name='totalamount_sub' onchange='CalculateAmountEX()' id='txtTotalAmountEX' class="form-control" placeholder="Total Amount*">
                    </div>
                    <div class="col-3">
                    <label class="text-white" id="totaltxtAmountEX">Total Amount</label>
                    <br />
                      <button type="button" id="savebtnfeedata" class="btn btn-primary" name="enter_sub">Save</button>
                    </div>
                  </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!---Define Fee Type End--->

<!---Gird Table View Start-->
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mb-0">Listing All Fee</h4>
                <a href="fee_form.php"><small>Show All</small></a>
            </div>
            <p>All Data of Fee Form Available here</p>
            <div class="table-responsive">
                <table id="table_id_feetype_del" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Class</th>
                        </tr>
                    </thead>
                
<?php
                    //---------------- Fetch Class List ----------------
$sql_sub = "SELECT DISTINCT class FROM `students` ORDER BY class DESC";
$result_sub = mysqli_query($conn,$sql_sub);
$i =1;
while($sub = mysqli_fetch_assoc($result_sub)){
    $class = $sub['class'];
        echo  "<tbody>
    ".
    "
    <tr>
        ".

        "
        <td>
            ".
            "<form method='post'>
                ".
                "<input type='hidden' name='ID' value='"."$ID"."'>
                <input type='submit' class='btn-primary' value='Delete' name='del_sub'>
                <input type='submit' class='btn-success' value='Edit' name='del_sub'>
            </form>".
            "
        </td>".

        "
        <form method='post'>
            ".
            "
        <td>"."$class"."</td>".
        "
        <td>
            ".
            "<input type='hidden' name='class' value='"."$class"."'>
            <input type='submit' id='btn' value='Open Here' name='open_class'>
            </form>".
            "
        </td>".
        "
    </tr>";
    $i++;
    }
    echo "
</tbody>
      </table>";
       //---------------- Fetch Class List End----------------
?>
                </table>
            </div>
        </div>
    </div>
</div>
<!---Gird Table View End-->
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
  <script src="assets/js/script.js"></script>
  <!-- // Js -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

<!--Js Table Logic Start-->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">


//call jquey
$(document).ready(function () {
    $('#table_id_feetype').DataTable();
    $('#table_id_feetype_del').DataTable();
});

//Click Check & Show Input type
function AddNewFirst() {
    if ($("#checkezspeedkit").is(":checked")) {
        $("#txtamount").show();
    }
    else {
        $("#txtamount").hide();
    }
}


//Classes Drop Down Data With AJax Start
$(document).ready(function () {
    function loadData(type, category_id) {
        $.ajax({
            url: "load-cs.php",
            type: "POST",
            data: { type: type, id: category_id },
            success: function (data) {
                if (type == "stateData") {
                    $("#state").html(data);
                } else {
                    $("#country").append(data);
                }
            }
        });
    }
    loadData();
    $("#country").on("change", function () {
        var country = $("#country").val();

        if (country != "") {
            loadData("stateData", country);
        } else {
            $("#state").html("");
        }
    })
});
//Classes Drop Down Data With AJax End

//Calculate Add Row Fee Data Start 
var addRowEX = <?php echo json_encode($i_ft);?>-1;
function CalculateAmountEX(param) {

    var txtAmountEX = $("#GetBodytxtAmountEX" + param).val();
    var _TotalAmountEX = 0;

    for (var i = 0; i < addRowEX; i++) {
        if ($("#GetBodytxtAmountEX" + i).val()) {
            txtAmountEX = $("#GetBodytxtAmountEX" + i).val();
            _TotalAmountEX = (parseInt(_TotalAmountEX == "" ? 0 : _TotalAmountEX) + parseInt(txtAmountEX == "" ? 0 : txtAmountEX));
        }
    }
    $("#txtTotalAmountEX").val(_TotalAmountEX);
    $("#txtTotalAmountEX").attr('disabled', true);
}
//Calculate Add Row Fee Data End


//All Ajax 
//Post Your Data in Data Base Table Jquery Method Start. 
//Post Show in DataBase Table
// admin name
var admin = <?php echo json_encode($name);?>
// Loop Row Count
var addRowPr = <?php echo json_encode($i_ft);?>-1;
$(document).ready(function () {
    $("#savebtnfeedata").click(function (e) {
        e.preventDefault();
        var class_no = $('#country').val();
        var roll_no = $("#state").val();
        var Total_Amount = $("#txtTotalAmountEX").val();
        var DataArrPr = [];

        for (var i = 1; i <= addRowPr; i++) {
            var Fee_Type = $("#Fee_Type"+i).val();
            var Frequency = $("#Frequency"+i).val();

            var Status = [];
          $('#checkezspeedkit'+i).each(function () {
        if ($(this).is(":checked")) {
          Status.push($(this).val());
          Status = 1;
        }
        else {
            Status = 0;
        }
    });
    Status = Status;


            var Amount = $("#GetBodytxtAmountEX"+i).val();

            var tmpDataPr = {
                 Fee_Type: Fee_Type,
                 Frequency: Frequency,
                 Status: Status,
                 Amount: Amount,
             }
            DataArrPr.push(tmpDataPr);
        }
        
        //et jsonData = JSON.stringify(DataArrPr);
        let dat =  {
                    admin: admin,
                    class_no: class_no,
                    roll_no: roll_no,
                    Total_Amount: Total_Amount,
                    DataArrPr: DataArrPr
                };
               // console.log(dat);
             let  jsonData = JSON.stringify(dat);
        if (class_no != '' || roll_no != '') {
            $.ajax({
              url: "insert-paid-feestatus.php",
                method: "POST",
                contentType: "application/json",
                data:jsonData,
                success: function (data) {
                    $('#sub_fee').trigger('reset');
                    
                    if(data == 1){
                      $('#suc_in').show();
                      alert('Succse');
                    }else{
                      $('#fail_in').show();
                      alert('Error');
                    }
                    
                    
                    
                    // alert("Succses");
                    // console.log('response');
                    // console.log(data);
                }
            });
        }
        else {
            alert("Fill All Fields Please");
        }
        console.log(admin);
        console.log(class_no);
        console.log(roll_no);
        console.log(Total_Amount);
        console.log(DataArrPr[0]);
        console.log(typeof(DataArrPr[0]));
    });
  });
//Post Your Data in Data Base Table Jquery Method End.

</script>
<!--Js Table Logic End-->

</body>
</html>