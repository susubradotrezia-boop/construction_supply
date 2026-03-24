<?php
$categ = "";
$categ = $_GET['categ'];

include("../../connection/connection.php");
$dbconn = mysqli_connect($host, $username,$password,$dbname);


$loadcategory = mysqli_query($dbconn, "SELECT * FROM category WHERE category_id = '$categ'");
$counter = 0;

$category_name = "";
while ($res = mysqli_fetch_array($loadcategory)) {
    $category_name = $res['category_name'];
}
?>

<main class="user-form">
    <h2>Edit Category Form</h2>
    <h4>Categories</h4>
    <input type="text" name="" id="category_name" placeholder="Enter Category" value="<?php echo($category_name); ?>"> <br><br>
    <button type ="button" id="<?php echo($categ); ?>" onclick="saveCategoryChanges(this.id);">Save Changes</button> <button onclick="category();">Cancel</button>
</main>