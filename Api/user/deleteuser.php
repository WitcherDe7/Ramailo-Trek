<?php
// delete_user.php

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user ID from the POST data
    $userId = $_POST['userId'];

    // Perform the deletion operation (replace this with your actual deletion logic)
    // Example: Delete user from database using SQL (assuming you're using MySQL)
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = 'ramailotrek';
    // Create connection
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete user
    $sql = "DELETE FROM users WHERE UserID=$userId";

    if ($conn->query($sql) === TRUE) {
        // If deletion is successful, send success response
        echo json_encode(array("status" => "success"));
    } else {
        // If there's an error, send error response
        echo json_encode(array("status" => "error", "message" => "Error deleting record: " . $conn->error));
    }

    $conn->close();
} else {
    // If the request method is not POST, send an error response
    echo json_encode(array("status" => "error", "message" => "Method not allowed"));
}
?>
