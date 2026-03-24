<?php
$prod ="";
$prod = $_GET['prod'];
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

$save = mysqli_query($dbconn, "UPDATE products SET product_name = '$product_name', category_id = '$category_id', brand_id = '$brand_id', unit = '$unit', price = '$price', stock_quantity = '$stock_quantity' WHERE product_id = '$prod'");
echo($prod); 
?>