<?php
include("database.php");

// Check if the video ID is present in the URL
if (isset($_GET['id'])) {
    $videoId = $_GET['id'];

    // Prepare a DELETE query to remove the video from the database
    $sql = "DELETE FROM uploads WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $videoId);

    // Execute the query
    if ($stmt->execute()) {
        // Video deleted successfully
        $response = ['success' => true, 'message' => 'Video deleted successfully'];
    } else {
        // Error in deletion
        $response = ['success' => false, 'message' => 'Error deleting video'];
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Video ID not present in the URL
    $response = ['success' => false, 'message' => 'Video ID not provided'];
}

// Close the database connection
$conn->close();

// Set the content type to JSON
header('Content-Type: application/json');

// Output the JSON response
echo json_encode($response);
?>
