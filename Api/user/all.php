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

// Step 2: Write the SQL query to select users except those with the role "admin"
$sql = "SELECT UserID, ImageURL, Username, Email, Country, Role FROM users WHERE role != 'admin'";

// Step 3: Execute the query
$result = $conn->query($sql);

// Step 4: Return the results as JSON
$users = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    echo json_encode($users);
} else {
    echo json_encode(array("message" => "No users found."));
}

// Close connection
$conn->close();
?>
