<?php
// back-end code to display clothing items on the Pastimes online clothing store homepage. It retrieves data from the database

include "DBConn.php";

// SQL query to fetch all clothing items
$result = mysqli_query($conn, "SELECT * FROM tblClothes");
?>

<link rel="stylesheet" href="css/style.css">

<h1>Pastimes Clothing Store</h1>

<div class="container">

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

    <div class="product">
        <!-- Display image stored in images folder -->
        <img src="images/<?php echo $row['image']; ?>">

        <!-- Display clothing name -->
        <h3><?php echo $row['item_name']; ?></h3>

        <!-- Display price -->
        <p>Price: R<?php echo $row['price']; ?></p>

        <!-- Add to cart button -->
        <a href="cart.php?add=<?php echo $row['clothes_id']; ?>">
            <button>Add To Cart</button>
        </a>
    </div>

<?php } ?>

</div>