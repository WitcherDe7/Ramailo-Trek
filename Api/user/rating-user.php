<?php
// Assuming you have already connected to your database
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'ramailotrek';

// Create a connection
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// API endpoint: GET /api/reviews?userid=1
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userId = $_GET['userid']; // Get the user ID from the query parameter

    $sql = "SELECT r.ReviewID, d.Name, d.ImageURL, r.UserID, r.Rating, r.Feedback, r.DatePosted
        FROM reviews r
        INNER JOIN destinations d ON r.DestinationID = d.DestinationID
        WHERE r.UserID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $reviews = [];
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }
        // Return reviews as JSON
        header('Content-Type: application/json');
        echo json_encode($reviews);
    } else {
        // No reviews found for the specified user
        echo "No reviews available for User ID $userId.";
    }
} else {
    // Invalid request method
    http_response_code(405); // Method Not Allowed
    echo "Invalid request method.";
}

// Close the connection
$conn->close();
?>
