<?php
//this page logs users and admins out of the website
session_start();
session_unset();
session_destroy();

// Redirect to homepage after logout
header("Location: index.php");
exit();
?>
