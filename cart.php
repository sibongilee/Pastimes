<?php
// Website: Pastimes
// This page stores and displays selected clothing items using sessions.

session_start();
include "DBConn.php";

// Create cart if it doesn't exist
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}

// Add item to cart
if(isset($_GET["add"])){
    $id = (int)$_GET["add"];
    if(isset($_SESSION["cart"][$id])){
        $_SESSION["cart"][$id]++;
    } else {
        $_SESSION["cart"][$id] = 1;

    }
}
// increase item quantity
if(isset($_GET["increase"])){
    $id = (int)$_GET["increase"];
    $_SESSION["cart"][$id]++;
}
// decrease item quantity
if(isset($_GET["decrease"])){
    $id = (int)$_GET["decrease"];
    if($_SESSION["cart"][$id] > 1){
        $_SESSION["cart"][$id]--;
    } else {
        unset($_SESSION["cart"][$id]);
    }
}
// Remove item from cart
if(isset($_GET["remove"])){
    $id = (int)$_GET["remove"];
    unset($_SESSION["cart"][$id]);
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
// Display items in cart
foreach ($_SESSION["cart"] as $id => $quantity) {

    $result = mysqli_query($conn, "SELECT * FROM tblClothes WHERE clothes_id=" . (int)$id);
    $item = mysqli_fetch_assoc($result);

    if ($item) {

        $subtotal = $item["price"] * $quantity;
        $total += $subtotal;
?>

    <div class="product">
        <img src="images/<?php echo $item['image']; ?>">

        <h3><?php echo $item["item_name"]; ?></h3>
        <p><strong>R<?php echo $item["price"]; ?></strong></p>

        <p>Quantity: <?php echo $quantity; ?></p>
        <p>Subtotal: R<?php echo $subtotal; ?></p>

        <!-- Quantity Buttons -->
        <a href="cart.php?increase=<?php echo $id; ?>">
            <button>+</button>
        </a>

        <a href="cart.php?decrease=<?php echo $id; ?>">
            <button>-</button>
        </a>

        <!-- Remove Button -->
        <a href="cart.php?remove=<?php echo $id; ?>">
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
<div style="text-align:center; margin-bottom:50px;">
    <a href="checkout.php">
        <button>Proceed to Checkout</button>
    </a>
</div>

</body>
</html>
