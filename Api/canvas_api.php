<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "ramailotrek";

// Create a connection
$connection = new mysqli($host, $username, $password, $database);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Query to retrieve data
$query = "SELECT Timestamp FROM users";

$result = $connection->query($query);

// Check if the query was successful
if (!$result) {
    die("Error in query: " . $connection->error);
}

// Fetch data and count registrations per month
$registrationCount = [];

while ($row = $result->fetch_assoc()) {
    $monthYear = extractMonthYear($row['Timestamp']);

    if (isset($registrationCount[$monthYear])) {
        $registrationCount[$monthYear]++;
    } else {
        $registrationCount[$monthYear] = 1;
    }
}

// Format the result as JSON
$resultArray = [];

foreach ($registrationCount as $monthYear => $count) {
    $resultArray[] = [
        "month" => $monthYear,
        "count" => $count
    ];
}

// Convert the result to JSON and output
echo json_encode($resultArray, JSON_PRETTY_PRINT);

// Close the database connection
$connection->close();

// Function to extract month and year from timestamp
function extractMonthYear($timestamp) {
    $date = new DateTime($timestamp);
    return $date->format('Y-m');
}

?>
