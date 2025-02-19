<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ramailotrek";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch routes data from the database
$sql = "SELECT r.id, r.coordinates, r.created_at, r.DestinationID, d.Name, d.TrekkingDifficulty, d.Elevation, d.Location
        FROM routes r
        INNER JOIN destinations d ON r.DestinationID = d.DestinationID";
$result = $conn->query($sql);

// Initialize an array to store filtered routes data
$routes = array();

// Check if there are results
if ($result->num_rows > 0) {
    // Loop through each row
    while ($row = $result->fetch_assoc()) {
        $routes[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return routes data as JSON
header('Content-Type: application/json');
echo json_encode($routes);
?>