<?php
session_start();

// Include the database connection file
include('mysql_connect.php');

// Check if the cart array exists in the session
if (isset($_SESSION['cart'])) {
    // Fetch menu items from the database based on the items in the cart
    $cart_items = $_SESSION['cart'];
    $cart_items_str = implode(',', $cart_items);

    $sql = "SELECT * FROM menu WHERE id IN ($cart_items_str)";
    $result = mysqli_query($dbc, $sql);

    // Check for query execution success
    if ($result) {
        // Display the items in the cart
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div>';
            echo '<h3>' . $row["name"] . '</h3>';
            echo '<p>$' . $row["cost"] . '</p>';
            echo '</div>';
        }

        // Add a button to empty the cart
        echo '<form action="emptyCart.php" method="post">';
        echo '<input type="submit" value="Empty Cart">';
        echo '</form>';

        // Free the result set
        mysqli_free_result($result);
    } else {
        echo 'Error executing query: ' . mysqli_error($dbc);
    }
} else {
    echo 'Cart is empty.';
}

// Close the database connection
mysqli_close($dbc);
?>
