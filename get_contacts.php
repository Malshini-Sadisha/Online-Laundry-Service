<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/get_contacts.css">
</head>
<body>
<?php


// Establish a connection to MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "laundry_land"; // Change this to your desired database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ID = $_GET['id'];

// Fetch the contacts data for the specific user
$sql = "SELECT * FROM contacts WHERE id = '$ID'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    // Display the contacts data
    while ($row = $result->fetch_assoc()) {
        echo '<h2>Contact Details</h2>';
        echo '<p>Name: ' . $row['name'] . '</p>';
        echo '<p>Email: ' . $row['email'] . '</p>';
        echo '<p>Phone: ' . $row['phone'] . '</p>';
        echo '<p>Message: ' . $row['message'] . '</p>';
        echo '<a href="edit_contact.php?id=' . $row['id'] . '">Edit</a> | <a href="delete_contact.php?id=' . $row['id'] . '">Delete</a>';
    }
        

} else {
    echo 'No contacts found for the specified user.';
}
    
// Close the database connection
$conn->close();
?>
</body>
</html>






