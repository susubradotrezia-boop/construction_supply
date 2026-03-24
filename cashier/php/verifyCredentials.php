<?php
$user = "";
$pass = "";
$role = "";
$user = $_GET['user'];
$pass = $_GET['pass'];
$role = $_GET['role'];

 include("../../connection/connection.php");
 $dbconn = mysqli_connect($host, $username,$password,$dbname);
 $loadCredentials = mysqli_query($dbconn, "SELECT * FROM users WHERE username = '$user' AND password = '$pass' AND role = '$role'");

$id = "";
$username = "";
$password = "";
$user_role = "";

while ($res = mysqli_fetch_array($loadCredentials)) {
    $id = $res['id'];
    $username = $res['username'];
    $password = $res['password'];
    $user_role = $res['role'];
}

if (($user === $username) && ($pass === $password)) {
    session_start();
    $_SESSION['loguser'] = $id;
    $_SESSION['role'] = $user_role;
    echo($id);
} else {
    echo("0");
} 
?>