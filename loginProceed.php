<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the config file for database connection
    include('config.php');

    // Retrieve form data
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate form data
    $errors = array();

    if (empty($email)) {
        $errors[] = "Email is required";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    }

    // If there are no errors, proceed with login
    if (empty($errors)) {
        try {
            // Prepare the SQL statement
            $stmt = $conn->prepare("SELECT * FROM users WHERE userEmail = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                // For troubleshooting purposes, let's echo the password retrieved from the database
                echo "Password from Database: " . $row['userPassword'] . "<br>";

                if ($password === $row['userPassword']) {
                    // Password is correct, set session and redirect to dashboard or any other page
                    session_start();
                    $_SESSION['user_id'] = $row['userID'];
                    $_SESSION['user_name'] = $row['userName'];
                    header("Location: home.html"); 
                    exit();
                } else {
                    $errors[] = "Invalid password";
                }
            } else {
                $errors[] = "Invalid email";
            }
        } catch (mysqli_sql_exception $e) {
            // Handle database errors
            $errors[] = "Failed to fetch data from the database: " . $e->getMessage();
        }
    }

    // Display errors and redirect back to login page
    if (!empty($errors)) {
        echo "<script>alert('" . implode("\\n", $errors) . "'); window.location.href = 'login.php';</script>";
        exit();
    }
}
?>
