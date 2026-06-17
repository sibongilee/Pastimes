<?php
session_start();

unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Complete</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="form-box">

    <h2>Order Successful</h2>

    <p>Thank you for shopping with Pastimes.</p>

    <a href="index.php">
        <button>Return Home</button>
    </a>

</div>
<?php include("footer.php"); ?>

</body>
</html>