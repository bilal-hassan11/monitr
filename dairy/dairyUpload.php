<?php
	if(isset($_POST['teacher'])){ dairy(); }
function dairy(){
    // database connection
    include '../connection/config.php';
    // end database connection

        $tid = $_GET['id'];
        $class = $_POST['class'];
        $dairy = $_POST['dairy'];
        $sec = $_POST['sec'];
        $sub = $_POST['sub'];
        $t_name = $_POST['tname'];
        $pdf_type = $_FILES['pdf']['type'];
        $pdf_tmp = $_FILES['pdf']['tmp_name'];
        $folder = "../dairy/"."teacher dairy-"."$tid"."-"."$class"."-"."$sec";
        $folder_upload = "../dairy/"."teacher dairy-"."$tid"."-"."$class"."-"."$sec";  //---For local enviroment-----
        $date = date("m-d-Y");
        
        if($pdf_type === 'application/pdf'){
            move_uploaded_file($pdf_tmp, $folder);
            $update = "INSERT INTO `dairy` (`dairy`, `class`, `section`, `t_id`, `t_name`,`sub`,`file`,`date`) VALUES ('$dairy','$class','$sec', '$tid', '$t_name','$sub','$folder_upload','$date')";
            $run = mysqli_query($conn, $update);
            if($run){
                header('location:../teacher/dairy.php?err=fd');
            }else{
                header('location:../teacher/dairy.php?err=uf');
            }

        }
        else if($pdf_type === ''){
            $update = "INSERT INTO `dairy` (`dairy`, `class`, `section`, `t_id`, `t_name`,`sub`,`file`,`date`) VALUES ('$dairy','$class','$sec', '$tid', '$t_name','$sub','none','$date')";
            $run = mysqli_query($conn, $update);
            if($run){
                header('location:../teacher/dairy.php?err=fd');
            }else{
                header('location:../teacher/dairy.php?err=uf');
            }          
        }else{

            header('location:../teacher/dairy.php?err=np');
        }
    }
?>