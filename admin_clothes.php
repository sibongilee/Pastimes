<?php
// Website: Pastimes
// This page allows the admin to manage the clothing items in the store. Admin can add new
include("DBConn.php");

if(isset($_POST['add']))
{
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], "images/".$image);

    mysqli_query($conn,
    "INSERT INTO tblClothes(name,category,price,image)
    VALUES('$name','$category','$price','$image')");
}

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM tblClothes WHERE clothes_id='$id'");
}
?>

<h2>Admin Clothes</h2>

<form method="POST" enctype="multipart/form-data">
<input type="text" name="name" placeholder="Name" required>
<input type="text" name="category" placeholder="Category" required>
<input type="number" name="price" placeholder="Price" required>
<input type="file" name="image" required>
<button name="add">Add Clothing</button>
</form>

<hr>

<?php
$result = mysqli_query($conn,"SELECT * FROM tblClothes");

while($row = mysqli_fetch_assoc($result))
{
?>
<div class="product">
    <img src="images/<?php echo $row['image']; ?>">
    <p><?php echo $row['name']; ?></p>
    <p>R<?php echo $row['price']; ?></p>

    <a href="admin_clothes.php?delete=<?php echo $row['clothes_id']; ?>">
        Delete
    </a>
</div>
<?php } ?>