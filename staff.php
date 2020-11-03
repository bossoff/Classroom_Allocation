<?php include ('adminhead.php');
include ('dbcon.php');

 ?>



</header><!--/#home-->
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">

<div class="col-lg-10">
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#list">Lecturer's List</a></li>
    <li><a data-toggle="tab" href="#add">Add New Lecturer</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="list" class="tab-pane fade in active">
      <hr>
      <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                 <th>No</th>
                                              <th>Full Names</th>
                                              <th>Reg. No.</th>
                                              <th>Email</th>
                                              <th>Department</th>
                                              <th>Option</th>
                              </tr>
                              </thead>
                              <tbody>
<?php
$p = 1;
$sql = mysqli_query($conn, "select * from staff");
 if (mysqli_num_rows($sql) > 0){
while ($row = mysqli_fetch_assoc($sql)){
?>                              
<tr>
<td><?php echo $p++; ?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['reg_no'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['department'];?></td>
<td> 
                             
<div class="btn-group">
<button class="btn btn-primary">Action</button>
<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Edit</a></li>
                                            <li><a href="#">Delete</a></li>
                       
                                        </ul>    
                                  </td>
   
                                  </tr>
<?php
}
 }
 ?>                              
                              </tbody>
</table>
    </div>
    <div id="add" class="tab-pane fade">
    <hr>
<form class="form-horizontal" method="post">
        <div class="form-group">
        <label class="control-label col-lg-2" for="Sname">Full Name</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="Sname" name="sname">
            </div>
            </div>
            <div class="form-group">
        <label class="control-label col-lg-2" for="cpty">Reg. No.</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="cpty" name="reg">
          </div>
          </div>
            <div class="form-group">
        <label class="control-label col-lg-2" for="em">Email</label>
          <div class="col-lg-4">
            <input type="email" class="form-control" id="em" name="email">
          </div>
          </div>
          <div class="form-group">
            <label class="control-label col-lg-2" for="staff">Department</label>
                      <div class="col-lg-4" >
            <select class="form-control" id="staff" name="dept" required >
            <option>Select</option>
            <?php
            $sql1 = mysqli_query($conn, "select * from department");
             if (mysqli_num_rows($sql1) > 0){
            while ($row1 = mysqli_fetch_assoc($sql1)){
            echo '<option value="'.$row1['id'].'">'.$row1['dept_name'].'</option>';
            }}
            ?>
            </select>
            </div>
            </div>

 <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
<button type="reset" class="btn btn-warning">Clear</button>
    </div>
  </div>                  
          
          </div>
        </div>
      </form>
    </div>

  </div>
  <?php
if(isset($_POST['submit'])){
$sname = $_POST['sname'];
$reg = $_POST['reg'];
$type = "staff";
$email = $_POST['email'];
$dept = $_POST['dept'];

$sql2 = mysqli_query($conn, "select * from department where id = '$dept'");
 if (mysqli_num_rows($sql2) > 0){
while ($row2 = mysqli_fetch_assoc($sql2)){
$depname = $row2['dept_name'];
}
}
$sql3 = mysqli_query($conn, "select * from staff where email = '$email'");
 if (mysqli_num_rows($sql3) > 0){
echo "<script>alert('Staff Email Has Already Been Taken');</script>";
}else{
$sql = mysqli_query($conn, "INSERT INTO staff(name, reg_no, email, department, depid) VALUES ('$sname', '$reg', '$email', '$depname', '$dept')")or die(mysqli_error($conn));

if($sql){
  $sql2 = mysqli_query($conn, "INSERT INTO user(username, password, type) VALUES ('$email', '$reg', '$type')")or die(mysqli_error($conn));
echo "<script>alert('Staff Successfully Added');</script>"; 
echo "<script>window.location='staff.php';</script>"; 
}else{
  echo "<script>alert('Error!!! Unable to Add New Staff');</script>"; 
}
}
}


?>




</section>



<?php include ('footer.php');?>