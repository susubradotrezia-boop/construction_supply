<?php
$user ="";
$user = $_GET['user'];
$lname = "";
$lname = $_GET['lastname'];
$fname = "";
$fname = $_GET['firstname'];
$mname = "";
$mname = $_GET['middlename'];
$gender = "";
$gender = $_GET['gender'];
$cstatus = "";
$cstatus = $_GET['civilstatus'];
$role = "";
$role = $_GET['role'];
$astatus = "";
$astatus = $_GET['accountstatus'];
$uname = "";
$uname = $_GET['username'];
$pword = "";
$pword = $_GET['password'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username,$password,$dbname);

$save = mysqli_query($dbconn, "UPDATE users SET lname = '$lname', fname = '$fname', mname = '$mname', gender = '$gender', cstatus = '$cstatus', role = '$role', astatus = '$astatus', username = '$uname', password = '$pword' WHERE id = '$user'");
echo($user); 
?>