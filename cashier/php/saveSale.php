<?php
date_default_timezone_set('Asia/Manila');

$customer_name = "";
$total_amount = "";
$cash_amount = "";
$change_amount = "";
$cart_data = "";

if (isset($_GET['customer_name'])) {
    $customer_name = $_GET['customer_name'];
}
if (isset($_GET['total_amount'])) {
    $total_amount = $_GET['total_amount'];
}
if (isset($_GET['cash_amount'])) {
    $cash_amount = $_GET['cash_amount'];
}
if (isset($_GET['change_amount'])) {
    $change_amount = $_GET['change_amount'];
}
if (isset($_GET['cart_data'])) {
    $cart_data = $_GET['cart_data'];
}

if ($customer_name == "" || $total_amount == "" || $cash_amount == "" || $change_amount == "" || $cart_data == "") {
    exit("Invalid request.");
}

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username, $password, $dbname);

if (!$dbconn) {
    exit("Database connection failed.");
}

$cart = json_decode($cart_data, true);

if (!$cart || count($cart) == 0) {
    exit("Cart is empty.");
}

mysqli_begin_transaction($dbconn);

try {
    $savesale = mysqli_query($dbconn, "INSERT INTO sales (customer_name, total_amount, cash_amount, change_amount, cashier_name) VALUES ('$customer_name', '$total_amount', '$cash_amount', '$change_amount', 'Cashier')");

    if (!$savesale) {
        throw new Exception(mysqli_error($dbconn));
    }

    $sale_id = mysqli_insert_id($dbconn);

    foreach ($cart as $item) {
        $product_id = $item['product_id'];
        $quantity = $item['quantity'];
        $price = $item['price'];
        $subtotal = $item['subtotal'];

        $checkproduct = mysqli_query($dbconn, "SELECT * FROM products WHERE product_id = '$product_id'");

        if (!$checkproduct || mysqli_num_rows($checkproduct) == 0) {
            throw new Exception("Product not found.");
        }

        $product = mysqli_fetch_array($checkproduct);
        $current_stock = $product['stock_quantity'];

        if ((int)$quantity > (int)$current_stock) {
            throw new Exception("Insufficient stock for " . $product['product_name']);
        }

        $saveitem = mysqli_query($dbconn, "INSERT INTO sales_items (sale_id, product_id, quantity, price, subtotal) VALUES ('$sale_id', '$product_id', '$quantity', '$price', '$subtotal')");

        if (!$saveitem) {
            throw new Exception(mysqli_error($dbconn));
        }

        $new_stock = $current_stock - $quantity;

        $updatestock = mysqli_query($dbconn, "UPDATE products SET stock_quantity = '$new_stock' WHERE product_id = '$product_id'");

        if (!$updatestock) {
            throw new Exception(mysqli_error($dbconn));
        }
    }

         mysqli_commit($dbconn);
         echo "success";
}   
         catch (Exception $e) {
         mysqli_rollback($dbconn);
         echo $e->getMessage();
}
?>