<?php
//back-end code to create tables for the Pastimes online clothing store

include "DBConn.php";

// The following queries remove old tables to avoid duplication
mysqli_query($conn, "DROP TABLE IF EXISTS tblOrder");
mysqli_query($conn, "DROP TABLE IF EXISTS tblClothes");
mysqli_query($conn, "DROP TABLE IF EXISTS tblUser");
mysqli_query($conn, "DROP TABLE IF EXISTS tblAdmin");

// Creating the tblUser table to store user registration details
mysqli_query($conn, "CREATE TABLE tblUser (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    username VARCHAR(50),
    password VARCHAR(255),
    address VARCHAR(255),
    status VARCHAR(20)
)");

// Creating tblAdmin table for system administrator login
mysqli_query($conn, "CREATE TABLE tblAdmin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    password VARCHAR(255)
)");

// Creating tblClothes table to store second-hand clothing items
mysqli_query($conn, "CREATE TABLE tblClothes (
    clothes_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100),
    category VARCHAR(50),
    price DECIMAL(10,2),
    image VARCHAR(100)
)");

// Creating tblOrder table to manage purchases made by users
mysqli_query($conn, "CREATE TABLE tblOrder (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    clothes_id INT,
    total_price DECIMAL(10,2)
)");

// Inserting admin login details (password is encrypted using MD5)
$adminPass = md5("admin12345");

mysqli_query($conn, "INSERT INTO tblAdmin (email, password)
VALUES ('admin@pastimes.com', '$adminPass')");

// Reading user data from the text file and inserting into database
$file = fopen("userData.txt", "r");

while (($line = fgets($file)) !== false) {
    $data = explode(",", trim($line));

    // Each line is split into an array and inserted into tblUser
    mysqli_query($conn, "INSERT INTO tblUser (name, email, username, password, address, status)
    VALUES ('$data[0]', '$data[1]', '$data[2]', md5('$data[3]'), '$data[4]', 'approved')");
}

fclose($file);

// Inserting clothing items with images and prices
// Insert clothing items (Men & Women categories)
mysqli_query($conn, "INSERT INTO tblClothes (item_name, category, price, image)
VALUES
('Denim Jacket','Men',899.00,'jacket.jpg'),
('Hoodie','Men',349.00,'hoodie.jpg'),
('Jeans','Men',599.00,'jeans.jpg'),

('Dress','Women',499.00,'dress.jpg'),
('Sweater','Women',649.00,'sweater.jpg'),
('Top','Women',399.00,'top.jpg')");

// Final confirmation message
echo "Tables created successfully!";
?>