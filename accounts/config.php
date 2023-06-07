<?php
// This file contains database configuration for hostinger mysql db
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u973983787_sugamphirke9');
define('DB_PASSWORD', 'Sugam@016');
define('DB_NAME', 'u973983787_natours_users');

// Try connecting to the database.
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($conn == false) {
    die('Error: cannot connect to Database!');
}

?>