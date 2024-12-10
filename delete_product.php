<?php
// Include the database connection file
require_once('conn.php');

// Check if a product ID is provided
if (isset($_POST['productID'])) {
    $productID = $_POST['productID'];

    // Prepare and execute the SQL query to delete the product
    $sql = "DELETE FROM products WHERE id = '$productID'";
    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully.";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
} else {
    echo "Product ID not provided.";
}

// Close the database connection
$conn->close();
?>
