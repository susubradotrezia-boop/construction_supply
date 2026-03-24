<?php
$categ = $_GET['categ'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username, $password, $dbname);

mysqli_query($dbconn, "DELETE FROM category WHERE category_id = '$categ'");
?>