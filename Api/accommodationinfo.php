<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config/db.php';

if (isset($_GET['DestinationID'])) {
    // Get the destination ID from the URL parameter
    $specificDestinationId = $_GET['DestinationID'];

    // Prepare and execute SQL query
    $sql = "SELECT a.Name AS AccommodationName, a.Description, a.Price
        FROM accommodations a
        JOIN destinations d ON a.DestinationID = d.DestinationID
        WHERE d.DestinationID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $specificDestinationId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Fetch data and store in $data array
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Output JSON
        echo json_encode($data);
    } else {
        // No matching records
        echo json_encode(array("message" => "No matching records found"));
    }

    // Close prepared statement
    $stmt->close();
} else {
    // Missing DestinationID parameter
    echo json_encode(array("message" => "DestinationID parameter is missing"));
}

// Close the database connection
mysqli_close($conn);
?>
