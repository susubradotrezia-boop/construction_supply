<?php
$prod = $_GET['prod'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username, $password, $dbname);

mysqli_query($dbconn, "DELETE FROM products WHERE product_id = '$prod'");
?>