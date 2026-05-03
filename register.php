<?php
// This page allows a new user to register.

include "DBConn.php";

$message = "";

if (isset($_POST["register"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $address = $_POST["address"];

    // Check password length (must be 8 characters)
    if (strlen($password) != 8) {
        $message = "Password must be exactly 8 characters.";
    }
    // Check passwords match
    elseif ($password != $confirmPassword) {
        $message = "Passwords do not match.";
    }
    else {
        // Hash password
        $hashedPassword = md5($password);

        // Insert user as pending (admin must approve)
        $sql = "INSERT INTO tblUser (name, email, username, password, address, status)
                VALUES ('$name', '$email', '$username', '$hashedPassword', '$address', 'pending')";

        if (mysqli_query($conn, $sql)) {
            $message = "Registration successful. Wait for admin approval.";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register - Pastimes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Navigation Bar -->
<div class="navbar">
    <strong>Pastimes</strong>
    <a href="index.php">Home</a>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
    <a href="admin.php">Admin</a>
    <a href="clothes.php">Clothes</a>
</div>

<h1>Register Account</h1>

<p class="message"><?php echo $message; ?></p>

<div class="container">
    <!-- Registration Form -->

    <div class="form-box">
        <form method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="8-character Password" minlength="8" maxlength="8" required>
            <input type="password" name="confirmPassword" placeholder="Confirm Password" minlength="8" maxlength="8" required>
            <input type="text" name="address" placeholder="Delivery Address" required>

            <button type="submit" name="register">Register</button>
        </form>
    </div>

</div>

</body>
</html>