
<?php
$servername = "localhost";
$username = "root";
$password = "";
$datbase = "portal";
$conn = mysqli_connect($servername,$username,$password,$datbase);
?>

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

$sql_sub = "SELECT  `ann_id`,`message`,`send`,`date`,`end_date`  FROM  announcements where remove = 1";
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
<script>
  $(document).ready(function(){
    $('#loading').fadeOut(3);
    // $('#acc-t').DataTable();

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
      // selecting chekbox data only
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
      //   $.ajax({
      //     url : "insert-data-acc.php",
      //     method : "POST",
      //     data : {mess : mess, send: selection, max: maxD},
      //     success : function(data){
      //       $('#acc_form').trigger('reset');
            
      //       if(data)
      //       alert(data);
      //       location.reload();
      //     }
      // });

console.log(selection);
console.log(mess);
// console.log(typeof(maxD.toDateString()));
// console.log(Date.parse(maxD));
// convert.int32((maxD.toString)
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