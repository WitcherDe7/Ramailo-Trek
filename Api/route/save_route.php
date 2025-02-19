<?php
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

// Get the route data from the POST request
$routeData = json_decode(file_get_contents("php://input"), true);

// Prepare and bind the INSERT statement
$stmt = $conn->prepare("INSERT INTO routes (coordinates, DestinationID) VALUES (?, ?)");
$stmt->bind_param("ss", $coordinates, $destinationID);

// Set parameters and execute
$coordinates = json_encode($routeData['coordinates']);
$destinationID = $routeData['destinationid'];
$stmt->execute();

// Close statement and connection
$stmt->close();
$conn->close();

// Return success response
echo json_encode(array('success' => true));
?>
