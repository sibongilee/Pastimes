<?php
// Website: Pastimes
//  This page is the wishlist page where users can view and manage their favorite clothing items.
session_start();
include "DBConn.php";
if (!isset($_SESSION["wishlist"])) {
    $_SESSION["wishlist"] = array();
}
// Add item to wishlist 
if(isset($_GET['add']))
{
    $id = $_GET['add'];

    if(!in_array($id,$_SESSION['wishlist']))
    {
        $_SESSION['wishlist'][] = $id;
    }
}
// Remove item from wishlist
if(isset($_GET['remove']))
{
    $id = $_GET['remove'];
    if(($key = array_search($id, $_SESSION['wishlist'])) !== false) {
        unset($_SESSION['wishlist'][$key]);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Wishlist - Pastimes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navbar -->
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
<div class="wishlist-container">
    <h2>My Wishlist</h2>
    <?php
    if(empty($_SESSION['wishlist']))
    {
        echo "<p>Your wishlist is empty.</p>";
    }
    else
    {
        echo '<div class="product-grid">';
        foreach($_SESSION['wishlist'] as $id)
        {
            $result = mysqli_query($conn, "SELECT * FROM tblClothes WHERE clothes_id='$id'");
            $row = mysqli_fetch_assoc($result);
            ?>
            <div class="product">
                <img src="images/<?php echo $row['image']; ?>" alt="Clothing Image">
                <h3><?php echo $row["item_name"]; ?></h3>
                <p>Category: <?php echo $row["category"]; ?></p>
                <p><strong>R<?php echo $row["price"]; ?></strong></p>
                <a href="cart.php?add=<?php echo $row['clothes_id']; ?>">
                    <button>Add To Cart</button>
                </a>
                <a href="wishlist.php?remove=<?php echo $row['clothes_id']; ?>">
                    <button>Remove from Wishlist</button>
                </a>
            </div>
            <?php
        }
    }

    ?>
</div>
</body>
</html>
