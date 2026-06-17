<?php
// Website: Pastimes
// This page is the checkout page where users can review their cart and proceed to payment.
session_start();
include "DBConn.php";
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
}
// Calculate total price
$total = 0;
$cart_items = array();
// calculate total and get cart items
if(!empty($_SESSION["cart"])){
    foreach($_SESSION["cart"] as $id => $quantity){
        $result = mysqli_query($conn, "SELECT * FROM tblClothes WHERE clothes_id='$id'");
        $row = mysqli_fetch_assoc($result);
        $total += $row["price"] * $quantity;
        $cart_items[] = array(
            "id" => $id,
            "item_name" => $row["item_name"],
            "price" => $row["price"],
            "quantity" => $quantity,
            
        );
    }
}
// Process order submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $postalCode = mysqli_real_escape_string($conn, $_POST['postalCode']);

    // Insert order (you may need to create an orders table)
    $orderDate = date('Y-m-d H:i:s');
    $query = "INSERT INTO tblOrders (firstName, lastName, email, phone, address, city, postalCode, orderDate, totalAmount) 
              VALUES ('$firstName', '$lastName', '$email', '$phone', '$address', '$city', '$postalCode', '$orderDate', '$total')";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION["cart"] = array();
        $successMsg = "Order placed successfully! Thank you for your purchase.";
    } else {
        $errorMsg = "Error placing order. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout - Pastimes</title>
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

    <div class="checkout-container">
        <?php if (isset($successMsg)): ?>
            <div class="success-message"><?php echo $successMsg; ?></div>
            <a href="index.php"><button>Continue Shopping</button></a>
        <?php else: ?>
            <h2>Checkout</h2>
            
            <div class="checkout-content">
                <!-- Order Summary -->
                <div class="order-summary">
                    <h3>Order Summary</h3>
                    <?php if (empty($cartItems)): ?>
                        <p>Your cart is empty.</p>
                    <?php else: ?>
                        <div class="summary-items">
                            <?php foreach ($cartItems as $item): ?>
                                <div class="summary-item">
                                    <span><?php echo $item['name']; ?> x <?php echo $item['quantity']; ?></span>
                                    <span>R<?php echo number_format($item['itemTotal'], 2); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="summary-total">
                            <strong>Total: R<?php echo number_format($total, 2); ?></strong>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Checkout Form -->
                <div class="checkout-form">
                    <?php if (isset($errorMsg)): ?>
                        <div class="error-message"><?php echo $errorMsg; ?></div>
                    <?php endif; ?>
                    
                    <form method="POST">
                        <h3>Shipping Information</h3>
                        <input type="text" name="firstName" placeholder="First Name" required>
                        <input type="text" name="lastName" placeholder="Last Name" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="tel" name="phone" placeholder="Phone Number" required>
                        <input type="text" name="address" placeholder="Street Address" required>
                        <input type="text" name="city" placeholder="City" required>
                        <input type="text" name="postalCode" placeholder="Postal Code" required>
                        
                        <h3>Payment Method</h3>
                        <p>Payment processing will be handled securely.</p>
                        
                        <button type="submit" class="checkout-btn">Complete Order</button>
                        <a href="cart.php"><button type="button">Back to Cart</button></a>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
