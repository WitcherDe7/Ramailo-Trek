<?php

// Connect to your database (replace these parameters with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ramailotrek";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to get the top 3 destinations with the highest reviews
$sql = "SELECT d.Name, AVG(r.Rating) AS AvgRating, COUNT(r.ReviewID) AS ReviewCount
        FROM reviews r
        JOIN destinations d ON r.DestinationID = d.DestinationID
        GROUP BY r.DestinationID, d.Name
        ORDER BY AvgRating DESC, ReviewCount DESC
        LIMIT 3";

$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    $topDestinations = array();

    // Fetch each row and add it to the result array
    while ($row = $result->fetch_assoc()) {
        $topDestinations[] = $row;
    }

    // Convert the result to JSON and echo it
    header('Content-Type: application/json');
    echo json_encode($topDestinations);
} else {
    // If no results, return an empty array
    echo json_encode([]);
}

// Close the database connection
$conn->close();

?>
