<?php
// Website: Pastimes
// This page allows users to request to become sellers by submitting a form.
session_start();
include "DBConn.php";

if(isset($_POST["submit"])){
    $brand = $_POST["brand"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $image = $_FILES["image"]["name"];

    move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image);
    // Insert seller request into database
    $sql = "INSERT INTO seller_requests (brand, description, price, image) VALUES ('$brand', '$description', '$price', '$image')";
    mysqli_query($conn, $sql);

    echo "<p>Request submitted successfully. We will review your request and get back to you.</p>";

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Sell Clothes</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    

<h2>Sell Clothes</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="brand" placeholder="Brand" required>

<br><br>

<textarea name="description" placeholder="Description" required></textarea>

<br><br>

<input type="number" name="price" placeholder="Price" required>

<br><br>

<input type="file" name="image" required>

<br><br>

<button type="submit" name="submit">
Send Request
</button>

</form>

</body>
</html>
