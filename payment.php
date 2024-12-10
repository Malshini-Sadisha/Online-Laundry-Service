<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $cardNumber = $_POST['cardNumber'];
  $expiryMonth = $_POST['Month'];
  $expiryYear = $_POST['Year'];
  $cardholderName = $_POST['Cardholder-name'];
  $cvv = $_POST['CVV'];

  // Validate and sanitize form data (implement your own validation)

  // Create a database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "laundry_land";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Prepare and execute the SQL statement
  $stmt = $conn->prepare("INSERT INTO add_payment (cardNumber, expiryMonth, expiryYear, cardholderName, cvv) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $cardNumber, $expiryMonth, $expiryYear, $cardholderName, $cvv);
  $stmt->execute();
  

  // Close the statement and connection
  $stmt->close();
  $conn->close();

  // Redirect the user to a success page
  header("Location:success.html");
  exit();
}
?>
