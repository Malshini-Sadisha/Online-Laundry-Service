<?php

// Database configuration
$host = 'localhost'; // MySQL host
$dbUsername = 'root'; // MySQL username
$dbPassword = ''; // MySQL password
$dbName = 'laundry_land'; // MySQL database name

// Create a database connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>