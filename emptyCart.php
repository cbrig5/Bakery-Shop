<?php
session_start();

// Unset the cart variable
unset($_SESSION['cart']);

// Redirect back to the cart display page or any other page
header("Location: menu.php"); // Change to the appropriate page
exit();
?>
