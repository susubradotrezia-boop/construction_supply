            <div class="table-header-controls">
                <h2>Product List</h2>
                <button onclick="addProduct();">Add New Product</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Stock Quantity</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                         include("../../connection/connection.php");
                         $dbconn = mysqli_connect($host, $username,$password,$dbname);
                         $loadproducts = mysqli_query($dbconn, "SELECT * FROM c_products");
                         $counter = 0;
                         while ($res = mysqli_fetch_array($loadproducts)) {
                             $counter++;
                         ?>
                         <tr>
                        <td><?php echo($counter); ?></td>
                        <td><?php echo($res['product_name']); ?></td>
                        <td><?php echo($res['category_name']); ?></td>
                        <td><?php echo($res['brand_name']); ?></td>
                        <td><?php echo($res['unit']); ?></td>
                        <td>₱<?php echo number_format($res['price'], 2); ?></td>
                        <td><?php echo($res['stock_quantity']); ?></td>
                        <td><?php echo($res['created_at']); ?></td>
                        <td>
                            <button id="<?php echo($res['product_id']); ?>" onclick="editProductsForm(this.id);">Edit</button>
                            <button class="delete-btn" onclick="deleteProduct(<?php echo($res['product_id']); ?>)">Delete</button>
                        </td>
                     </tr>
                     <?php
                }
                ?>
                </tbody>
            </table>