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
    <li class="active"><a data-toggle="tab" href="#list">Student List</a></li>
    <li><a data-toggle="tab" href="#add">Add New Student</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="list" class="tab-pane fade in active">
      <hr>
      <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Student Names</th>
                                  <th>Matric No.</th>
                                  <th>Department</th>
                                  <th>Email</th>
                                  <th>Class</th>
                                  <th>Level</th>
                                  <th>Category</th>
                                <th>Option</th>
                              </tr>
                              </thead>
                              <tbody>
<?php
$p = 1;
$sql = mysqli_query($conn, "select * from student");
 if (mysqli_num_rows($sql) > 0){
while ($row = mysqli_fetch_assoc($sql)){
  $depid = $row['dept'];
?>                              
<tr>
<td><?php echo $p++; ?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['matric_no'];?></td>
<td><?php
$sql2 = mysqli_query($conn, "select * from department where id = '$depid' ");
 if (mysqli_num_rows($sql2) > 0){
while ($row2 = mysqli_fetch_assoc($sql2)){
$depname = $row2['dept_name'];
}
}else{
 $depname = "Nil" ;
}


 echo $depname;?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['class'];?></td>
<td><?php echo $row['level'];?></td>
<td><?php echo $row['category'];?></td>
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
        <label class="control-label col-lg-2" for="ccode">Full Name</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="ccode" name="fname" required>
            </div>
            </div>
        <div class="form-group">
        <label class="control-label col-lg-2" for="ctitle">Matric No.</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="ctitle" name="matric" placeholder="E.g HND/16/COM/FT/001" required>
            </div>
            </div>
<div class="form-group">
        <label class="control-label col-lg-2" for="ctitle">Department</label>
          <div class="col-lg-4">
          <select class="form-control" name="dept">
<?php
$sql = mysqli_query($conn, "select * from department");
 if (mysqli_num_rows($sql) > 0){
while ($row = mysqli_fetch_assoc($sql)){
echo'<option value="'.$row['id'] .'">'.$row['dept_name'].'</option>';
}}

?>


</select>
            </div>
            </div>
            <div class="form-group">
        <label class="control-label col-lg-2" for="email">Student Email</label>
          <div class="col-lg-4">
            <input type="email" class="form-control" id="email" name="email" required>
            </div>
            </div>
      <div class="form-group">
      <label class="control-label col-lg-2" for="lev">Class Level</label>
                <div class="col-lg-4" >
      <select class="form-control" id="lev" name="class" >
      <option>Select</option>
      <?php
      $sql = mysqli_query($conn, "select * from class");
       if (mysqli_num_rows($sql) > 0){
      while ($row = mysqli_fetch_assoc($sql)){
      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
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
$fname = $_POST['fname'];
$email = $_POST['email'];
$matric = $_POST['matric'];
$class = $_POST['class'];
$dept = $_POST['dept'];
$type = "student";

$sql1 = mysqli_query($conn, "select * from class where id = '$class'");
 if (mysqli_num_rows($sql1) > 0){
while ($row = mysqli_fetch_assoc($sql1)){
$classname = $row['name'];
$category = $row['category'];
$level = $row['level'];
$type = "Student";

}}
$sql11 = mysqli_query($conn, "select * from student where email = '$email'");
 if (mysqli_num_rows($sql11) > 0){
 echo "<script>alert('Error!!! Student Email Is Already In Use');</script>"; 

 }else{

$sql = mysqli_query($conn, "INSERT INTO student(name, matric_no, dept, email, class, level, category) VALUES ('$fname', '$matric', '$dept', '$email', '$classname', '$level', '$category')")or die(mysqli_error($conn));
$sql22 = mysqli_query($conn, "INSERT INTO user(username, password, type) VALUES ('$email', '$matric', '$type')")or die(mysqli_error($conn));
//$sql2 = mysqli_query($conn, "INSERT INTO user(username, type) VALUES ('$matric', '$type')")or die(mysqli_error($conn));

if($sql){
echo "<script>alert('Student Successfully Added');</script>"; 
echo "<script>window.location='student.php';</script>"; 
}else{
  echo "<script>alert('Error!!! Unable to Add New Student');</script>"; 
}
}
}

?>

          </div>

  </div>



</section>



<?php include ('footer.php');?>