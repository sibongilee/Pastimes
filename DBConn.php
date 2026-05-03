<?php 
//this file is used to connect the web appplication to the MySQL database
//The database was created using phpMyAdimin and is called ClothingStore.

$host = "localhost"; //the host name of the database server
$user= "root"; //the username to access the database
$password="";
$database = "ClothingStore"; //the name of the database

//mysqli_connect is used to connect to the database using the provided credentials
$conn = mysqli_connect($host, $user, $password, $database);

// If the connection fails, an error message will be displayed
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>