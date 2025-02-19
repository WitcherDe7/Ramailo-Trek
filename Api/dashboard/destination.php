<?php
// Database connection
$query = "SELECT COUNT(*) AS total_destinations FROM destinations";
    $result = $conn->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $response = ['total_destinations' => $row['total_destinations']];
    } 
