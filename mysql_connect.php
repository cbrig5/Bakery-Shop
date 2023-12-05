<?php
//Set database connection information
define('DB_HOST', 'csdb.brockport.edu'); //Or could be a different server
define('DB_USER', 'etay1'); //MySQL credentials
define('DB_PASSWORD', '_fal23_0'); //MySQL credentials
define('DB_NAME', 'fal23_cis442_etay1'); //Specific database
// define('port', '3308');

//Database connection
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
       OR die('Connection error');


// Check connection
if (!$dbc) {
    die("Connection failed: " . mysqli_connect_error());
}
//Set the encoding
mysqli_set_charset($dbc, 'utf8');
