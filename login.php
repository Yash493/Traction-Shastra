<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    include("database.php");

   
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash the password (use a secure hashing algorithm)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO login (username, password) VALUES ('$username', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        // Store user information in session
        $_SESSION["username"] = $username;

        header("Location: upload.php");
        exit();
    } else {
       
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

   
    $conn->close();
}
?>
