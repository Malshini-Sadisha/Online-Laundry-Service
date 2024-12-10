<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the config file for database connection
    include('config.php');

    // Retrieve form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['pass']) ? $_POST['pass'] : '';
    $confirmPassword = isset($_POST['re_pass']) ? $_POST['re_pass'] : '';
    $contact = isset($_POST['contact']) ? $_POST['contact'] : '';
    $agreeTerms = isset($_POST['agree-term']);

    // Validate form data
    $errors = array();

    if (empty($name)) {
        $errors[] = "Name is required";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match";
    }

    if (empty($contact)) {
        $errors[] = "Contact number is required";
    }

    if (!$agreeTerms) {
        $errors[] = "You must agree to the terms of service";
    }

    // If there are no errors, insert the data into the database
    if (empty($errors)) {
        try {
            // Check if the email already exists
            $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE userEmail = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();

            if ($count > 0) {
                $errors[] = "Email already exists";
            } else {
                // Prepare the SQL statement
                $stmt = $conn->prepare("INSERT INTO users (userName, userEmail, userPassword, userContact) VALUES (?, ?, ?, ?)");

                // Bind the parameters
                $stmt->bind_param("ssss", $name, $email, $password, $contact);

                // Execute the query
                $stmt->execute();

                // Close the statement
                $stmt->close();

                // Close the database connection
                $conn->close();

                // Redirect to login page with success message
                echo "<script>alert('Registration successful. Please login.'); window.location.href = 'login.php';</script>";
                exit();
            }
        } catch (mysqli_sql_exception $e) {
            // Handle database errors
            echo "<script>alert('Failed to insert data into the database: " . $e->getMessage() . "'); window.location.href = 'registration.php';</script>";
        }
    }

    // Display errors and redirect back to registration page
    if (!empty($errors)) {
        echo "<script>alert('" . implode("\\n", $errors) . "'); window.location.href = 'registration.php';</script>";
    }
}
?>
