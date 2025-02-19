<?php
// Replace these variables with your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ramailotrek";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $destination = $_POST['destinationSelect'];
    $accommodationName = $_POST['accomodationname'];
    $accommodationPrice = $_POST['accomodationprice'];
    $accommodationDesc = $_POST['accomodationdesc'];

    // Perform SQL insert
    $sql = "INSERT INTO accommodations (DestinationID, Name, Price, Description) VALUES ('$destination', '$accommodationName', '$accommodationPrice', '$accommodationDesc')";

    if ($conn->query($sql) === TRUE) {
        echo "s";
    } else {
        echo "e";
    }
}

// Close the database connection
$conn->close();
?>
