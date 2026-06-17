<?php
// Website: Pastimes
// This page allows the admin to manage the users of the website. Admin can approve or delete
include("DBConn.php");

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM tblUser WHERE user_id='$id'");
}

if(isset($_GET['approve']))
{
    $id = $_GET['approve'];

    mysqli_query($conn,
    "UPDATE tblUser SET status='Approved' WHERE user_id='$id'");
}
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
    <a href="admin.php">Admin</a>
    <a href="wishlist.php">Wishlist</a>
    <a href="logout.php">Logout</a>
</div>

<h2>Admin Users</h2>

<?php
$result = mysqli_query($conn,"SELECT * FROM tblUser");

while($row = mysqli_fetch_assoc($result))
{
?>
<div class="cart-item">
    <p><?php echo $row['name']; ?></p>
    <p><?php echo $row['email']; ?></p>
    <p>Status: <?php echo $row['status']; ?></p>

    <a href="?approve=<?php echo $row['user_id']; ?>">Approve</a>
    <a href="?delete=<?php echo $row['user_id']; ?>">Delete</a>
</div>
<?php include("footer.php"); ?>
<?php } ?>