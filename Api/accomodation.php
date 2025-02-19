<?php

$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'ramailotrek';

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT a.AccommodationID, a.Name AS AccommodationName, a.Description, a.Price, a.DestinationID, d.Name AS DestinationName
        FROM accommodations a
        JOIN destinations d ON a.DestinationID = d.DestinationID";
$result = $conn->query($sql);

// Convert the result to an associative array
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming you are sending data using POST method

    // Get the destination ID to be deleted
    $destinationId = $_POST['destinationId'];

    // Implement your database delete logic here (using SQL queries or any other method)

    $deleteQuery = "DELETE FROM destinations WHERE DestinationId=$destinationId";
    mysqli_query($connection, $deleteQuery);

    // Redirect back to the page after deleting
    header("Location: view-all-destination.html");
    exit();
}

// Close the database connection
$conn->close();

// Encode the data as JSON and output it
echo json_encode($data);



?>