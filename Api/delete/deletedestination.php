<?php
// Connect to the database
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'ramailotrek';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check for connection error
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit();
}

// Check if the request is POST and contains the expected data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        $destinationId = intval($_POST['destinationId']); // Convert to integer

        // Prepare the delete query with parameterized input
        $stmt = $conn->prepare("DELETE FROM destinations WHERE DestinationID = ?");
        $stmt->bind_param('i', $destinationId); // 'i' for integer
        
        // Execute the query and check for success
        if ($stmt->execute() && $stmt->affected_rows > 0) {
            echo json_encode(['status' => 'success', 'message' => 'Destination deleted']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete destination']);
        }

        $stmt->close(); // Clean up the prepared statement
    }
}

$conn->close(); // Close the database connection
?>
