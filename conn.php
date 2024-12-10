<?php
// Create a connection to the MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laundry_land";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}