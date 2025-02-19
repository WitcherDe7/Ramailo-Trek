<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ramailotrek";
$errors = array();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])) {
    // Assuming there is an 'id' parameter indicating the record to update
    $id = $_POST['id'];

    $title = $conn->real_escape_string($_POST['title']);
    $body = $conn->real_escape_string($_POST['description']);
    $lat = $conn->real_escape_string($_POST['lat']);
    $lon = $conn->real_escape_string($_POST['lon']);
    $elevation = $conn->real_escape_string($_POST['elevation']);
    $maxdays = isset($_POST['maxdays']) ? $_POST['maxdays'] : null;
    $difficulty = isset($_POST['difficulty']) ? $_POST['difficulty'] : null;
    $location = $conn->real_escape_string($_POST['location']);

    // Handle file upload
    if (isset($_FILES['image'])) {
        $uploadDir = 'upload/';
        $file = $_FILES['image'];
        $fileName = $uploadDir . time() . '_' . $file['name'];

        if (move_uploaded_file($file['tmp_name'], $fileName)) {
            $query = "UPDATE destinations SET Name=?, Description=?, ImageURL=?, MaximumDays=?, Location=?, Lat=?, Lon=?, Elevation=?, TrekkingDifficulty=? WHERE DestinationID=?";
            $stmt = $conn->prepare($query);

            // Adjust the types in bind_param based on the actual data types of maxdays and difficulty
            $stmt->bind_param('sssssssssi', $title, $body, $fileName, $maxdays, $location, $lat, $lon, $elevation, $difficulty, $id);

            if ($stmt->execute()) {
                echo "s"; // Success
            } else {
                echo "e"; // Database error
            }
        } else {
            echo "f"; // File upload failed
        }
    } else {
        echo "u"; // No file uploaded
    }

    $stmt->close();
    $conn->close();
}
?>
