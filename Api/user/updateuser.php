<?php
// update_user.php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $userId = $_POST['editUserId'];
    $username = $_POST['editUsername'];
    $email = $_POST['editEmail'];
    $role = $_POST['editRole'];
    $country = $_POST['editCountry'];

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

    // Update user information
    $sql = "UPDATE users SET Username='$username', Email='$email', Role='$role', Country='$country' WHERE UserID=$userId";

    if ($conn->query($sql) === TRUE) {
        // If update is successful, send success response
        echo json_encode(array("status" => "success"));
    } else {
        // If there's an error, send error response
        echo json_encode(array("status" => "error", "message" => "Error updating record: " . $conn->error));
    }

    $conn->close();
} else {
    // If the request method is not POST, send an error response
    echo json_encode(array("status" => "error", "message" => "Method not allowed"));
}
?>
