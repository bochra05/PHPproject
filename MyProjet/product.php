<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
        <a href="index.htm">Home</a>
        <a href="manageProducts.php">Manage Product</a>
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
        ?>
        <main>
        <h1>Product List</h1>
        <div class="image-card-container" id=product_card >
        <?php foreach ($Product as $Product) { ?>
	    <div class="image-card">
        <img src="<?php echo $Product['Image']?>">
		<div class="card-content">
			<p>Car <?php echo $Product['Name']?></p>
			<p class=hidden><?php echo $Product['Price']?> Dt</p>
		</div>
    </div>
    <?php } ?>
</body>
</html>