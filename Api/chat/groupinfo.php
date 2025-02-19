<?php
include '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $sql = "SELECT * from groups";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display the list of groups as links
        while ($row = $result->fetch_assoc()) {
            $groups[] = $row;
        }
        echo json_encode($groups);
    } else {
        echo 'You are not a member of any group.';
    }
}
?>
