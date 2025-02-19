<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: login.php');
}

$sql = "SELECT * FROM users WHERE UserID=".$_SESSION['id'];
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id = $row['UserID'];
        $username = $row['Username'];
        $email = $row['Email'];
        $verified = $row['Verified'];
        $token = $row['Token'];
        $country = $row['Country'];
        $role = $row['Role'];
        $img = $row['ImageURL'];



    }
} else {

}

?>