<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'ramailotrek';

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT DestinationID, Name FROM destinations";
$result = mysqli_query($conn, $query);

$destinations = array();

while ($row = mysqli_fetch_assoc($result)) {
    $destinations[] = $row;
}

echo json_encode($destinations);
?>