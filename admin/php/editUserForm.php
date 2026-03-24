<?php
$user = "";
$user = $_GET['user'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username,$password,$dbname);


$loadusers = mysqli_query($dbconn, "SELECT * FROM users WHERE id = '$user'");
$counter = 0;

$lname = "";
$fname = "";
$mname = "";
$gender = "";
$cstatus = "";
$address = "";
$role = "";
$astatus = "";
$username = "";
$password = "";
while ($res = mysqli_fetch_array($loadusers)) {
    $lname = $res['lname'];
    $fname = $res['fname'];
    $mname = $res['mname'];
    $gender = $res['gender'];
    $cstatus= $res['cstatus'];
    $address = $res['address'];
    $role = $res['role'];
    $astatus = $res['astatus'];
    $username = $res['username'];
    $password = $res['password'];
}
?>

<main class="user-form">
    <h2>Edit User Form</h2>
    <h4>Personal Information</h4>
    <input type="text" name="" id="lname" placeholder="Enter Lastname" value="<?php echo($lname); ?>"> <br><br>
    <input type="text" name="" id="fname" placeholder="Enter Firstname" value="<?php echo($fname); ?>"> <br><br>
    <input type="text" name="" id="mname" placeholder="Enter Middlename" value="<?php echo($mname); ?>"> <br><br>
    <select name="" id="gender">
        <option value="0">Select Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select> <br><br>
    <select name="" id="cstatus">
        <option value="0">Select Civil Status</option>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
    </select> <br><br>
    <select name="" id="role">
       <option value="0">Select Role</option>
       <option value="Admin">Admin</option>
       <option value="Cashier">Cashier</option>
    </select> <br><br>
    <select name="" id="astatus">
        <option value="0">Select Account Status</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
    </select> <br><br>
    <input type="text" name="" id="address" placeholder="Enter Complete Address" value="<?php echo($address); ?>"> <br><br>
    <h4>User Account</h4>
    <input type="text" name="" id="username" placeholder="Enter Username" value="<?php echo($username); ?>"> <br><br>
    <input type="password" name="" id="password" placeholder="Enter Password" value="<?php echo($password); ?>"> <br><br>
    <button type ="button" id="<?php echo($user); ?>" onclick="saveUserChanges(this.id);">Save Changes</button> <button onclick="usersList();">Cancel</button>
</main>