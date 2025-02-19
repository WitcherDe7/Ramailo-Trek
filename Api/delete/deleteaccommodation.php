<?php
// Configure database connection
$servername = "localhost"; // or your database server
$username = "root"; // your DB username
$password = ""; // your DB password
$dbname = "ramailotrek"; // your DB name

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    http_response_code(500); // Internal Server Error
    die("Connection failed: " . $conn->connect_error);
}

// Only accept DELETE requests
if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405); // Method Not Allowed
    die("Method not allowed");
}

// Get the input data (assuming it's in JSON format)
$data = json_decode(file_get_contents("php://input"), true);

// Validate the input data
if (!isset($data['accommodationId']) || !is_numeric($data['accommodationId'])) {
    http_response_code(400); // Bad Request
    die("Invalid input");
}

$accommodationId = $data['accommodationId'];

// Prepare a SQL DELETE query
$stmt = $conn->prepare("DELETE FROM Accommodations WHERE AccommodationID = ?");
$stmt->bind_param("i", $accommodationId);

// Execute the query
if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        http_response_code(200); // OK
        echo json_encode(["message" => "Accommodation deleted successfully"]);
    } else {
        http_response_code(404); // Not Found
        echo json_encode(["message" => "Accommodation not found"]);
    }
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(["message" => "Error deleting accommodation"]);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
