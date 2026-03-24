<?php
$prod = "";
$prod = $_GET['prod'];


include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username,$password,$dbname);

$loadproducts = mysqli_query($dbconn, "SELECT * FROM products WHERE product_id = '$prod'");
$counter = 0;

$product_name = "";
$category_id = "";
$brand_id = "";
$unit = "";
$price = "";
$stock_quantity = "";
while ($res = mysqli_fetch_array($loadproducts)) {
    $product_name = $res['product_name'];
    $category_id = $res['category_id'];
    $brand_id = $res['brand_id'];
    $unit = $res['unit'];
    $price = $res['price'];
    $stock_quantity = $res['stock_quantity'];
}
?>

<main class="user-form">
    <h2>Edit Product Form</h2>
    <h4>Products</h4>
    <input type="text" name="" id="product_name" placeholder="Enter Productname" value="<?php echo($product_name); ?>"> <br><br>

    <select name="" id="category_id" value="<?php echo($category_id); ?>">
    <option value="0">Select Category</option>
    <?php
        include("../../connection/connection.php");
        $dbconn = mysqli_connect($host, $username,$password,$dbname);
        $loadcategory = mysqli_query($dbconn, "SELECT * FROM category");
        while ($res = mysqli_fetch_array($loadcategory)) {
    ?>
        <option value="<?php echo($res['category_id']); ?>"><?php echo($res['category_name']); ?></option>
    <?php
        }
    ?>
    </select> <br><br>

    <select name="" id="brand_id" value="<?php echo($brand_id); ?>">
    <option value="0">Select Brand</option>
    <?php
        $loadbrands = mysqli_query($dbconn, "SELECT * FROM brands");
        while ($res = mysqli_fetch_array($loadbrands)) {
    ?>
        <option value="<?php echo($res['brand_id']); ?>"><?php echo($res['brand_name']); ?></option>
    <?php
        }
    ?>
    </select> <br><br>
    <input type="text" name="" id="price" placeholder="Enter Price" value="<?php echo($price); ?>"> <br><br>
    <input type="text" name="" id="stock_quantity" placeholder="Enter Stock Quantity" value="<?php echo($stock_quantity); ?>"> <br><br>
    <select name="" id="unit">
        <option value="0">Select Unit</option>
        <option value="pcs">pcs</option>
        <option value="kg">kg</option>
        <option value="g">g</option>
        <option value="bag">bag</option>
        <option value="box">box</option>
        <option value="set">set</option>
        <option value="mm">mm</option>
        <option value="cm">cm</option>
        <option value="m">m</option>
        <option value="ft">ft</option>
        <option value="inch">inch</option>
        <option value="ton">ton</option>
        <option value="lb">lb</option>
        <option value="m3">m3</option>
        <option value="cu.ft">cu.ft</option>
        <option value="liter">liter</option>
        <option value="gallon">gallon</option>
        <option value="sack">sack</option>
        <option value="pack">pack</option>
        <option value="bundle">bundle</option>
        <option value="roll">roll</option>
        <option value="drum">drum</option>
        <option value="board foot">board foot</option>
        <option value="sheet">sheet</option>
        <option value="length">length</option>
    </select> <br><br>
    <button type ="button" id="<?php echo($prod); ?>" onclick="saveProductsChanges(this.id);">Save Changes</button> <button onclick="product();">Cancel</button>
</main>