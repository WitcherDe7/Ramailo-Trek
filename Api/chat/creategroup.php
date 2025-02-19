<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'group_name' field is set in the POST data
    if (isset($_POST['group_name'])) {
        // Sanitize the input
        $group_name = htmlspecialchars($_POST['group_name']);

        // Now you can use $group_name for further processing, such as inserting into the database

        // Example: Insert into the database (replace with your actual database logic)
        include '../../config/db.php'; // Include your database connection file

        $sql = "INSERT INTO groups (GroupName) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $group_name);

        if ($stmt->execute()) {
            echo "Group created successfully!";
        } else {
            echo "Error creating group: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        // Handle the case when 'group_name' is not set
        echo "Group name not provided.";
    }
} else {
    // Handle the case when the form is not submitted
    echo "Form not submitted.";
}

?>