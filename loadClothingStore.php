<?php

// This script recreates the database tables and loads data.

include "DBConn.php";

// Drop tables if they exist
mysqli_query($conn, "DROP TABLE IF EXISTS tblOrder");
mysqli_query($conn, "DROP TABLE IF EXISTS tblClothes");
mysqli_query($conn, "DROP TABLE IF EXISTS tblUser");
mysqli_query($conn, "DROP TABLE IF EXISTS tblAdmin");

// Create tblUser
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS tblUser (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    username VARCHAR(50),
    password VARCHAR(255),
    address VARCHAR(255),
    status VARCHAR(20)
)");

// Create tblAdmin
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS tblAdmin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100),
    password VARCHAR(255)
)");

// Create tblClothes
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS tblClothes (
    clothes_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100),
    category VARCHAR(50),
    price DECIMAL(10,2),
    image VARCHAR(100)
)");

// Create tblOrder
mysqli_query($conn, "CREATE TABLE IF NOT EXISTS tblOrder (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    clothes_id INT,
    total_price DECIMAL(10,2)
)");

// Insert admin
$adminPass = md5("admin12345");

mysqli_query($conn, "INSERT INTO tblAdmin (email, password)
VALUES ('admin@pastimes.com', '$adminPass')");

// Load users from userData.txt
$file = fopen("userData.txt", "r");

while (($line = fgets($file)) !== false) {
    $data = explode(",", trim($line));

    mysqli_query($conn, "INSERT INTO tblUser (name, email, username, password, address, status)
    VALUES ('$data[0]', '$data[1]', '$data[2]', md5('$data[3]'), '$data[4]', 'approved')");
}

fclose($file);

// Insert clothes (Men & Women)
mysqli_query($conn, "INSERT INTO tblClothes (item_name, category, price, image)
VALUES
('Denim Jacket','Men',899.00,'jacket.jpg'),
('Hoodie','Men',349.00,'hoodie.jpg'),
('Jeans','Men',599.00,'jeans.jpg'),
('Dress','Women',499.00,'dress.jpg'),
('Sweater','Women',649.00,'sweater.jpg'),
('Top','Women',399.00,'top.jpg')");

echo "Database loaded successfully!";
?>