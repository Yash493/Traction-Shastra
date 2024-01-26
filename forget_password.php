<?php
// Include your database connection file
include("database.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input value from the form
    $email = $_POST["email"];

    // Check if the email exists in the database
    $sql = "SELECT * FROM login WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(32));

        // Store the token in the database for the user
        $sqlUpdateToken = "UPDATE users SET reset_token = '$token' WHERE email = '$email'";
        $conn->query($sqlUpdateToken);

        // Send an email with the reset link
        $resetLink = "http://yourdomain.com/reset_password.php?token=$token";
        $subject = "Password Reset";
        $message = "Click the following link to reset your password: $resetLink";

        // Replace your email and name below
        $headers = "From: Your Name yashgaikwad493@gmail.com>";

        mail($email, $subject, $message, $headers);

        // Display a success message
        echo "Password reset link sent to your email. Please check your inbox.";

    } else {
        // Display an error message
        echo "Email not found in our records.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Forgot Password</title>
</head>
<body>
    <div class="forgot-password-container">
        <form action="forget_password.php" method="post">
            <h2>Forgot Password</h2>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <div class="form-bottom">
                <button type="submit">Reset Password</button>
                <a href="index.php">Back to Login</a>
            </div>
        </form>
    </div>
</body>
</html>
