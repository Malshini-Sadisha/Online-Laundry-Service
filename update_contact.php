<?php
// Establish a connection to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "laundry_land"; 

$conn = new mysqli($servername, $username, $password, $database);

// Get form data
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Update the data in the database
$sql = "UPDATE contacts SET name = '$name', email = '$email', phone = '$phone', message = '$message' WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    
    echo "Data updated successfully";
    header("Location: contact.html?success=true&id=$newId");
} else {
    echo "Error updating data: " . mysqli_error($conn);
}

$conn->close();
?>
