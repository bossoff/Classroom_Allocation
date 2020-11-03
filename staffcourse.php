<?php 
session_start();
include ('staffhead.php');
include ('dbcon.php'); 
$email = $_SESSION["email"];
$queryuser = mysqli_query($conn, "select * from staff where email = '$email'") or die(mysqli_error($conn));
 if (mysqli_num_rows($queryuser) > 0){
while ($rowqueryuser = mysqli_fetch_assoc($queryuser)){
  $staffid = $rowqueryuser['id'];
  $name = $rowqueryuser['name'];
  $reg_no = $rowqueryuser['reg_no'];
  $department = $rowqueryuser['department'];
  $depid = $rowqueryuser['depid'];
}
}else{
echo "<script>window.location='index.php';</script>"; 
  //go back to index page
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
<label style="font-size: 40px; text-align: center;"><font color="#009900" face="Trebuchet MS, Arial, Helvetica, sans-serif"><b>Staff Schedule</b><br><h2 align="center">Staff Course </h2></font></label>
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
$sql = mysqli_query($conn, "select * from course where staffid = '$staffid' ");
 if (mysqli_num_rows($sql) > 0){
while ($row = mysqli_fetch_assoc($sql)){
?>                              
<tr>
<td><?php echo $j++; ?></td>
<td><?php echo $row['course_code'];?></td>
<td><?php echo $row['course_tittle'];?></td>
<td><?php $level = $row['level'];
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