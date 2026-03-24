            <div class="table-header-controls">
                <h2>Brands List</h2>
                <button onclick="addBrand();">Add New Brand</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Brand Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                         include("../../connection/connection.php");
                         $dbconn = mysqli_connect($host, $username,$password,$dbname);
                         $loadbrands = mysqli_query($dbconn, "SELECT * FROM brands");
                         $counter = 0;
                         while ($res = mysqli_fetch_array($loadbrands)) {
                             $counter++;
                         ?>
                         <tr>
                        <td><?php echo($counter); ?></td>
                        <td><?php echo($res['brand_name']); ?></td>
                        <td><?php echo($res['created_at']); ?></td>
                        <td>
                            <button id="<?php echo($res['brand_id']); ?>" onclick="editBrandForm(this.id);">Edit</button>
                            <button class="delete-btn" onclick="deleteBrand(<?php echo($res['brand_id']); ?>)">Delete</button>
                        </td>
                     </tr>
                     <?php
                }
                ?>
                </tbody>
            </table>