<?php

// Displays clothing grouped into Men and Women.

include "DBConn.php";

$men = mysqli_query($conn, "SELECT * FROM tblClothes WHERE category='Men'");
$women = mysqli_query($conn, "SELECT * FROM tblClothes WHERE category='Women'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shop - Pastimes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
    <strong>Pastimes</strong>
    <div>
        <a href="index.php">Home</a>
        <a href="clothes.php">Shop</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="admin.php">Admin</a>
        <a href="cart.php">Cart</a>
    </div>
</div>

<!-- MEN -->
<h1 class="shop-heading">Men Collection</h1>
<div class="product-grid">
<?php while ($row = mysqli_fetch_assoc($men)) { ?>
    <div class="product">
        <img src="images/<?php echo $row['image']; ?>" alt="Clothing Image">
        <h3><?php echo $row["item_name"]; ?></h3>
        <p>Category: <?php echo $row["category"]; ?></p>
        <p><strong><?php echo $row["price"]; ?></strong></p>

        <a href="cart.php?add=<?php echo $row['clothes_id']; ?>">
            <button>Add To Cart</button>
        </a>
    </div>
<?php } ?>
</div>

<!-- WOMEN -->
<h1 class="shop-heading">Women Collection</h1>
<div class="product-grid">
<?php while ($row = mysqli_fetch_assoc($women)) { ?>
    <div class="product">
        <img src="images/<?php echo $row['image']; ?>" alt="Clothing Image">
        <h3><?php echo $row["item_name"]; ?></h3>
        <p>Category:<?php echo $row["category"]; ?></p>
        <p><strong><?php echo $row["price"]; ?></strong></p>

        <a href="cart.php?add=<?php echo $row['clothes_id']; ?>">
            <button>Add To Cart</button>
        </a>
    </div>
<?php } ?>
</div>

</body>
</html>