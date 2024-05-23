<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
        <a href="index.htm">Home</a>
        <a href="product.php">Product</a>
        </nav>
    </header>
    <?php 
        $db=mysqli_connect("localhost","root","","projet1");
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM product ";
        $result = mysqli_query($db, $sql);
        $Product = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if (isset($_GET["delete_Product"])) {
            $product_id = $_GET["delete_Product"];
            $sql = "DELETE FROM product WHERE ID=$product_id";
            $ret = mysqli_query($db, $sql);
            if ($ret) {
              header("Location: manageProducts.php");
              exit();
            }
        }
        if(isset($_POST['EditButton'])){
            $id = $_POST['editId'];
            $name = $_POST['editName'];
            $price = $_POST['editPrice'];
            $image = $_POST['editImage'];
            $query = "UPDATE `product` SET `Name`='$name',`Price`='$price',`Image`='$image' WHERE ID=$id";
            $result = mysqli_query($db, $query);
            if($result){
                header('location: manageProducts.php');
            } else {
                echo "La mise à jour du produit a échoué.";
            }
        } 
    ?>
    <a href="AddProduct.php">Add Product</a>
    <h1>Car Collection</h1>
    <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM product";
                    $result=mysqli_query($db, $sql);
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    ?>
                    <?php foreach ($products as $product) { ?>
                        <tr>
                        <td><?php echo $product['Name']?></td>
                        <td><img src="<?php echo $product['Image']?>" alt="<?php echo $product['Name']; ?>" width="100"></td>
                        <td><?php echo $product['Price']?></td>
                        <td>
                        <?php 
                            $delete_link = "?delete_Product=" . $product['ID'];  
                        ?>
                        <a href="<?php echo $delete_link ?>">Delete</a>
                        </td>
                        <td> 
                            <a href="editProduct.php?edit_Product=<?php echo $product['ID']; ?>">Modify</a>  
                        </td>
                <?php } ?>
            </tbody>
        </table>
</body>
</html>