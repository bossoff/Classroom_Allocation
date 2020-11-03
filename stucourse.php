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


</header><!--/#home-->
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">

<div class="col-lg-2">

</div>
<div class="col-lg-8 text-center">
<label style="font-size: 40px; text-align: center;"><font color="#009900" face="Trebuchet MS, Arial, Helvetica, sans-serif"><b><?php echo $deptname; ?>  Department</b><br><h2 align="center"><?php echo $class." Course"; ?> </h2></font></label>
<br>
      <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th style="text-align: center;">No</th>
                                  <th style="text-align: center;">Course codes</th>
                                  <th style="text-align: center;">Course Title</th>
                                  <th style="text-align: center;">Level</th>
                                  <th style="text-align: center;">Unit</th>
                              </tr>
                              </thead>
                              <tbody>
<?php
$j = 1;
$sql = mysqli_query($conn, "select * from course where level = '$level' ");
 if (mysqli_num_rows($sql) > 0){
while ($row = mysqli_fetch_assoc($sql)){
?>                              
<tr>
<td><?php echo $j++; ?></td>
<td><?php echo $row['course_code'];?></td>
<td><?php echo $row['course_tittle'];?></td>
<td><?php
$level = $row['level'];
$sql3 = mysqli_query($conn, "select * from class where level = '$level' ");
 if (mysqli_num_rows($sql3) > 0){
while ($row3 = mysqli_fetch_assoc($sql3)){
$class = $row3['category'];
}}

 echo $class;
 ?></td>
<td><?php echo $row['unit'];?></td>

                                  </tr>
<?php
}
 }
?>
                              
                              </tbody>
                          </table>
    </div>
    <div class="col-lg-2"

</div>

  </div>



</section>



<?php include ('footer.php');?>