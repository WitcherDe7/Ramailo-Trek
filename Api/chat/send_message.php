<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    echo json_encode(array('success' => false, 'message' => 'User not logged in'));
    exit();
}

// Check if the required parameters are set
if (!isset($_POST['group_id']) || !isset($_POST['user_id']) || !isset($_POST['message'])) {
    echo json_encode(array('success' => false, 'message' => 'Incomplete parameters'));
    exit();
}

// Get the parameters
$groupId = $_POST['group_id'];
$userId = $_POST['user_id'];
$message = $_POST['message'];

// Validate the message (you can add more validation if needed)
if (empty($message)) {
    echo json_encode(array('success' => false, 'message' => 'Message cannot be empty'));
    exit();
}

// Save the message to the database
try {
    // Using your existing database connection
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPass = '';
    $dbName = 'ramailotrek';

    // Create a connection
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    // Check connection
    if ($conn->connect_error) {
        echo json_encode(array('success' => false, 'message' => 'Database connection failed'));
        exit();
    }

    // Insert the message into the database
    $stmt = $conn->prepare("INSERT INTO messages (GroupID, UserID, message) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $groupId, $userId, $message);
    $stmt->execute();

    // Get the inserted message ID
    $messageId = $stmt->insert_id;

    // Fetch the inserted message from the database (optional)
    $selectStmt = $conn->prepare("SELECT * FROM messages WHERE MessageID = ?");
    $selectStmt->bind_param("i", $messageId);
    $selectStmt->execute();
    $result = $selectStmt->get_result();
    $insertedMessage = $result->fetch_assoc();

    $stmt->close();
    $selectStmt->close();
    $conn->close();

    echo json_encode(array('success' => true, 'message' => $insertedMessage));
} catch (Exception $e) {
    echo json_encode(array('success' => false, 'message' => 'Error: ' . $e->getMessage()));
    exit();
}
?>
