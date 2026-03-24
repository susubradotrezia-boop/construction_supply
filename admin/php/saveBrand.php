<?php
$brand_name = "";
$brand_name = $_GET['brand_name'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username,$password,$dbname);

$save = mysqli_query($dbconn, "INSERT INTO brands (brand_name) VALUES ('$brand_name')");
?>