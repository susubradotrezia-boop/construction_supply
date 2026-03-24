<?php
$category_name = "";
$category_name = $_GET['category_name'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username,$password,$dbname);

$save = mysqli_query($dbconn, "INSERT INTO category (category_name) VALUES ('$category_name')");
?>