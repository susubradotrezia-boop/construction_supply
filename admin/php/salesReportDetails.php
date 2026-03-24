<?php
date_default_timezone_set('Asia/Manila');

$period = "";
$color = "";

if (isset($_GET['period'])) {
    $period = $_GET['period'];
}
if (isset($_GET['color'])) {
    $color = $_GET['color'];
}

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username, $password, $dbname);

$condition = "";

if ($period == "daily") {
    $today = date("Y-m-d");
    $condition = "WHERE DATE(s.created_at) = '$today'";
} else if ($period == "monthly") {
    $thismonth = date("Y-m");
    $condition = "WHERE DATE_FORMAT(s.created_at, '%Y-%m') = '$thismonth'";
} else if ($period == "yearly") {
    $thisyear = date("Y");
    $condition = "WHERE YEAR(s.created_at) = '$thisyear'";
}

$headerClass = "";
if ($color == "daily") {
    $headerClass = "blue-table";
} else if ($color == "monthly") {
    $headerClass = "green-table";
} else if ($color == "yearly") {
    $headerClass = "purple-table";
}

$loadsales = mysqli_query($dbconn, "SELECT s.created_at, p.product_name, p.unit, si.quantity, si.subtotal FROM sales s INNER JOIN sales_items si ON s.sale_id = si.sale_id INNER JOIN products p ON si.product_id = p.product_id $condition ORDER BY s.created_at DESC");
?>

<div class="sales-report-scroll">

<table>
    <thead class="<?php echo $headerClass; ?>">
        <tr>
            <th>Date</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($loadsales) > 0) {
            while ($res = mysqli_fetch_array($loadsales)) {
        ?>
        <tr>
            <td><?php echo($res['created_at']); ?></td>
            <td><?php echo($res['product_name']); ?> (<?php echo $res['unit']; ?>)</td>
            <td><?php echo($res['quantity']); ?></td>
            <td>₱<?php echo number_format($res['subtotal'], 2); ?></td>
        </tr>
        <?php
            }
        } else {
        ?>
        <tr>
            <td colspan="4">No sales found.</td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

</div>