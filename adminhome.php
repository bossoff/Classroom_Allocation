<?php include ('adminhead.php'); 
include ('dbcon.php'); 
?>
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">

<div class="col-lg-4">
      <hr>
<form class="form-horizontal" method="post">

<div class="form-group">
<label class="control-label col-lg-4">Select Department</label>
<div class="col-lg-6">
<select class="form-control" name="dept" id = "class_id" data-message-required="value_required">
                  <option>Select Department</option>
<?php
$sql = mysqli_query($conn, "SELECT * FROM department");
 if (mysqli_num_rows($sql) > 0){
while ($row = mysqli_fetch_assoc($sql)){
  
  echo '<option value="'.$row['id'].'">'.$row['dept_name'].'</option>';

}
}

?>


</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-4">Semester</label>
<div class="col-lg-6">
<select class="form-control" name="semester">
<option value="First Semester">First Semester</option>
<option value="Second Semester">Second Semester</option>
</select>
</div>
</div>
<div class="form-group">
<div class=" col-xs-offset-4  col-lg-6">
<button class="btn btn-primary btn-block" type="submit" name="submit">Search</button>
</div>
</div>      
</form>
</div>
<div class="col-lg-8">
      <?php
if(isset($_POST['submit'])){
$dept = $_POST['dept'];
$semester = $_POST['semester'];


      ?>
      <hr>
      <table class="table table-bordered  table-condensed"  >
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
<th>Option</th>
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
    $sql = mysqli_query($conn, "SELECT *  from schedule where edate = '$day' and period = '$period' and department = '$dept' and semester = '$semester' ") or die(mysqli_error($conn));
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
     <td><a href="edit.php?id=<?php echo $id; ?>">Edit</a></td>
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
$k++;
echo '</tr>';
}
echo '  </tbody></table>';

}else{
  echo "<h2>Please Select A department To Check There TimeTable</h2>";
}
?>                                                                    
  

    </div>

  </div>



</section>

<script type="text/javascript">

  function get_class_sections(class_id) {

      $.ajax({

            url: 'get_class_section.php?class_id='+ class_id ,
            success: function(response)
            {
            //  alert(response);
                jQuery('#section_selector_holder').html(response);
            }
        });

    }



function get_class_amount(section_selector_holder) {

      $.ajax({

            url: 'get_class_amount.php?section_selector_holder='+ section_selector_holder ,
            success: function(response)
            {
              //alert(response);
                jQuery('#amount').html(response);
            }
        });

    }

</script>


<?php include ('footer.php');?>