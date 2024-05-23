<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Product</title>
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
            $db=mysqli_connect("localhost","root","","projet1");
            if(!$db){
                die("Connection failed!" . mysqli_connect_error());
            }
            $sql = "SELECT * FROM `product`";
            $result = mysqli_query($db, $sql);

            if (!$result) {
                die("Error retrieving data: " . mysqli_error($db)); 
            }
            $product = mysqli_fetch_all($result, MYSQLI_ASSOC);   
            if(isset($_POST["add_Product"])){
                $name=$_POST['nom'];
                $price=$_POST['prix'];
                $img=$_POST['image'];
                $sql = "INSERT INTO `product`(`Name`, `Price`, `Image`) VALUES ('$name','$price','$img')";
                $ret = mysqli_query($db, $sql);
                if($ret) {
                    header('location: manageProducts.php');
                    exit();
                } else {
                    echo "Error: " . mysqli_error($db);
                }
            } 
        ?>
        <main>
        <form method="POST" id="idform">
            <input type="text" placeholder="Product Name" id="nom" name="nom"><br>
            <input type="number" placeholder="Product Price" id="prix" name="prix"><br>
            <input type="text" placeholder="Product Image" id="image" name="image"><br>
            <p><a href="manageProducts.php">Return to Products</a></p>
            <p id=Error_msg_Product></p>
            <input class=btn type="submit" value="Add Product" name="add_Product"><br>
        </form>
    </body>
</html>