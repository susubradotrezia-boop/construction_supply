<div class="table-header-controls cashier-header-controls">
    <button onclick="clearSale();">Clear Sale</button>
</div>

<div class="pos-layout">
    <div class="pos-left">
        <div class="pos-card">
            <h3>Products</h3>
            <input type="text" id="search_product" placeholder="Search product..." onkeyup="filterProducts();">

            <div class="products-scroll">
                <table id="posProductsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Unit</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("../../connection/connection.php");
                            $dbconn = mysqli_connect($host, $username, $password, $dbname);
                            $loadproducts = mysqli_query($dbconn, "SELECT * FROM c_products WHERE stock_quantity > 0");
                            $counter = 0;
                            while ($res = mysqli_fetch_array($loadproducts)) {
                                $counter++;
                        ?>
                        <tr>
                            <td><?php echo($counter); ?></td>
                            <td><?php echo($res['product_name']); ?></td>
                            <td>₱<?php echo(number_format($res['price'], 2)); ?></td>
                            <td><?php echo($res['unit']); ?></td>
                            <td><?php echo($res['stock_quantity']); ?></td>
                            <td>
                                <button onclick="addToCart('<?php echo($res['product_id']); ?>','<?php echo htmlspecialchars($res['product_name'], ENT_QUOTES); ?>','<?php echo($res['price']); ?>','<?php echo($res['unit']); ?>','<?php echo($res['stock_quantity']); ?>')">Add</button>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="pos-right">
        <div class="pos-card">
            <h3>Checkout</h3>

            <input type="text" id="customer_name" placeholder="Enter Customer Name"> <br><br>

            <div class="checkout-scroll">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="cartTableBody">
                        <tr>
                            <td colspan="5">No items in cart.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <br>

            <input type="text" id="total_amount" placeholder="Total Amount" readonly> <br><br>
            <input type="number" id="cash_amount" placeholder="Enter Cash Amount" onkeyup="computeChange();" onchange="computeChange();"> <br><br>
            <input type="text" id="change_amount" placeholder="Change Amount" readonly> <br><br>

            <button class="checkout-btn" onclick="checkoutSale();">Checkout</button> <button class="cancel-btn" onclick="clearSale();">Cancel</button>
        </div>
    </div>
</div>