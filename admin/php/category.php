            <div class="table-header-controls">
                <h2>Category List</h2>
                <button onclick="addCategory();">Add New Category</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                         include("../../connection/connection.php");
                         $dbconn = mysqli_connect($host, $username,$password,$dbname);
                         $loadcategory = mysqli_query($dbconn, "SELECT * FROM category");
                         $counter = 0;
                         while ($res = mysqli_fetch_array($loadcategory)) {
                             $counter++;
                         ?>
                         <tr>
                        <td><?php echo($counter); ?></td>
                        <td><?php echo($res['category_name']); ?></td>
                        <td><?php echo($res['created_at']); ?></td>
                        <td>
                            <button id="<?php echo($res['category_id']); ?>" onclick="editCategoryForm(this.id);">Edit</button>
                            <button class="delete-btn" onclick="deleteCategory(<?php echo($res['category_id']); ?>)">Delete</button>
                        </td>
                     </tr>
                     <?php
                }
                ?>
                </tbody>
            </table>