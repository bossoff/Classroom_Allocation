<?php include ('adminhead.php'); 
include ('dbcon.php'); 
?>
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">

<div class="col-lg-10">
    <hr>
 
<form class="form-horizontal" method="post">

<div class="form-group">
<label class="control-label col-lg-2">Department</label>
<div class="col-lg-4">
<select class="form-control" name="dept" id = "class_id" data-message-required="value_required"
                  onchange="return get_class_sections(this.value)" >
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
<label class="control-label col-lg-2">Course</label>
<div class="col-lg-4">
<select class="form-control" name="course" id="section_selector_holder" data-message-required="value_required">
<option value="">Select Department First</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-2">Lecturer Room</label>
<div class="col-lg-4">
<select class="form-control" name="hall">
<?php
$sql1 = mysqli_query($conn, "select * from classroom");
 if (mysqli_num_rows($sql1) > 0){
while ($row1 = mysqli_fetch_assoc($sql1)){
echo'<option value="'.$row1['id'] .'">'.$row1['name'].'</option>';


}}

?>
</select>
</div>
</div>

<div class="form-group">
<label class="control-label col-lg-2">Day</label>
<div class="col-lg-4">
<select class="form-control" name="dday">
<option value="1">Monday</option>
<option value="2">Tuesday</option>
<option value="3">Wedsday</option> 
<option value="4">Thursday</option> 
<option value="5">Friday</option> 
</select>
</div>
</div>


<div class="form-group">
<label class="control-label col-lg-2">Period</label>
<div class="col-lg-4">
<select class="form-control" name="period">
            <option value="1">08:00am - 10:00am </option>
            <option value="2">10:00AM - 12:00PM </option>
            <option value="3">12:00PM - 02:00PM</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-lg-2">Semester</label>
<div class="col-lg-4">
<select class="form-control" name="semester">
<option value="First Semester">First Semester</option>
<option value="Second Semester">Second Semester</option>
</select>
</div>
</div>

<div class="form-group">
<div class=" col-xs-offset-2  col-lg-4">
<button class="btn btn-info btn-block" type="submit" name="submit">Submit</button>
<button class="btn btn-warning btn-block" type="reset" >Clear</button>
</div>
</div>



</form>
<?php
if(isset($_POST['submit'])){
  $dept  = $_POST['dept'];
  $course  = $_POST['course'];
  $dday  = $_POST['dday'];
  $period  = $_POST['period'];
  $hall  = $_POST['hall'];
  $semester  = $_POST['semester'];





$sql1 = mysqli_query($conn, "SELECT * FROM schedule WHERE edate = '$dday' and period = '$period' and hallid = '$hall' ") or die(mysqli_error($conn));
 if (mysqli_num_rows($sql1) > 0){
echo "<script>alert('Error!!!Lecture Room Already Schedule For Another Class At This Moment');</script>"; 
}else{
$sql = mysqli_query($conn, "select * from course where id = '$course' ") or die(mysqli_error($conn));
 if (mysqli_num_rows($sql) > 0){
while ($row = mysqli_fetch_assoc($sql)){
$coursecode = $row['course_code'];
$coursetitle = $row['course_tittle'];
$courselevel = $row['level'];
$staffname = $row['staffname'];
$staffid = $row['staffid'];

}
}
$sql11 = mysqli_query($conn, "select * from classroom where id = '$hall' ") or die(mysqli_error($conn));
 if (mysqli_num_rows($sql11) > 0){
while ($row11 = mysqli_fetch_assoc($sql11)){
$hallname = $row11['name'];
}
}

$sql43 = mysqli_query($conn, "select * from class where level = '$courselevel'");
 if (mysqli_num_rows($sql43) > 0){
while ($row43 = mysqli_fetch_assoc($sql43)){
$classid = $row43['id'];
$classname = $row43['name'];
}
}

$result = mysqli_query($conn, "INSERT INTO schedule (courseid, coursecode, coursetitle, courselevel, hallid, hallname, period, edate, department, semester, staffid, staffname, classid, classname ) VALUES ('$course', '$coursecode', '$coursetitle', '$courselevel', '$hall', '$hallname', '$period', '$dday', '$dept', '$semester', '$staffid', '$staffname', '$classid', '$classname' )")or die(mysqli_error($conn));
echo "<script>alert('YOur Examination Schedule Was Successfully Set');</script>"; 
echo "<script>window.location='schedule.php';</script>"; 

}


}




?>



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