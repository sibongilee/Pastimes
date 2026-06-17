<?php
// Website: Pastimes
// This page is the checkout page where users can review their cart and proceed to payment.
session_start();
include("navbar.php");

$total = 0;

$products = [
    "Men Jacket" => 450,
    "Men T-Shirt" => 180,
    "Men Jeans" => 350,
    "Women Dress" => 400,
    "Women Sweater" => 300,
    "Women Top" => 220
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout - Pastimes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="checkout-container">

    <h1>Checkout</h1>

    <?php
    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0)
    {
        echo "<div class='checkout-items'>";

        foreach($_SESSION['cart'] as $item)
        {
            $price = $products[$item];
            $total += $price;

            echo "
            <div class='checkout-item'>
                <h3>$item</h3>
                <p>R$price</p>
            </div>";
        }

        echo "</div>";
    }
    ?>

    <div class="checkout-total">
        <h2>Total: R<?php echo $total; ?></h2>
    </div>

    <form action="completeOrder.php" method="POST" class="checkout-form">

        <input type="text" name="fullname" placeholder="Full Name" required>

        <input type="text" name="address" placeholder="Delivery Address" required>

        <input type="tel" name="phone" placeholder="Phone Number" required>

        <button type="submit">Place Order</button>

    </form>

    <br>

    <a href="clothes.php" class="continue-btn">
        Continue Shopping
    </a>

</div>

</body>
</html>