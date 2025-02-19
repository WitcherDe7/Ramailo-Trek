<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ramailotrek";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the content type to JSON
header('Content-Type: application/json');

// Function to get data based on destination name and id
function getData($conn, $destinationId) {
    $sql = "SELECT * FROM destinations WHERE DestinationID = ? OR Name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $destinationId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $data = array();

        // Fetch rows and add to the data array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Output the JSON data
        echo json_encode($data);
    } else {
        // No results
        echo json_encode(array('message' => 'No records found'));
    }

    $stmt->close();
}

// Check if destinationId and destinationName are provided in the URL
if (isset($_GET['DestinationID'])) {
    $destinationId = $_GET['DestinationID'];

    // Call the getter function
    getData($conn, $destinationId);
} else {
    // If no parameters are provided, return all data
    $sql = "SELECT * FROM destinations";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array();

        // Fetch rows and add to the data array
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Output the JSON data
        echo json_encode($data);
    } else {
        // No results
        echo json_encode(array('message' => 'No records found'));
    }
}

// Close the database connection
$conn->close();
?>
