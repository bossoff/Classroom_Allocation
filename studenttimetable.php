<?php 
session_start();
include ('stuhead.php');
include ('dbcon.php'); 
$email = $_SESSION["email"];
$queryuser = mysqli_query($conn, "select * from student where email = '$email'") or die(mysqli_error($conn));
 if (mysqli_num_rows($queryuser) > 0){
while ($rowqueryuser = mysqli_fetch_assoc($queryuser)){
  $name = $rowqueryuser['name'];
  $matric_no = $rowqueryuser['matric_no'];
  $class = $rowqueryuser['class'];
  $level = $rowqueryuser['level'];
  $category = $rowqueryuser['category'];
  $class = $rowqueryuser['class'];
  $department = $rowqueryuser['dept'];
  $semester = "1";
}
}
$queryuser2 = mysqli_query($conn, "select * from department where id = '$department'") or die(mysqli_error($conn));
 if (mysqli_num_rows($queryuser2) > 0){
while ($rowqueryuser2 = mysqli_fetch_assoc($queryuser2)){
$deptname = $rowqueryuser2['dept_name'];


}
}


else{
echo "<script>window.location='index.php';</script>"; 
  //go back to index page
}
$mstart = substr($matric_no, 0, 1);
if ($mstart == 'N'){
$no = strlen($matric_no);
if ($no == 16){
$stnum = substr($matric_no, 13, 3);
}elseif($no == 17){
$stnum = substr($matric_no, 13, 4);
}
}elseif($mstart == 'H'){
$no = strlen($matric_no);
if ($no == 17){
$stnum = substr($matric_no, 14, 3);
}elseif($no == 18){
$stnum = substr($matric_no, 14, 4);
}
}
?>



<section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">

<div class="col-lg-2">

</div>
<div class="col-lg-8 text-center">
<label style="font-size: 40px; text-align: center;"><font color="#009900" face="Trebuchet MS, Arial, Helvetica, sans-serif"><b><?php echo $deptname; ?> Department</b><br><h2 align="center"><?php echo $class; ?> Time Table</h2></font></label>
<br>
      <table class="table table-bordered table-condensed">
                              <thead>



<tr>
                                  <th style="text-align: center;">Day</th>
                                  <th style="text-align: center;">08:00am - 10:00am</th>
                                  <th style="text-align: center;">10:00am - 12:00pm</th>
                                  <th style="text-align: center;">12:00pm - 2:00pm</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr><td></td>

<?php
$dd = 1;
while ($dd <= 3){
?>
<td><table class="table table-bordered  table-condensed">
  <thead>
<tr>
<th>Course</th>
<th>Class</th>
<th>Lecturer</th>
</tr>
</thead>
</table>
</td>
<?php
$dd++;
}

?>                              
</tr>

                              
<?php
$k = 1;
$p = 1; 
while($k <= 5){
  if($k == 1){
      $daay = "Monday";
    }elseif($k == 2){
      $daay = "Tuesday";
    }elseif($k == 3){
      $daay = "Wednesday";
    }elseif($k == 4){
      $daay = "Thursday";
    }elseif($k == 5){
      $daay = "Friday";
    }
echo '<tr><td>'.$daay.'</td>';
  while($p <= 3){
?>
<td>
<table class="table" >
<?php

    $day = $k;
    $period = $p;
    $sql = mysqli_query($conn, "SELECT *  from schedule where edate = '$day' and period = '$period' and department = '$department' and courselevel = '$level' ") or die(mysqli_error($conn));
if (mysqli_num_rows($sql) > 0){
  while($row = mysqli_fetch_assoc($sql)){
  $id = $row['id'];
  $coursecode = $row['coursecode'];
  $roomname = $row['hallname'];
  $staffname = $row['staffname'];
  $classname = $row['classname'];
  
?>
      <tr>
      <td><?php  echo $coursecode;  ?></td>
      <td><?php  echo $classname;  ?></td>
      <td><?php  echo $staffname;  ?></td>
      </tr>

<?php

}

}
?>
    
      
      </table>                                
</td>


<?php
  $p++;
  }
  $p = 1;
$k++;
echo '</tr>';
}
echo '  </tbody></table>';

?> 













    </div>
<div class="col-lg-2"

</div>




</section>



<?php include ('footer.php');?>