<?php
session_start();
date_default_timezone_set('Asia/Manila');

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username, $password, $dbname);

$cashier_name = "";

if (!empty($_SESSION['loguser']) && !empty($_SESSION['role'])) {
    if ($_SESSION['role'] == "Cashier") {
        $id = $_SESSION['loguser'];
        $loadUser = mysqli_query($dbconn, "SELECT fname, lname FROM users WHERE id = '$id'");

        if ($res = mysqli_fetch_array($loadUser)) {
            $cashier_name = $res['fname'] . " " . $res['lname'];
        }
    }
}

$current_date_time = date("n/j/Y, g:i:s A");

echo "Cashier: " . $cashier_name . "<br>" . $current_date_time;
?>