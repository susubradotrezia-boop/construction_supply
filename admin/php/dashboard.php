<?php
 date_default_timezone_set('Asia/Manila');

 include("../../connection/connection.php");
 $dbconn = mysqli_connect($host, $username, $password, $dbname);     

 $today = date("Y-m-d");
 $todayDisplay = date("n/j/Y");
 $thismonth = date("Y-m");
 $thisyear = date("Y");     

 $dailySales = 0;
 $monthlySales = 0;
 $yearlySales = 0;

 $getDaily = mysqli_query($dbconn, "SELECT IFNULL(SUM(total_amount),0) as total  FROM sales WHERE DATE(created_at) = '$today'");
    if ($row = mysqli_fetch_array($getDaily)) {
        $dailySales = $row['total'];
    }

 $getMonthly = mysqli_query($dbconn, "SELECT IFNULL(SUM(total_amount),0) as total FROM sales WHERE DATE_FORMAT(created_at, '%Y-%m') = '$thismonth'");
    if ($row = mysqli_fetch_array($getMonthly)) {
        $monthlySales = $row['total'];
    }     

 $getYearly = mysqli_query($dbconn, "SELECT IFNULL(SUM(total_amount),0) as total FROM sales WHERE YEAR(created_at) = '$thisyear'");
    if ($row = mysqli_fetch_array($getYearly)) {
        $yearlySales = $row['total'];
    }
?>

<div class="table-header-controls">
    <h2>ADMIN DASHBOARD</h2>
</div>

<h2>Sales Report</h2>
<div class="cards sales-cards">
    <div class="card blue sales-card" onclick="openSalesReport('daily');">
        <h3>Daily</h3>
        <p>₱<?php echo number_format($dailySales, 2); ?></p>
    </div>
    <div class="card green sales-card" onclick="openSalesReport('monthly');">
        <h3>Monthly</h3>
        <p>₱<?php echo number_format($monthlySales, 2); ?></p>
    </div>
    <div class="card purple sales-card" onclick="openSalesReport('yearly');">
        <h3>Yearly</h3>
        <p>₱<?php echo number_format($yearlySales, 2); ?></p>
    </div>
</div>

<br><br>

<h2>Top Selling Products (Today: <?php echo $todayDisplay; ?>)</h2>

<div class="top-products-scroll">
    <table>
        <thead>
            <tr>
                <th>Rank</th>
                <th>Product</th>
                <th>Quantity Sold</th>
                <th>Total Sales</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $top = mysqli_query($dbconn, "SELECT p.product_name, p.unit, SUM(si.quantity) as total_qty, SUM(si.subtotal) as total_sales FROM sales_items si INNER JOIN products p ON si.product_id = p.product_id INNER JOIN sales s ON si.sale_id = s.sale_id WHERE DATE(s.created_at) = '$today' GROUP BY si.product_id, p.product_name, p.unit ORDER BY total_qty DESC LIMIT 20");
            $rank = 0;

            if (mysqli_num_rows($top) > 0) {
                while ($res = mysqli_fetch_array($top)) {
                    $rank++;
            ?>
            <tr>
                <td><?php echo $rank; ?></td>
                <td><?php echo $res['product_name']; ?> (<?php echo $res['unit']; ?>)</td>
                <td><?php echo $res['total_qty']; ?></td>
                <td>₱<?php echo number_format($res['total_sales'], 2); ?></td>
            </tr>
            <?php
                }
            } else {
            ?>
            <tr>
                <td colspan="4">No sales today.</td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<div id="salesReportModal" class="sales-modal">
    <div class="sales-modal-content">
        <div class="sales-modal-header">
            <h2 id="salesModalTitle">Sales Details</h2>
            <span class="sales-close-btn" onclick="closeSalesReport();">&times;</span>
        </div>
        <div id="salesModalBody" class="sales-modal-body">
            Loading...
        </div>
    </div>
</div>