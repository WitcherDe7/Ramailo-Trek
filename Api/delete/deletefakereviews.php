<?php
// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ramailotrek";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the review_id
    $review_id = intval($_POST['review_id']);

    if ($review_id > 0) {
        // SQL query to delete the review
        $sql = "DELETE FROM fakereviews WHERE FakeReviewID = $review_id";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(['status' => 'success', 'message' => 'Review deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete review']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid review ID']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}

?>