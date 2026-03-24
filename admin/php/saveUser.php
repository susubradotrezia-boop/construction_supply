<?php
$lname = "";
$lname = $_GET['lastname'];
$fname ="";
$fname = $_GET['firstname'];
$mname = "";
$mname = $_GET['middlename'];
$gender = "";
$gender = $_GET['gender'];
$cstatus = "";
$cstatus = $_GET['civilstatus'];
$address = "";
$address = $_GET['address'];
$role = "";
$role = $_GET['role'];
$astatus = "";
$astatus = $_GET['accountstatus'];
$usern = "";
$usern = $_GET['username'];
$pword = "";
$pword = $_GET['password'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username,$password,$dbname);

$save = mysqli_query($dbconn, "INSERT INTO users (lname, fname, mname, gender, cstatus, address, username, password, role, astatus) VALUES ('$lname', '$fname', '$mname', '$gender', '$cstatus', '$address', '$usern', '$pword', '$role', '$astatus')");
?>