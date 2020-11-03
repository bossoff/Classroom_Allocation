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
    <li class="active"><a data-toggle="tab" href="#list">Lecture Room List</a></li>
    <li><a data-toggle="tab" href="#add">Add New Lecture Room</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="list" class="tab-pane fade in active">
      <hr>
      <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Names</th>
                                  <th>Capacity</th>
                                  <th>Option</th>
                              </tr>
                              </thead>
                              <tbody>
                              
                              
 <?php
 $k = 1;
 $sql = mysqli_query($conn, "select * from classroom");
 if (mysqli_num_rows($sql) > 0){
while ($row = mysqli_fetch_assoc($sql)){
?>
<tr>
<td><?php echo $k++;   ?></td>
<td><?php echo $row['name'];  ?></td>
<td><?php echo $row['capacity'];  ?></td>
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
        <label class="control-label col-lg-2" for="cname">Class Name</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="cname" name="cname" required>
            </div>
            </div>
            <div class="form-group">
        <label class="control-label col-lg-2" for="cpty">Capacity</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="cpty" name="capacity" required>
          </div>
          </div>
 <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button name="submit" type="submit" class="btn btn-info">Submit</button>
<button type="clear" class="btn btn-warning">Clear</button>
    </div>
  </div>                  
          
          </div>
        </div>
      </form>
    </div>
<?php
if(isset($_POST['submit'])){
$cname = $_POST['cname'];
$capacity = $_POST['capacity']; 
$sql = mysqli_query($conn, "INSERT INTO classroom (name, capacity) VALUES ('$cname', '$capacity')");
if($sql){
echo "<script>alert('Class Room Successfully Added');</script>";  
echo "<script>window.location='class.php';</script>"; 
}else{
  echo "<script>alert('Error!!! Unable to Add New Class Room');</script>";  
}
}


?>

  </div>

  </div>



</section>



<?php include ('footer.php');?>