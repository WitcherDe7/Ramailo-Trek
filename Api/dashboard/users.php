<?php
// Database connection
$query = "SELECT COUNT(*) AS total_users FROM users";
    $result = $conn->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $response = ['total_users' => $row['total_users']];
    } 

    $q = "SELECT COUNT(*) AS total_destinations FROM destinations";
    $result2 = $conn->query($q);

    if ($result2) {
        $row2 = $result2->fetch_assoc();
        $response2 = ['total_destinations' => $row2['total_destinations']];
    } 

    $r = "SELECT COUNT(*) AS total_rating FROM reviews";
    $result3 = $conn->query($r);

    if ($result3) {
        $row3 = $result3->fetch_assoc();
        $response3 = ['total_rating' => $row3['total_rating']];
    } 

