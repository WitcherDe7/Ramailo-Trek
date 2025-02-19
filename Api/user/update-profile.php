<?php

$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'ramailotrek';

// Establish database connection
$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



// Check if the 'update' button is clicked
if(isset($_POST['update'])) {
    // Get the values from the form
    $uid = $_POST['userid'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $country = $_POST['country'];

    // Update the user's information in the database
    $query = "UPDATE users SET Username='$username', Email='$email', Country='$country' WHERE UserID = ?";

    // Replace $user_id_value with the actual user ID you are updating

    $statement = $conn->prepare($query);
    $statement->bind_param('i', $uid); // 'i' represents integer, adjust if user_id is not an integer

    // Execute the update query
    if ($statement->execute()) {
        echo "User information updated successfully.";
    } else {
        echo "Error updating user information.";
    }

    // Close the statement
    $statement->close();
}

// Close the database connection
$conn->close();
?>
