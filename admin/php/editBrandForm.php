<?php
$brand = "";
$brand = $_GET['brand'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username,$password,$dbname);


$loadbrands = mysqli_query($dbconn, "SELECT * FROM brands WHERE brand_id = '$brand'");
$counter = 0;

$brand_name = "";
while ($res = mysqli_fetch_array($loadbrands)) {
    $brand_name = $res['brand_name'];
}
?>

<main class="user-form">
    <h2>Edit Brand Form</h2>
    <h4>Brands</h4>
    <input type="text" name="" id="brand_name" placeholder="Enter Brand" value="<?php echo($brand_name); ?>"> <br><br>
    <button type ="button" id="<?php echo($brand); ?>" onclick="saveBrandChanges(this.id);">Save Changes</button> <button onclick="brandList();">Cancel</button>
</main>