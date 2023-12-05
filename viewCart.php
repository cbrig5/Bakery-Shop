<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        

        div {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        h3 {
            color: #333;
            margin-bottom: 5px;
        }

        p {
            color: #777;
            margin-top: 5px;
        }

        form {
            margin-top: 20px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .empty-cart-message {
            color: #777;
            margin-top: 20px;
        }

        .cart-buttons {
            display: flex;
            gap: 10px;
        }
    </style>
    <title>Your Page Title</title>
</head>
<body>
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
        echo '<div class="cart-buttons">';

        echo '<form action="emptyCart.php" method="post">';
        echo '<input type="submit" value="Empty Cart">';
        echo '</form>';

        echo '<form action="" method="post">';
        echo '<input type="submit" value="Pay Now">';
        echo '</form>';
        echo '</div>';


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
</body>
</html>