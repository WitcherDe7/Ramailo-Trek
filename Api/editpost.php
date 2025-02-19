<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'ramailotrek';

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['DestinationID'])) {
    $did = mysqli_real_escape_string($conn, $_GET['DestinationID']);

    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM destinations WHERE DestinationID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $did);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $keydata = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $keydata[] = $row;
    }

    if (empty($keydata)) {
        echo json_encode(array("message" => "No data found for the given DestinationID"));
    } else {
        echo json_encode($keydata);
    }

    mysqli_stmt_close($stmt);
} else {
    echo json_encode(array("message" => "DestinationID parameter is missing"));
}

mysqli_close($conn);
?>
