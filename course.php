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
    <li class="active"><a data-toggle="tab" href="#list">Course List</a></li>
    <li><a data-toggle="tab" href="#add">Add New Course</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="list" class="tab-pane fade in active">
      <hr>
      <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
<th>No</th>
                                              <th>Course codes</th>
                                              <th>Course Title</th>
                                              <th>Department </th>
                                              <th>Staff Incharge</th>
                                              <th>Level</th>
                                              <th>Unit</th>
                                              <th>Option</th>
                              </tr>
                              </thead>
                              <tbody>
<?php
$j = 1;
$sql = mysqli_query($conn, "select * from course");
 if (mysqli_num_rows($sql) > 0){
while ($row = mysqli_fetch_assoc($sql)){
?>                              
<tr>
<td><?php echo $j++; ?></td>
<td><?php echo $row['course_code'];?></td>
<td><?php echo $row['course_tittle'];?></td>
<td><?php echo $row['department'];?></td>
<td><?php echo $row['staffname'];?></td>
<td><?php echo $row['level'];?></td>
<td><?php echo $row['unit'];?></td>
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
        <label class="control-label col-lg-2" for="ccode">Course Code</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="ccode" name="ccode" required placeholder="Course Code">
            </div>
            </div>
        <div class="form-group">
        <label class="control-label col-lg-2" for="ctitle">Course Title</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="ctitle" name="ctitle" required placeholder="Course Title">
            </div>
            </div>
<div class="form-group">
<label class="control-label col-lg-2" for="lev">Level</label>
          <div class="col-lg-4" >
<select class="form-control" id="lev" name="level" required>
<option>Select</option>
                <?php
                  $sql = mysqli_query($conn, "select * from class");
                   if (mysqli_num_rows($sql) > 0){
                  while ($row = mysqli_fetch_assoc($sql)){
                  echo '<option value="'.$row['level'].'">'.$row['name'].'</option>';
                  }}
                  ?>
</select>
</div>
</div>

<div class="form-group">
<label class="control-label col-lg-2">Unit</label>
          <div class="col-lg-4">
<select class="form-control" name="unit" required>
<option>Select</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-2" for="staff">Staff Incharge</label>
          <div class="col-lg-4" >
<select class="form-control" id="staff" name="staff" >
<option>Select</option>
<?php
$sql1 = mysqli_query($conn, "select * from staff");
 if (mysqli_num_rows($sql1) > 0){
while ($row1 = mysqli_fetch_assoc($sql1)){
echo '<option value="'.$row1['id'].'">'.$row1['name'].'</option>';
}}
?>
</select>
</div>
</div>
<div class="form-group">
            <label class="control-label col-lg-2" for="dept">Department</label>
                      <div class="col-lg-4" >
            <select class="form-control" id="dept" name="dept" required >
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
      <button name="submit" type="submit" class="btn btn-info">Submit</button>
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
$ccode = $_POST['ccode'];
$ctitle = $_POST ['ctitle'];
$level = $_POST['level'];
$unit = $_POST['unit']; 
$staff = $_POST['staff']; 
$dept = $_POST['dept']; 


$sql2 = mysqli_query($conn, "select * from staff where id = '$staff'");
 if (mysqli_num_rows($sql2) > 0){
while ($row2 = mysqli_fetch_assoc($sql2)){
$stafname = $row2['name'];

}
}
$sql3 = mysqli_query($conn, "select * from department where id = '$dept'");
 if (mysqli_num_rows($sql3) > 0){
while ($row3 = mysqli_fetch_assoc($sql3)){
$depname = $row3['name'];
}
}


$sql = mysqli_query($conn, "INSERT INTO course (course_code, course_tittle, level, unit, staffid, staffname, department, depid) VALUES ('$ccode', '$ctitle', '$level', '$unit', '$staff', '$stafname', '$depname', '$dept' )")or die(mysqli_error($conn));
if($sql){
echo "<script>alert('Course Successfully Added');</script>";    
echo "<script>window.location='course.php';</script>";  
}else{
    echo "<script>alert('Error!!! Unable to Add New Course');</script>";    
}
}


?>

  
          </div>

  </div>



</section>



<?php include ('footer.php');?>