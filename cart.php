<?php
// Sibongile Nhlapo - ST10449136
// Tshifhiwa Austin Thamagane - ST10441732
// Website: Pastimes
// This page stores and displays selected clothing items using sessions.

session_start();
include "DBConn.php";

// Create cart if it doesn't exist
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

// Add item to cart
if (isset($_GET["add"])) {
    $_SESSION["cart"][] = $_GET["add"];
}

// Remove item
if (isset($_GET["remove"])) {
    $removeId = $_GET["remove"];
    $_SESSION["cart"] = array_diff($_SESSION["cart"], array($removeId));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart - Pastimes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
    <strong>Pastimes</strong>
    <div>
        <a href="index.php">Home</a>
        <a href="clothes.php">Shop</a>
        <a href="login.php">Login</a>
        <a href="admin.php">Admin</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<h1 class="shop-heading">Your Cart</h1>

<div class="product-grid">

<?php
$total = 0;

if (empty($_SESSION["cart"])) {
    echo "<p class='shop-heading'>Your cart is empty.</p>";
}

// Loop through cart items
foreach ($_SESSION["cart"] as $id) {
    $result = mysqli_query($conn, "SELECT * FROM tblClothes WHERE clothes_id=$id");
    $item = mysqli_fetch_assoc($result);

    if ($item) {
        $total += $item["price"];
?>

        <div class="product">
            <img src="images/<?php echo $item['image']; ?>">

            <h3><?php echo $item["item_name"]; ?></h3>
            <p><strong>R<?php echo $item["price"]; ?></strong></p>

            <a href="cart.php?remove=<?php echo $item['clothes_id']; ?>">
                <button>Remove</button>
            </a>
        </div>

<?php
    }
}
?>

</div>

<h2 style="text-align:center;">Total: R<?php echo $total; ?></h2>
<div style="text-align:center; margin-bottom:50px;">
    <a href="clothes.php">
        <button>Continue Shopping</button>
    </a>
</div>

</body>
</html>
