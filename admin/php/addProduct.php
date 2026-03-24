<main class="user-form">
    <h2>Add Product Form</h2>
    <h4>Products</h4>
    <input type="text" name="" id="product_name" placeholder="Enter Productname"> <br><br>

    <select name="" id="category_id">
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

    <select name="" id="brand_id">
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
    <input type="text" name="" id="price" placeholder="Enter Price"> <br><br>
    <input type="text" name="" id="stock_quantity" placeholder="Enter Stock Quantity"> <br><br>
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
    <button onclick="saveProducts();">Submit</button> <button onclick="product();">Cancel</button>
</main>