<?php
session_start();

// Check if the menu_id is set in the POST request
if(isset($_POST['menu_id'])) {
    // Get the menu_id from the POST request
    $menu_id = $_POST['menu_id'];

    // Check if the cart array exists in the session, if not, create it
    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add the menu_id to the cart array
    $_SESSION['cart'][] = $menu_id;
}

// Redirect back to the index page
header('Location: index.html');
exit();
?>
