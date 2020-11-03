<?php include ('adminhead.php'); 
include ('dbcon.php'); 
?>



</header><!--/#home-->
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">

<div class="col-lg-10">
<div class="col-lg-10">
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#list">Department List</a></li>
    <li><a data-toggle="tab" href="#add">Add New Department</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="list" class="tab-pane fade in active">
      <hr>
      <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Dept. Name</th>
                                  <th>H.O.D</th>
                                  <th>Option</th>
                              </tr>
                              </thead>
                              <tbody>
<?php
$m = 1;
$sql = mysqli_query($conn, "select * from department");
 if (mysqli_num_rows($sql) > 0){
while ($row = mysqli_fetch_assoc($sql)){
?>                              
<tr>
<td><?php echo $m++; ?></td>
<td><?php echo $row['dept_name'];?></td>
<td><?php echo $row['hod'];?></td>
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
        <label class="control-label col-lg-2" for="dept">Department</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="dept" name="dept" required>
            </div>
            </div>
<div class="form-group">
<label class="control-label col-lg-2" for="hod">H.O.D</label>
          <div class="col-lg-6">
            <input type="text" class="form-control" id="hod" name="hod" required>
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
$dept = $_POST['dept'];
$hod = $_POST['hod'];
$sql = mysqli_query($conn, "INSERT INTO department (dept_name, hod) VALUES ('$dept', '$hod')");
if($sql){
echo "<script>alert('Department Successfully Added');</script>"; 
echo "<script>window.location='dept.php';</script>";  
}else{
  echo "<script>alert('Error!!! Unable to Add New Department ');</script>";  
}
}


?>

          </div>



  </div>



</section>



<?php include ('footer.php');?>