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
    <li class="active"><a data-toggle="tab" href="#list">Class Level List</a></li>
    <li><a data-toggle="tab" href="#add">Add New Class Level</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="list" class="tab-pane fade in active">
      <hr>
      <table class="table table-bordered table-striped table-condensed">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Names</th>
                                  <th>Level</th>
                                  <th>Category</th>
                                  <th>Option</th>
                              </tr>
                              </thead>
                              <tbody>
<?php
$m = 1;
$sql = mysqli_query($conn, "select * from class");
 if (mysqli_num_rows($sql) > 0){
while ($row = mysqli_fetch_assoc($sql)){
?>                              
<tr>
<td><?php echo $m++; ?></td>
<td><?php echo $row['name'];?></td>
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
        <label class="control-label col-lg-2" for="cname">Class Name</label>
          <div class="col-lg-4">
            <input type="text" class="form-control" id="cname" name="cname">
            </div>
            </div>
<div class="form-group">
<label class="control-label col-lg-2" for="lev">Level</label>
          <div class="col-lg-4" >
<select class="form-control" id="lev" name="level" >
<option>Select</option>
<option value="100">100</option>
<option value="200">200</option>
<option value="300">300</option>
<option value="400">400</option>
<option value="500">500</option>
<option value="600">600</option>
</select>
</div>
</div>

<div class="form-group">
<label class="control-label col-lg-2">Category</label>
          <div class="col-lg-4">
<select class="form-control" name="cat">
<option>Select</option>
<option value="ND">ND</option>
<option value="HND">HND</option>
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
$cname = $_POST['cname'];
$level = $_POST['level'];
$cat = $_POST['cat']; 
$sql = mysqli_query($conn, "INSERT INTO class (name, level, category) VALUES ('$cname', '$level', '$cat')");
if($sql){
echo "<script>alert('Class Successfully Added');</script>"; 
echo "<script>window.location='level.php';</script>";  
}else{
  echo "<script>alert('Error!!! Unable to Add New Class ');</script>";  
}
}


?>

          </div>



  </div>



</section>



<?php include ('footer.php');?>