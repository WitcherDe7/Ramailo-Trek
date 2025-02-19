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
    $group_id = $_POST['group_id'];
    $username = $_POST['username'];

    $sql = "SELECT id FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = $row['id'];

        $sql = "INSERT INTO group_members (group_id, user_id) VALUES ('$group_id', '$user_id')";
        $conn->query($sql);

        echo "Member added successfully";
    } else {
        echo "User not found";
    }
}

?>