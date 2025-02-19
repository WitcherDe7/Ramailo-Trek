<?php

$mysqli = new mysqli("localhost", "root", "", "ramailotrek");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$destinationID = isset($_GET['destinationID']) ? intval($_GET['destinationID']) : null;

$query = "SELECT reviews.*, users.UserName, users.ImageURL
          FROM reviews 
          INNER JOIN users ON reviews.UserID = users.UserID
          WHERE reviews.DestinationID = ?";

$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $destinationID);
$stmt->execute();
$result = $stmt->get_result();
$response = array();

while ($row = $result->fetch_assoc()) {
    $response[] = array(
        'reviewID' => $row['ReviewID'],
        'userName' => $row['UserName'],
        'rating' => $row['Rating'],
        'feedback' => $row['Feedback'],
        'datePosted' => $row['DatePosted'],
        'reviewerid' => $row['UserID'],
        'image' => $row['ImageURL']
        
    );
}


$stmt->close();
$mysqli->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
