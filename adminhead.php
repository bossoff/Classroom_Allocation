<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>TimeTable Schedulling System</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet"> 
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">

  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/favicon.ico">
<style type="text/css">
.form-control{
border-color:#06C; border-radius:10px;	
}

</style>


</head><!--/head-->

<body>

  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->

    </div><!--/#home-slider-->
    <div class="main-nav" style="background-color:#060">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="adminhome.php">
            <img src="images/kp.png" class="img-responsiv" width="60px" height="60px">
          </a>                    
          -->
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><a href="adminhome.php">Home</a></li>
            <li class="scroll"><a href="dept.php">Dept</a></li> 
            <li class="scroll"><a href="staff.php">Staff</a></li> 
            <li class="scroll"><a href="student.php">Student</a></li> 
            <li class="scroll"><a href="course.php">Course</a></li>                     
            <li class="scroll"><a href="level.php">Level</a></li>                     
            <li class="scroll"><a href="examinationhall.php">Lecture Room</a></li>                     
            <li class="scroll"><a href="schedule.php">Schedule Timetable</a></li>                     
            <li class="scroll"><a href="examtimetable.php">View Timetable</a></li>                     
            <li class="scroll"><a href="logout.php">Logout</a></li>  
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  <?php
if(!isset($_SESSION['email'])){
  echo "<script>window.location='index.php';</script>"; 
}

  ?>