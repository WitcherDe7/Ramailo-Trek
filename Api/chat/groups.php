<?php
include '../../config/db.php';
include '../../fetchdata.php';

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $sql = "SELECT groups.GroupID, groups.GroupName
            FROM groups
            INNER JOIN groupmembers ON groups.GroupID = groupmembers.GroupID
            WHERE groupmembers.UserID = '$user_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display the list of groups as links
        while ($row = $result->fetch_assoc()) {
            echo '<a href="#" class="group-link" data-group-id="' . $row['id'] . '">' . $row['group_name'] . '</a><br>';
        }
    } else {
        echo 'You are not a member of any group.';
    }
} else {
    echo 'User not authenticated.';
}
?>
