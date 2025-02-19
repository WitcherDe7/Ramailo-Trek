<?php
// Set up database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ramailotrek";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle CORS (Cross-Origin Resource Sharing) if needed
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviewID = $_POST['ReviewID'];
    $userID = $_POST['UserID'];
    $reason = $_POST['Reason'];

    $sql = "INSERT INTO fakereviews (ReviewID, UserID, Reason) VALUES ('$reviewID', '$userID', '$reason')";
    $result = $conn->query($sql);

    if ($result) {
        echo json_encode(array("message" => "Fake review added successfully."));
    } else {
        echo json_encode(array("error" => "Error adding fake review: " . $conn->error));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve all fake reviews
    $sql = "SELECT fakereviews.*, Users.UserName
        FROM fakereviews
        INNER JOIN Users ON fakereviews.UserID = Users.UserID";
    $result = $conn->query($sql);

    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    echo json_encode($rows);
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT' || $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $requestData);
    $fakeReviewID = $requestData['FakeReviewID'];

    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // Update a fake review
        $reviewID = $requestData['ReviewID'];
        $userID = $requestData['UserID'];
        $reason = $requestData['Reason'];

        $sql = "UPDATE fakereviews SET ReviewID='$reviewID', UserID='$userID', Reason='$reason' WHERE FakeReviewID='$fakeReviewID'";
        $result = $conn->query($sql);

        if ($result) {
            echo json_encode(array("message" => "Fake review updated successfully."));
        } else {
            echo json_encode(array("error" => "Error updating fake review: " . $conn->error));
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        // Delete a fake review
        $sql = "DELETE FROM fakereviews WHERE FakeReviewID='$fakeReviewID'";
        $result = $conn->query($sql);

        if ($result) {
            echo json_encode(array("message" => "Fake review deleted successfully."));
        } else {
            echo json_encode(array("error" => "Error deleting fake review: " . $conn->error));
        }
    }
}

$conn->close();
?>
