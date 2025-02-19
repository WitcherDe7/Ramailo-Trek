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

if(isset($_POST['chat'])) {
    // Retrieve data from POST request
    $groupId = $_POST['groupid'];
    $userId = $_POST['userid'];
    
    // Check if user already joined the group
    $checkQuery = "SELECT * FROM groupmembers WHERE groupid = '$groupId' AND userid = '$userId'";
    $result = $conn->query($checkQuery);
    
    if ($result && $result->num_rows > 0) {
        echo "already_joined"; // Sending a response back to JavaScript if the user is already joined
    } else {
        // Insert data into the database
        $sql = "INSERT INTO groupmembers (groupid, userid) VALUES ('$groupId', '$userId')";
        if(mysqli_query($conn, $sql)) {
            echo "success"; // Sending a success response back to JavaScript
        } else {
            echo "error"; // Sending an error response back to JavaScript
        }
    }
} else {
    echo "error"; // Sending an error response back to JavaScript if required parameters are not set
}
?>
