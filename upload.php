<?php
include("database.php");

$message = ""; // Variable to store upload status message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "uploads/";

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $file = $_FILES['file'];

    $filename = basename($file['name']);
    $filepath = $uploadDir . $filename;

    if (move_uploaded_file($file['tmp_name'], $filepath)) {
        // Use a prepared statement to avoid SQL injection
        $sql = "INSERT INTO uploads (filename, filepath) VALUES (?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $filename, $filepath);

        if ($stmt->execute()) {
            $message = "Video uploaded successfully!";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $message = "Error uploading file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drag & Drop or Browse: Video Upload</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        
        .watch-button-container {
            text-align: center;
            margin-top: 20px;
        }

        .watch-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .drag-area {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="drag-area" id="dragArea">
        <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
        <header>Drag & Drop or Browse to Upload Video</header>
        <span>OR</span>
        <button id="browseBtn">Browse Video</button>
        <input type="file" id="file" accept="video/*" hidden>
        <?php
       
        echo "<p>$message</p>";
        ?>
    </div>

    <!-- "Watch Video" button -->
    <div class="watch-button-container">
    <a href="videos.php" class="watch-button">Watch Video</a>

    </div>

    <script src="script.js"></script>
</body>
</html>
