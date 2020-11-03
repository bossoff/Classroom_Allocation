<?php
$class_id = $_GET['class_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "timetable";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$status = "No";
//echo '<script>alert("jgjdfdf");</script>';

$sections = mysqli_query($conn, "SELECT * FROM course WHERE depid = '$class_id'") or die(mysqli_error($conn));

echo '<option value="">Select Course</option>';
while($row = mysqli_fetch_assoc($sections)) {
	echo '<option value="' .$row['id'].'">' . $row['course_code'] .' '.$row['course_tittle'].'</option>';
}





?>