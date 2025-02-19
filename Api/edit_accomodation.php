<?php
// Sample database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ramailotrek";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch accommodation data based on ID
function getAccommodationData($id) {
    global $conn;

    $id = $conn->real_escape_string($id);

    $sql = "SELECT * FROM accommodations WHERE AccommodationID = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

// Function to update accommodation data
function updateAccommodationData($id, $name, $description, $price, $destinationID) {
    global $conn;

    $id = $conn->real_escape_string($id);
    $name = $conn->real_escape_string($name);
    $description = $conn->real_escape_string($description);
    $price = $conn->real_escape_string($price);
    $destinationID = $conn->real_escape_string($destinationID);

    $sql = "UPDATE accomodations 
            SET Name = '$name', 
                Description = '$description', 
                Price = '$price', 
                DestinationID = '$destinationID'
            WHERE AccommodationID = '$id'";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// API endpoint
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $accommodationData = getAccommodationData($id);

    // Check if accommodation data is found
    if ($accommodationData !== false) {
        // Set the response content type to JSON
        header('Content-Type: application/json');
        
        // Output the JSON-encoded accommodation data
        echo json_encode($accommodationData);
    } else {
        // Return a 404 Not Found response if accommodation data is not found
        http_response_code(404);
        echo json_encode(['error' => 'Accommodation not found']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if POST data is present
    $postData = json_decode(file_get_contents('php://input'), true);

    // Check if required fields are present in the POST data
    if (isset($postData['AccommodationID']) && isset($postData['Name']) && isset($postData['Description']) && isset($postData['ImageURL']) && isset($postData['Price']) && isset($postData['DestinationID'])) {
        $id = $postData['AccommodationID'];
        $name = $postData['Name'];
        $description = $postData['Description'];
        $imageURL = $postData['ImageURL'];
        $price = $postData['Price'];
        $destinationID = $postData['DestinationID'];

        // Update accommodation data
        if (updateAccommodationData($id, $name, $description, $imageURL, $price, $destinationID)) {
            // Set the response content type to JSON
            header('Content-Type: application/json');
            
            // Output a success message
            echo json_encode(['success' => 'Accommodation updated successfully']);
        } else {
            // Return a 500 Internal Server Error response if update fails
            http_response_code(500);
            echo json_encode(['error' => 'Failed to update accommodation']);
        }
    } else {
        // Return a 400 Bad Request response for invalid data
        http_response_code(400);
        echo json_encode(['error' => 'Invalid request data']);
    }
} else {
    // Return a 400 Bad Request response for other invalid requests
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}

// Close the database connection
$conn->close();
?>
