<?php

// Replace these values with your actual database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'ramailotrek';

// Create a connection to the database
$mysqli = new mysqli($host, $username, $password, $database);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Query to retrieve users' names and the total number of reviews by each user
$query = "
    SELECT
        u.UserID,
        u.Username,
        COUNT(r.ReviewID) AS TotalReviews
    FROM
        users u
    LEFT JOIN
        fakereviews fr ON u.UserID = fr.UserID
    LEFT JOIN
        reviews r ON fr.ReviewID = r.ReviewID
    GROUP BY
        u.UserID, u.Username
    ORDER BY
        TotalReviews DESC
    LIMIT
        10
";

$result = $mysqli->query($query);

if (!$result) {
    die("Error in the query: " . $mysqli->error);
}

// Fetch the results into an associative array
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the database connection
$mysqli->close();

// Set the response header to JSON
header('Content-Type: application/json');

// Output the JSON response
echo json_encode($data);
