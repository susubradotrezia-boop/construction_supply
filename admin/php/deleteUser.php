<?php
$user = $_GET['user'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username, $password, $dbname);

mysqli_query($dbconn, "DELETE FROM users WHERE id = '$user'");
?>