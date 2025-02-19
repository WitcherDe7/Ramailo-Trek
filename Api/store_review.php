<?php
header("Content-Type: application/json");

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve data from the POST request
    $star = isset($_POST['star']) ? intval($_POST['star']) : null;
    $message = isset($_POST['message']) ? $_POST['message'] : null;
    $userId = isset($_POST['userId']) ? intval($_POST['userId']) : null;
    $destinationId = isset($_POST['destinationid']) ? intval($_POST['destinationid']) : null;

    // Validate input
    if ($star !== null && $message !== null && $userId !== null && $destinationId !== null) {
        // Connect to the database (replace with your database credentials)
        $conn = new mysqli("localhost", "root", "", "ramailotrek");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the SQL query to insert data
        $stmt = $conn->prepare("INSERT INTO reviews (Rating, Feedback, UserID, DestinationID) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("issi", $star, $message, $userId, $destinationId);
        $stmt->execute();

        // Close the statement and connection
        $stmt->close();
        $conn->close();

        // Respond with success
        echo json_encode(['success' => true]);
    } else {
        // Respond with an error if input is invalid
        echo json_encode(['error' => 'Invalid input']);
    }
} else {
    // Respond with an error if the request method is not POST
    echo json_encode(['error' => 'Invalid request method']);
}
?>
