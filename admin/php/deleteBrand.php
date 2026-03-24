<?php
$brand = $_GET['brand'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username, $password, $dbname);

mysqli_query($dbconn, "DELETE FROM brands WHERE brand_id = '$brand'");
?>