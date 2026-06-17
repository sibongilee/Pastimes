<div class="navbar">
    <strong>Pastimes</strong>
    <!-- main links -->
    <div class="nav-links">
        <a href="index.php">Home</a>
        <a href="clothes.php">Shop</a>
        <a href="seller_request.php">Sell clothes</a>
        <a href="wishlist.php">Wishlist</a>
        <a href="cart.php">Cart</a>
        <?php
if(isset($_SESSION["user_id"])) {
            echo '<a href="logout.php">Logout</a>';
        } else {
            echo '<a href="login.php">Login</a>';
            echo '<a href="register.php">Register</a>';
        }
?>
    </div>
        <!-- admin links -->
         <a href="admin_clothes.php">Admin Clothes</a>
         <a href="admin_users.php">Admin Users</a>
         <a href="messages.php">Messages</a>

</div>