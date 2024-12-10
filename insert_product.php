<?php
// Include the database connection file
require_once('conn.php');

// Retrieve form data
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productImage = $_FILES['productImage']['name'];
$productImageTmp = $_FILES['productImage']['tmp_name'];

// Move uploaded image to desired location
$targetDirectory = "images/"; // Directory to store the images
$targetFile = $targetDirectory . basename($productImage);
move_uploaded_file($productImageTmp, $targetFile);

// Prepare and execute the SQL query to insert data into the table
$sql = "INSERT INTO products (product_name, product_price, product_image) VALUES ('$productName', '$productPrice', '$targetFile')";

if ($conn->query($sql) === TRUE) {
    // Close the database connection
    $conn->close();
    echo '<script>alert("Data inserted successfully."); window.location.href = "../category.php";</script>';
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
