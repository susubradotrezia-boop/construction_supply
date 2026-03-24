<?php
$brand ="";
$brand = $_GET['brand'];
$brand_name ="";
$brand_name = $_GET['brand_name'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username,$password,$dbname);

$save = mysqli_query($dbconn, "UPDATE brands SET brand_name = '$brand_name' WHERE brand_id = '$brand'");
echo($brand); 
?>