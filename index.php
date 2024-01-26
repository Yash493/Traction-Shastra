<?php

include("database.php")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login Page</title>
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    h1 {
        color: #fff; /* Blue color for the header */
        text-align: center;
        font-family: 'Single Day', cursive;
        font-size:50px;
        margin-bottom: 50px; /* Adjust margin as needed */
    }

</style>
</head>
<body>
     <h1>Traction Shastra 📽️</h1>

    <div class="login-container">
        <form action="login.php" method="post">
            <h2>Login</h2>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <div class="form-bottom">
                <button type="submit">Login</button>
               <!-- <a href="forget_password.php">Forgot Password?</a>-->
            </div>
        </form>
    </div>
</body>
</html>
