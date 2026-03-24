<?php
$categ ="";
$categ = $_GET['categ'];
$category_name ="";
$category_name = $_GET['category_name'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username,$password,$dbname);

$save = mysqli_query($dbconn, "UPDATE category SET category_name = '$category_name' WHERE category_id = '$categ'");
echo($categ); 
?>