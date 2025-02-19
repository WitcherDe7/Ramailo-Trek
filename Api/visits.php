<?php
// Connect to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$database = "ramailotrek";

// Check if user ID is provided via GET method
if(isset($_GET['UserID'])) {
    $userID = $_GET['UserID'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to get the destination with the highest visit count for the specified user
    $sql = "SELECT d.Name, COUNT(*) AS VisitCount 
            FROM visitcounts v
            INNER JOIN destinations d ON v.DestinationID = d.DestinationID
            WHERE v.UserID = $userID 
            GROUP BY v.DestinationID 
            ORDER BY VisitCount DESC 
            LIMIT 1";
    $result = $conn->query($sql);

    $visitSummary = array();

    if ($result->num_rows > 0) {
        // Fetch data
        $row = $result->fetch_assoc();
        $destinationName = $row["Name"];
        $visitCount = $row["VisitCount"];
        
        // Construct visit summary
        $visitSummary = array("DestinationName" => $destinationName, "VisitCount" => $visitCount);
    }

    // Close connection
    $conn->close();

    // Output visit summary in JSON format
    header('Content-Type: application/json');
    echo json_encode($visitSummary, JSON_PRETTY_PRINT);
} else {
    echo "No UserID provided.";
}
?>
