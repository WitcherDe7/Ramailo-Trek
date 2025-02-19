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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $group_name = $_POST['group_name'];

    $sql = "INSERT INTO groups (GroupName) VALUES ('$group_name')";

    if ($conn->query($sql) === TRUE) {
        $group_id = $conn->insert_id;

        $user_id = $_SESSION['user_id'];
        $sql = "INSERT INTO groupmembers (GroupID, UserID) VALUES ('$group_id', '$user_id')";
        $conn->query($sql);

        echo "Group created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $group_id = $_GET['group_id'];

    $sql = "SELECT messages.*, users.Username, users.ImageURL
            FROM messages 
            INNER JOIN users ON messages.UserID = users.UserID
            INNER JOIN groupmembers ON users.UserID = groupmembers.UserID
            WHERE messages.GroupID = '$group_id' AND groupmembers.GroupID = '$group_id'
            ORDER BY messages.timestamp ASC";

    $result = $conn->query($sql);

    $messages = [];

    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    echo json_encode($messages);
}



?>