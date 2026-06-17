<?php
// Website: Pastimes
// This page allows the admin to manage the seller requests. Admin can approve or reject seller requests
include("DBConn.php");

if(isset($_GET['approve']))
{
    $id = $_GET['approve'];

    mysqli_query($conn,
    "UPDATE tblSellerRequest SET status='Approved'
     WHERE request_id='$id'");
}

if(isset($_GET['reject']))
{
    $id = $_GET['reject'];

    mysqli_query($conn,
    "UPDATE tblSellerRequest SET status='Rejected'
     WHERE request_id='$id'");
}
?>

<h2>Seller Requests</h2>

<?php
$result = mysqli_query($conn,"SELECT * FROM tblSellerRequest");

while($row = mysqli_fetch_assoc($result))
{
?>
<div class="product">
    <img src="images/<?php echo $row['image']; ?>">
    <p><?php echo $row['brand']; ?></p>
    <p><?php echo $row['description']; ?></p>
    <p>R<?php echo $row['price']; ?></p>
    <p>Status: <?php echo $row['status']; ?></p>

    <a href="?approve=<?php echo $row['request_id']; ?>">Approve</a>
    <a href="?reject=<?php echo $row['request_id']; ?>">Reject</a>
</div>
<?php 
} ?>