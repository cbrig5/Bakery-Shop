
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Include the database connection file
include('mysql_connect.php');

// Fetch menu items from the database
$sql = "SELECT * FROM menu";
$result = mysqli_query($dbc, $sql);

// Check for query execution success
if (!$result) {
    die('Error executing query: ' . mysqli_error($dbc));
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="index.js"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/utilities.css" />
    <link rel="stylesheet" href="css/hamburger.css" />
    <link rel="stylesheet" href="css/food.css" />
    <title>Jackson's Bakery</title>
  </head>

  <body>
    <!-- Navbar -->
    <nav class="navbar">
      <div class="container flex bg-primary">
        <!-- Navigation for tablets and desktops -->
        <nav class="navigation">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="#top">Menu</a></li>
            <li><a href="#">Location & Hours</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="viewCart.php">Cart</a></li>
          </ul>
        </nav>

        <!-- Navigation for mobile -->
        <div class="menu-wrap">
          <input type="checkbox" class="toggler" />
          <div class="hamburger">
            <div></div>
          </div>
          <div class="menu">
            <div>
              <div>
                <ul>
                  <li><a href="index.html">Home</a></li>
                  <li><a href="menu.php">Menu</a></li>
                  <li><a href="#">Location & Hours</a></li>
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="viewCart.php">Cart</a></li>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <!-- Food Menu Mobile -->
    <div class="container">
      <div class="menu">
        <h2 class="menu-group-heading">Fresh Baked Pastries</h2>
        <div class="menu-group">
          <?php
          // Loop through fetched menu items and generate HTML
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="menu-item">';
            echo '<div class="menu-item-text">';
            echo '<h3 class="menu-item-heading">';
            echo '<span class="menu-item-name">' . $row["name"] . '</span>';
            echo '<span class="menu-item-price">$' . $row["cost"] . '</span>';
            echo '</h3>';
            echo '<p class="menu-item-description">' . $row["description"] . '</p>';
            echo '</div>';
            // Add a form with a button to add items to the cart
            echo '<form action="addToCart.php" method="post">';
            echo '<input type="hidden" name="menu_id" value="' . $row["id"] . '">';
            echo '<input type="submit" value="Add to Cart" class="addToCart">';
            echo '</form>';
            echo '</div>';
                        
        }

          // Free the result set
          mysqli_free_result($result);
          ?>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer bg-dark py-5">
      <div class="container grid grid-3">
        <!-- Grid Item 1 -->
        <div>
          <h2>Jackson's Bakery</h2>
          <p1>Copyright &copy; 2023</p1>
        </div>

        <!-- Grid Item 2 -->
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="#top">Menu</a></li>
          <li><a href="#">Locations</a></li>
          <li><a href="#">About Us</a></li>
        </ul>

        <!-- Grid Item 3 -->
        <div class="social">
          <a href="https://www.google.com/search?q=jacksons+bakery+google+reviews&sca_esv=581330131&sxsrf=AM9HkKmExAQ9HLV6GbfWogYcLx0KlqWWog%3A1699650069671&ei=FZpOZYS8KJmgptQP1q-_oAs&oq=jacksons+bakery+google+re&gs_lp=Egxnd3Mtd2l6LXNlcnAiGWphY2tzb25zIGJha2VyeSBnb29nbGUgcmUqAggAMgUQIRigATIFECEYoAFIjEZQpgJYszxwAXgAkAEAmAGPAaABrweqAQM3LjO4AQPIAQD4AQHCAgQQIxgnwgITEC4YgwEYrwEYxwEYsQMYigUYQ8ICBRAAGIAEwgIHEAAYgAQYCsICCxAuGK8BGMcBGIAEwgIQEC4YgAQYFBiHAhjHARivAcICCxAuGIAEGMcBGK8BwgINEC4YrwEYxwEYgAQYCsICEBAuGBQYrwEYxwEYhwIYgATCAg4QLhiKBRjHARivARiRAsICBhAAGBYYHsICCBAAGBYYHhgKwgIdEC4YigUYxwEYrwEYkQIYlwUY3AQY3gQY4ATYAQHCAggQIRgWGB4YHeIDBBgAIEGIBgG6BgYIARABGBQ&sclient=gws-wiz-serp#lrd=0x89d6b6cf723ea76f:0x723c653532b480a0,1,,,,"
            ><i class="fab fa-google fa-2x"></i
          ></a>
          <a href="https://facebook.com/Jacksonsbakery/"
            ><i class="fab fa-facebook fa-2x"></i
          ></a>
          <a href="https://www.yelp.com/biz/jacksons-bakery-rochester"
            ><i class="fab fa-yelp fa-2x"></i
          ></a>
        </div>
      </div>
    </footer>
  </body>
</html>

<?php
// Close the database connection
mysqli_close($dbc);
?>
