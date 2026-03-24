<?php
$product_name = "";
$product_name = $_GET['product_name'];
$category_id = "";
$category_id = $_GET['category_id'];
$brand_id = "";
$brand_id = $_GET['brand_id'];
$unit = "";
$unit = $_GET['unit'];
$price = "";
$price = $_GET['price'];
$stock_quantity = "";
$stock_quantity = $_GET['stock_quantity'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username,$password,$dbname);

$save = mysqli_query($dbconn, "INSERT INTO products (product_name, category_id, brand_id, unit, price, stock_quantity) VALUES ('$product_name', '$category_id', '$brand_id', '$unit', '$price', '$stock_quantity')");
?>