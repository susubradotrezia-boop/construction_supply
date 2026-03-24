            <div class="table-header-controls">
                <h2>Users List</h2>
                <button onclick="userEntryForm();">Add New User</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Complete Name</th>
                        <th>Gender</th>
                        <th>Civil Status</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Account Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     <?php
                         include("../../connection/connection.php");
                         $dbconn = mysqli_connect($host, $username,$password,$dbname);
                         $loadusers = mysqli_query($dbconn, "SELECT * FROM users");
                         $counter = 0;
                         while ($res = mysqli_fetch_array($loadusers)) {
                             $counter++;
                         ?>
                         <tr>
                        <td><?php echo($counter); ?></td>
                        <td><?php echo($res['lname'].", ".$res['fname']."  ".$res['mname']); ?></td>
                        <td><?php echo($res['gender']); ?></td>
                        <td><?php echo($res['cstatus']); ?></td>
                        <td><?php echo($res['address']); ?></td>
                        <td><?php echo($res['role']); ?></td>
                        <td><?php echo($res['astatus']); ?></td>
                        <td>
                            <button id="<?php echo($res['id']); ?>" onclick="editUserForm(this.id);">Edit</button>
                            <button class="delete-btn" onclick="deleteUser(<?php echo($res['id']); ?>)">Delete</button>
                        </td>
                     </tr>
                     <?php
                }
                ?>
                </tbody>
            </table>