<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "timetable";
$conn = new mysqli($host, $user, $password, $dbname);
if(!$conn){
die('Unable To Connect To DataBase'. mysqli_connect_error());	
	
}
//$conn = mysql_connect($host, $user, $password);
//mysql_select_db($conn, "shedule");



?>