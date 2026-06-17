<?php
// This page allows the admin to login and approve users.

session_start();
include "DBConn.php";

$message = "";

// Admin login
if (isset($_POST["adminLogin"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM tblAdmin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION["admin"] = $email;
        $message = "Admin logged in successfully.";
    } else {
        $message = "Incorrect admin login details.";
    }
}

// Approve user
if (isset($_GET["approve"])) {
    $userId = $_GET["approve"];
    mysqli_query($conn, "UPDATE tblUser SET status='approved' WHERE user_id=$userId");
    $message = "User approved successfully.";
}

// Delete user
if (isset($_GET["delete"])) {
    $userId = $_GET["delete"];
    mysqli_query($conn, "DELETE FROM tblUser WHERE user_id=$userId");
    $message = "User deleted successfully.";
}

$users = mysqli_query($conn, "SELECT * FROM tblUser");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Pastimes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
    <strong>Pastimes</strong>
    <a href="index.php">Home</a>
    <a href="seller_request.php">Sell Clothes</a>
    <a href="admin.php">Admin</a>
    <a href="admin_clothes.php">Admin Clothes</a>
    <a href="admin_users.php">Admin Users</a>
    <a href="messages.php">Messages</a>
    <a href="logout.php">Logout</a>
</div>

<h1>Admin Page</h1>

<p class="message"><?php echo $message; ?></p>

<?php if (!isset($_SESSION["admin"])) { ?>

<div class="container">
    <div class="form-box">
        <h2>Admin Login</h2>

        <form method="POST">
            <input type="email" name="email" placeholder="Admin Email" required>
            <input type="password" name="password" placeholder="Admin Password" required>

            <button type="submit" name="adminLogin">Login as Admin</button>
        </form>

        <p><strong>Email:</strong> admin@pastimes.com</p>
        <p><strong>Password:</strong> admin12345</p>
    </div>
</div>

<?php } else { ?>

<div class="container">
    <h2>User Verification</h2>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Username</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($users)) { ?>
        <tr>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["status"]; ?></td>
            <td>
                <a href="admin.php?approve=<?php echo $row['user_id']; ?>">Approve</a> |
                <a href="admin.php?delete=<?php echo $row['user_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php } ?>

</body>
</html>