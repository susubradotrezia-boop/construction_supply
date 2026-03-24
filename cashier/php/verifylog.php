<?php
session_start();
if (!empty($_SESSION['loguser'])) {
    if (!isset($_SESSION['role'])) {
        echo("0");
        exit();
    }
    if ($_SESSION['role'] != "Cashier") {
        echo("0");
        exit();
    }
    echo("1");
} else {
    echo("0");
}
?>