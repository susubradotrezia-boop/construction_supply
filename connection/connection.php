<?php
$host = "caboose.proxy.rlwy.net";
$port = 8080; // or your Railway port (check dashboard)
$username = "root";
$password = "KaqrNecbQPBBPEutuDAeOHirSxcygGWx";
$dbname = "railway";

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname, $port);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>