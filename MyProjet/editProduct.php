<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
        <a href="index.htm">Home</a>
        <a href="product.php">Product</a>
        <a href="manageProducts.php">Manage Product</a>
        </nav>
    </header>
    <?php
        $db = mysqli_connect("localhost", "root", "", "projet1");
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if(isset($_GET['edit_Product'])){
            $id = $_GET['edit_Product'];
            $query = "SELECT `ID`, `Name`, `Price`, `Image` FROM `product` WHERE `ID`=$id";
            $result = mysqli_query($db, $query);
            if($result){
                $product = mysqli_fetch_assoc($result);
                $name = $product['Name'];
                $price = $product['Price'];
                $image = $product['Image'];
                }
            }
        ?>
        <h1>Edit Product</h1>
        <form method="POST" action="manageProducts.php" id="idform">
            <input class="input" type="hidden" id="editId" name="editId" value="<?php echo $id ?>"><br>
            <input type="text" id="editName" name="editName" placeholder="Product Name"><br>
            <input type="text" id="editPrice" name="editPrice" placeholder="Product Price"><br>
            <input type="text" id="editImage" name="editImage" placeholder="Product Image"><br>
            <p><a href="manageProducts.php">Return to Products</a></p>
            <p id=Error_msg_Edit></p>
            <input class="btn" type="submit" value="Edit Product" id="EditButton" name="EditButton"><br>
        </form>
</body>
</html>