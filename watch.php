<?php
include("database.php");

$videoId = null;


if (isset($_GET['id'])) {
    $videoId = $_GET['id'];

    // Fetch the video details from the database
    $sql = "SELECT * FROM uploads WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $videoId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $video = $result->fetch_assoc();
    } else {
       
        header("Location: 404.php");
        exit();
    }

    $stmt->close();
} else {
   
    header("Location: 404.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Player</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            background-color:#000;
        }

        video {
            width: 80%;
            max-width: 500px;
        }

        .controls {
        margin-top: 20px;
        display: flex;
        justify-content: space-around;
        width: 20%;
    }

    button {
        padding: 10px 15px;
        font-size: 16px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #4CAF50; 
        color: #fff; 
    }

    /* You can customize the colors for each button individually */
    button#backward {
        background-color: #3498db; /* Blue for skip backward */
        color: #fff;
    }

    button#forward {
        background-color: #e74c3c; /* Red for skip forward */
        color: #fff;
    }

    button#delete {
        background-color: #9b59b6; /* Purple for delete */
        color: #fff;
    }
    </style>
</head>
<body>
    <h1>Video Player</h1>

    <?php if ($videoId && isset($video)): ?>
        <video controls>
            <source src="<?php echo $video['filepath']; ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="controls">
    <button id="backward" onclick="skipBackward()">-10s</button>
    <button id="forward" onclick="skipForward()">+10s</button>
    <button id="delete" data-video-id="<?php echo $videoId; ?>" onclick="deleteVideo(this)">Delete Video</button>
</div>

    <?php else: ?>
        <p>Video not found.</p>
    <?php endif; ?>

    <script>
        function skipBackward() {
            document.querySelector('video').currentTime -= 10;
        }

        function skipForward() {
            document.querySelector('video').currentTime += 10;
        }
        function deleteVideo(button) {
    var videoId = button.getAttribute('data-video-id');

    fetch(`delete.php?id=${videoId}`, {
        method: 'GET',
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);

       
        if (data.success) {
            alert('Video deleted successfully');
          
            window.location.href = 'videos.php';
        } else {
            alert('Error deleting video');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
    </script>
</body>
</html>
