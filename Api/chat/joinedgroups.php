<?php
// Assuming you have already connected to your database

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


if (isset($_GET['id'])) {
    $userId = $_GET['id']; 

        // Fetch user's joined groups from the database
        $sql = "SELECT * FROM groupmembers JOIN groups ON groupmembers.groupid = groups.GroupID WHERE groupmembers.userid = $userId";
        $result = $conn->query($sql);

        $groups = array();

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $groups[] = $row;
            }
        }
}

// Close database connection
$conn->close();

// Return groups data as JSON
echo json_encode($groups);
?>
