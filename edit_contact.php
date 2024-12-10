<?php
// Establish a connection to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "laundry_land"; 

$conn = new mysqli($servername, $username, $password, $database);

// Get the contact ID from the URL parameter
$id = $_GET['id'];

// Retrieve the existing data from the database for the given ID
$sql = "SELECT * FROM contacts WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Display a form pre-filled with the existing data for editing
echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<link rel="stylesheet" type="text/css" href="css/edit_contact.css">';
echo '</head>';
echo '<body>';

echo '<form method="post" action="update_contact.php">';
echo '<label for="name">Name:</label>';
echo '<input type="text" name="name" value="' . $row['name'] . '" required><br><br>';
echo '<label for="email">Email:</label>';
echo '<input type="email" name="email" value="' . $row['email'] . '" required><br><br>';
echo '<label for="phone">Mobile Number:</label>';
echo '<input type="phone" name="phone" value="' . $row['phone'] . '" required><br><br>';
echo '<label for="message">Message:</label><br>';
echo '<textarea name="message" rows="5" cols="30" required>' . $row['message'] . '</textarea><br><br>';
echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
echo '<input type="submit" value="Update">';
echo '</form>';

echo '</body>';
echo '</html>';


$conn->close();
?>
