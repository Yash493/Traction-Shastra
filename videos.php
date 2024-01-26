<!-- videos.php -->

<?php
include("database.php");

// Fetch the list of videos from the database
$sql = "SELECT * FROM uploads";
$result = $conn->query($sql);

// Check if there are any videos
if ($result->num_rows > 0) {
    $videos = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $videos = [];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
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
            color: #333;
        }

        .video-dropdown {
            margin-top: 20px;
        }

        select {
            padding: 10px;
            font-size: 16px;
        }

        button {
            margin-top: 10px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Video List</h1>

    <div class="video-dropdown">
        <label for="videoSelect">Select a video:</label>
        <select id="videoSelect">
            <option value="">Select a video</option>
            <?php foreach ($videos as $video): ?>
                <option value="<?php echo $video['id']; ?>"><?php echo $video['filename']; ?></option>
            <?php endforeach; ?>
        </select>
        <button onclick="watchSelectedVideo()">Watch Video</button>
    </div>


    <button onclick="logout()">Logout</button>

    <script>
        function watchSelectedVideo() {
            var selectedVideoId = document.getElementById('videoSelect').value;

            if (selectedVideoId !== '') {
                // Redirect to the watch page for the selected video
                window.location.href = `watch.php?id=${selectedVideoId}`;
            }
        }

        
        function logout() {
            // Redirect to index.php when logout button is clicked
            window.location.href = 'index.php';
        }

    </script>
</body>
</html>
