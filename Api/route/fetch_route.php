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

$did = $_GET['DestinationID'];

$sql = "SELECT coordinates FROM routes WHERE DestinationID = '$did'";
$result = $conn->query($sql);

// Check if there are any rows
$coordinates = [];
if ($result->num_rows > 0) {
    // Fetch each row and add coordinates to the array
    while($row = $result->fetch_assoc()) {
        $coordinates = json_decode($row["coordinates"], true);
    }
}

// Close connection
$conn->close();

// Return coordinates as JSON
header('Content-Type: application/json');
echo json_encode($coordinates);
?>
