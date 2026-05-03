<?php
// Sibongile Nhlapo - ST10449136
// Tshifhiwa Austin Thamagane - ST10441732
// Website: Pastimes
// This page allows approved users to login.

session_start();
include "DBConn.php";

$message = "";

if (isset($_POST["login"])) {

    $usernameOrEmail = $_POST["usernameOrEmail"];
    $password = md5($_POST["password"]);

    // User can login using either username or email.
    $sql = "SELECT * FROM tblUser 
            WHERE (username='$usernameOrEmail' OR email='$usernameOrEmail') 
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Only approved users are allowed to login.
        if ($user["status"] == "approved") {
            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["user_name"] = $user["name"];

            header("Location: clothes.php");
            exit();
        } else {
            $message = "Your account is still waiting for admin approval.";
        }
    } else {
        $message = "Incorrect username/email or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Pastimes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
    <strong>Pastimes</strong>
    <a href="index.php">Home</a>
    <a href="register.php">Register</a>
    <a href="login.php">Login</a>
    <a href="admin.php">Admin</a>
    <a href="clothes.php">Clothes</a>
</div>

<h1>User Login</h1>

<p class="message"><?php echo $message; ?></p>

<div class="container">
    <div class="form-box">
        <form method="POST">
            <input type="text" name="usernameOrEmail" placeholder="Username or Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="login">Login</button>
        </form>
    </div>
</div>

</body>
</html>