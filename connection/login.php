<?php
if(isset($_POST['st_btn'])){student();}
if(isset($_POST['t_btn'])){teacher();}
if(isset($_POST['a_btn'])){admin();}
if(isset($_POST['p_btn'])){parents();}

  function student(){
    // database connection
    include 'config.php';
    // end database connection

      $suser = $_POST['suser'];
      $spass = $_POST['spass'];
      // for student login
      $sql_st = "SELECT * FROM `students` WHERE username = '$suser' and password = '$spass'";
      $result_st = mysqli_query($conn,$sql_st);
      $row_st = mysqli_num_rows($result_st);
      while($row = mysqli_fetch_assoc($result_st)){
        $username = $row['username'];
        $name = $row['name'];
        $sid = $row['roll_no'];
        $sid_up = $row['roll_no'];
      }
      // to check Student password
      $sqlp = "SELECT password FROM `students` where password = '$spass' where username = '$user'";
      $resultp = mysqli_query($conn,$sqlp);
      $rowp_st = mysqli_num_rows($resultp);

      // to check user exist or not
      $sqle = "SELECT * FROM `students` where username = '$suser'";
      $resulte = mysqli_query($conn,$sqle);
      $rowe_st = mysqli_num_rows($resulte);

      if($row_st == 1){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["name"] = $name;
        $_SESSION["st_id"] = $sid;
        $_SESSION["in"] = true;
        $_SESSION["st"] = true;

        //update Action Status
        $sql_st_up = "update students set online_status = 1 where roll_no = '$sid_up'";
        $result_st = mysqli_query($conn,$sql_st_up);
        $row_st = mysqli_num_rows($result_st);

      header("location:/h_st/student/dashboard.php");

    } else if($rowe_st == 1 && $rowp_st == 0){
      header("location:/h_st/index.php?err=wrongstpass");
      echo 'p';
    }
    else if($rowe_st == 0){
      header("location:/h_st/index.php?err=wrongst");
      echo 'k';
    }
  }

  function parents(){
    // database connection
    include 'config.php';
    // end database connection

      $suser = $_POST['suser'];
      $spass = $_POST['spass'];
      // for parent login
      $sql_st = "SELECT * FROM `parents` WHERE username = '$suser' and password = '$spass'";
      $result_st = mysqli_query($conn,$sql_st);
      $row_st = mysqli_num_rows($result_st);
      while($row = mysqli_fetch_assoc($result_st)){
        $username = $row['username'];
        $name = $row['parent_name'];
        $p_id = $row['parent_id'];
        $st_roll = $row['roll_no'];
        $st_rollup = $row['username'];
      }
      // to check parent password
      $sqlp = "SELECT password FROM `parents` where password = '$spass' where username = '$user'";
      $resultp = mysqli_query($conn,$sqlp);
      $rowp_st = mysqli_num_rows($resultp);
      // to check user exist or not
      $sqle = "SELECT * FROM `parents` where username = '$suser'";
      $resulte = mysqli_query($conn,$sqle);
      $rowe_st = mysqli_num_rows($resulte);

      if($row_st == 1){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["p_name"] = $name;
        $_SESSION["p_id"] = $p_id;
        $_SESSION["roll_st"] = $st_roll;
        $_SESSION["in"] = true;
        $_SESSION["p"] = true;

         //update Action Status
         $sql_p_up = "update parents set online_status = 1 where username = '$st_rollup'";
         $result_st = mysqli_query($conn,$sql_p_up);
         $row_st = mysqli_num_rows($result_st);

      header("location:/h_st/parents/dashboard.php");

    } else if($rowe_st == 1 && $rowp_st == 0){
      header("location:/h_st/parents/login.php?err=wrongstpass");
      echo 'p';
    }
    else if($rowe_st == 0){
      header("location:/h_st/parents/login.php?err=wrongst");
      echo 'k';
    }
  }


  function teacher(){
    // database connection
    include 'config.php';
  // end database connection

    // for Teacher login
      $tuser = $_POST['tuser'];
      $tpass = $_POST['tpass'];

      // for Teacher login
      $sql_t = "SELECT * FROM `teachers` WHERE username = '$tuser' and password = '$tpass'";
      $result_t = mysqli_query($conn,$sql_t);
      $row_t = mysqli_num_rows($result_t);
      while($row = mysqli_fetch_assoc($result_t)){
        $username = $row['username'];
        $name = $row['name'];
        $tid = $row['t_id'];
        $tidup = $row['t_id'];
      }
      // to check teacher password
      $sqlp = "SELECT * FROM `teachers` where password = '$tpass' where username = '$tuser'";
      $resultp = mysqli_query($conn,$sqlp);
      $rowp_t = mysqli_num_rows($resultp);
      // to check user exist or not
      $sqle = "SELECT * FROM `teachers` where username = '$tuser'";
      $resulte = mysqli_query($conn,$sqle);
      $rowe_t = mysqli_num_rows($resulte);

      if($row_t == 1){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["name"] = $name;
        $_SESSION["t_id"] = $tid;
        $_SESSION["in"] = true;
        $_SESSION["t"] = true;

         //update Action Status
         $sql_t_up = "update teachers set online_status = 1 where t_id = '$tidup'";
         $result_t = mysqli_query($conn,$sql_t_up);
         $row_t = mysqli_num_rows($result_t);

      header("location:/h_st/teacher/dashboard.php");

    } else if($rowe_t == 1 && $rowp_t == 0){
      header("location:../teacherlog.php?err=wrongtpass");
    }
    else if($rowe_t == 0){
      header("location:../teacherlog.php?err=wrongt");
    }
}

function admin(){
    // database connection
    include 'config.php';
  // end database connection



    // for admin login
      $user = $_POST['user'];
      $pass = $_POST['pass'];

      $sql_a = "SELECT * FROM `admin` WHERE username = '$user' and password = '$pass'";
      $result_a = mysqli_query($conn,$sql_a);
      $row_a = mysqli_num_rows($result_a);
      while($row = mysqli_fetch_assoc($result_a)){
        $username = $row['username'];
        $name = $row['name'];
        $id = $row['s_no'];
      }
      // to check admin password
      $sqlp = "SELECT * FROM `admin` where password = '$pass' where username ='$user'";
      $resultp = mysqli_query($conn,$sqlp);
      $rowp_a = mysqli_num_rows($resultp);
      // to check user exist or not
      $sqle = "SELECT * FROM `admin` where username = '$user'";
      $resulte = mysqli_query($conn,$sqle);
      $rowe_a = mysqli_num_rows($resulte);

      if($row_a == 1){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["name"] = $name;
        $_SESSION["id"] = $id;
        $_SESSION["in"] = true;
        $_SESSION["admin"] = true;
      header("location:/h_st/admin/dashboard.php");


      // header("location:{$servername}/{$datbase}/welcome.php");
    } else if($rowe_a == 1 && $rowp_a == 0){
      header("location:/h_st/admin/index.php?err=wrongpass");
    }
    else if($rowe_a == 0){
      header("location:/h_st/admin/index.php?err=wrongad");
    }
  }
?>