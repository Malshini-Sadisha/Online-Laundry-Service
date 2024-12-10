<?php
// Establish a connection to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "laundry_land"; 

$conn = new mysqli($servername, $username, $password, $database);

// Get the contact ID from the URL parameter
$id = $_GET['id'];

// Delete the corresponding record from the database
$sql = "DELETE FROM contacts WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    $message ="Data deleted successfully";
    echo "<script> alert('$message');</script>";
    header("Location: contact.html?success=true&id=$id");
} else {
    echo "Error deleting data: " . mysqli_error($conn);
}

$conn->close();
?>
