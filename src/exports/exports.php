<?php
require 'PHPExcel/PHPExcel.php'; // Include the PHPExcel library

// Step 1: Establish database connection (you need to replace your_db_host, your_db_name, your_db_user, and your_db_password with actual database credentials)
$mysqli = new mysqli('your_db_host', 'your_db_user', 'your_db_password', 'your_db_name');

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
