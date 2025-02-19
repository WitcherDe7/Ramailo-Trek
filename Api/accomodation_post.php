<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ramailotrek";
$errors = array();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['publish'])) {


    $did = $conn->real_escape_string($_POST['did']);
    $name = $conn->real_escape_string($_POST['name']);
    $price = $conn->real_escape_string($_POST['price']);
    $desc = $conn->real_escape_string($_POST['desc']);

    $query = "INSERT INTO accommodations SET Name=?, Description=?, Price=?, DestinationID=?";
    $stmt = $conn->prepare($query);


    $stmt->bind_param('sssi', $name, $desc, $price, $did);

    if ($stmt->execute()) {
        echo "s"; // Success
    } else {
        echo "e"; // Database error
    }


    $stmt->close();
    $conn->close();
}


?>
