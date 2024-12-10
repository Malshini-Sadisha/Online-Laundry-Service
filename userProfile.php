<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit;
}

// Retrieve the user ID from the session
$userID = $_SESSION['user_id'];

// Include the config file for database connection
include('config.php');

// Retrieve the user data from the database based on the user ID
$stmt = $conn->prepare("SELECT userName, userEmail, userPassword, userContact FROM users WHERE userID = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();
$stmt->close();

// Handle form submission for updating user data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the delete button is clicked
    if (isset($_POST['delete'])) {
        // Delete the user from the database based on the $userID
        $stmt = $conn->prepare("DELETE FROM users WHERE userID = ?");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $stmt->close();

        // Destroy the session and redirect to the login page
        session_destroy();
        header("Location: login.php");
        exit;
    }

    // Check if the update button is clicked
    if (isset($_POST['update'])) {
        // Retrieve the updated user data from the form
        $updatedName = $_POST['name'];
        $updatedEmail = $_POST['email'];
        $updatedContact = $_POST['contact'];

        // Update the user data in the database
        $stmt = $conn->prepare("UPDATE users SET userName = ?, userEmail = ?, userContact = ? WHERE userID = ?");
        $stmt->bind_param("sssi", $updatedName, $updatedEmail, $updatedContact, $userID);
        $stmt->execute();
        $stmt->close();

        echo "<script>alert('User Data Updated Successfully!');</script>";
    }

    // Check if the change password button is clicked
    if (isset($_POST['change_password'])) {
        // Retrieve the old password, new password, and confirm password from the form
        $oldPassword = $_POST['old_password'];
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        // Verify the old password before proceeding
        if ($oldPassword === $userData['userPassword']) {
            // Check if the new password and confirm password match
            if ($newPassword === $confirmPassword) {
                // Update the user's password in the database
                $stmt = $conn->prepare("UPDATE users SET userPassword = ? WHERE userID = ?");
                $stmt->bind_param("si", $newPassword, $userID);
                $stmt->execute();
                $stmt->close();

                echo "<script>alert('Password Changed Successfully!');</script>";
            } else {
                echo "<script>alert('New Password and Confirm Password do not match!');</script>";
            }
        } else {
            echo "<script>alert('Invalid Existing Password!');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/userProfile.css">
  <title>User Profile</title>
</head>
<body>
    <div class="row">
        <div class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="Home.html">HOME</a></li>
                <li><a href="contact.html">CONTACT US 2</a></li>
                <li><a href="aboutUS.html">ABOUT US</a></li>
                <li><a href="feedback.html">FEEDBACK</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="content">
            <h1>User Profile</h1>

            <div class="forms-container">
                <div>
                    <h2>Edit User Details</h2>
                    <form method="POST" action="">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" value="<?php echo $userData['userName']; ?>" required><br>

                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" value="<?php echo $userData['userEmail']; ?>" required><br>

                        <label for="contact">Contact:</label>
                        <input type="text" name="contact" id="contact" value="<?php echo $userData['userContact']; ?>" required><br>

                        <input type="submit" name="update" value="Update">
                    </form>
                </div>

                <div>
                    <h2>Change Password</h2>
                    <form method="POST" action="">
                        <label for="old_password">Existing Password:</label>
                        <input type="password" name="old_password" id="old_password" required><br>

                        <label for="new_password">New Password:</label>
                        <input type="password" name="new_password" id="new_password" required><br>

                        <label for="confirm_password">Confirm New Password:</label>
                        <input type="password" name="confirm_password" id="confirm_password" required><br>

                        <input type="submit" name="change_password" value="Change Password">
                    </form>
                </div>
            </div>

            <div class="delete-button">
                <form method="POST" action="">
                    <input type="submit" name="delete" value="Delete Account">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
