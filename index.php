<?php 
session_start();
include ('head.php'); ?>

</header><!--/#home-->
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">

<div class="col-lg-8">
<div id="carousel-example" class="carousel slide" data-ride="carousel">
          <!-- Carousel Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example" data-slide-to="1"></li>
            <li data-target="#carousel-example" data-slide-to="2"></li>
            <li data-target="#carousel-example" data-slide-to="3"></li>
            <li data-target="#carousel-example" data-slide-to="5"></li>
          </ol>
          <!-- End Carousel Indicators -->
          <!-- Carousel Images -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="images/slider/slide1.jpg">
            </div>
            <div class="item">
              <img src="images/slider/slide2.jpg">
            </div>
            <div class="item">
              <img src="images/slider/slide3.jpg">
            </div>
            <div class="item">
              <img src="images/slider/slide4.jpg">
            </div>
            <div class="item">
              <img src="images/slider/slide5.jpg">
            </div>
          </div>
          <!-- End Carousel Images -->
          <!-- Carousel Controls -->
          <a class="left carousel-control" href="#carousel-example" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
          <!-- End Carousel Controls -->
        </div>
        <!-- End Carousel Slideshow -->

</div>
	<div class="col-lg-4">
					<div class="clearfix">
					<div class="desc">
				<form class="form-horizontal" method="post" >
    <div class="form-group">
    <label class="control-label col-lg-4" for="email">Email:</label>
    <div class="col-lg-8">
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-lg-4" for="pwd">Password:</label>
    <div class="col-lg-8">
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-lg-8">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-lg-8">
      <button name="submit" type="submit" class="btn btn-info">Submit</button>
      <button type="reset" class="btn btn-warning">Clear</button>
    </div>
    </div>
</form>	
<?php 
include('dbcon.php');
if(isset($_POST['submit'])){
$email=$_POST['email'];
$password=$_POST['password'];

$result = mysqli_query($conn, "SELECT * FROM user WHERE username='$email' and password='$password'");

if (mysqli_num_rows($result) > 0){
//Name variable
while($row = mysqli_fetch_assoc($result))
{
   $username = $row["username"];
   $userid = $row["id"];
   $level = $row["type"];

} 
// Register $myusername, $mypassword and redirect to file "login_success.php"
// Start the session

// Set session variables
$_SESSION["email"] = $username;
$_SESSION["password"] = $password;
//echo "Session variables are set.";
if($level == 'admin'){
echo "<script>window.location='admin.php';</script>";
//header("location:home.php");
}elseif($level == 'Student' ){
echo "<script>window.location='studenttimetable.php';</script>";
  
}elseif($level == 'staff' ){
echo "<script>window.location='stafftimetable.php';</script>";
  
}
}
else {
echo '<font color="red"><b>Error!!!</b> Wrong Username or Password</font>';
}
}



?>

</div>
</div>
</div>
</div>
</div>
</section>



<?php include ('footer.php');?>