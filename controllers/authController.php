<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require_once './sendEmails.php';
session_start();

require_once './config/db.php';


$errors = array();
$username = "";
$email = "";


// SIGN UP USER
if (isset($_POST['signup-btn'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username required';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email required';
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid Email';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }

    $img = 'profile/profile.png';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $token = rand(1, 999999); // generate unique token
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //encrypt password

    // Check if Username already exists
    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['username'] = "Username already exists";
    }

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO users SET Username=?, Email=?, Token=?, Password=?, ImageURL=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssss', $username, $email, $token, $password, $img);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            //  send verification email to user
            sendVerificationEmail($email, $token);
            $_SESSION['email'] = $email;
            header('location: reg-success.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    }
}


//Login

// Login
if (isset($_POST['loginButton'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // encrypt password

    if (empty($_POST['username']) || empty($_POST['password'])) {
        $errors['error'] = 'Empty field';
    }

    if (count($errors) === 0) {
        $sql = "SELECT * FROM users WHERE Email=? OR Username=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if user exists
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify the password
            if ($user !== null && password_verify($password, $user['Password'])) {
                // Login success
                $_SESSION['id'] = $user['UserID'];
                $_SESSION['username'] = $user['Username'];
                $_SESSION['email'] = $user['Email'];
                $_SESSION['verified'] = $user['Verified'];
                $_SESSION['role'] = $user['Role'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';

                if ($_SESSION['role'] == "admin") {
                    header('location: index.php');
                }else{
                    header('location: userdash.php');
                }
                exit();

            } else {
                $errors['login_fail'] = "Wrong username & password";
            }
        } else {
            $errors['login_fail'] = "User not found";
        }
    }
}




if (isset($_POST['forgotpass-btn'])) {

    $email = $_POST['email'];

    if (empty($email) || $email =="") {
        $errors['email'] = 'Required Field is missing';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid Email';
    }

    // Check if email already exists
    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if (!$userCount > 0) {
        $errors['email'] = "User not found";
    }

    if (count($errors) == 0) {
        

    }

}






//Edit Profile
if (isset($_POST['edit-profile-btn'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];

    if (empty($username)) {
        $errors['username'] = 'Can not proceed blank';
    }

    if (empty($email)) {
        $errors['email'] = 'Can not proceed blank';
    }


    if (count($errors) == 0) {
        $token = rand(1, 999999); 
        // generate unique token
        $sql = "UPDATE users SET username='$username', email='$email', token='$token' WHERE id=".$_SESSION['id'];

        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = 'Profile Edited';
            $_SESSION['type'] = 'alert-success';

        } else {

            return "Error updating record: " . $conn->error;
        }

        header("location: index.php");

    }else{
        $errors['message'] = 'error occured';
    }

}

//Change password
if (isset($_POST['change-psw'])) {
    $newpassword = $_POST['newpassword'];
    $confpassword = $_POST['confpassword'];

    if ($newpassword != $confpassword) {
        $errors['password'] = 'incorrect password';
    }
    if (empty($newpassword)) {
        $errors['password'] = 'Can not proceed empty';
    }

    if (count($errors) == 0) {
        $newpassword = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password='$newpassword' WHERE id=".$_SESSION['id'];
            
        if ($conn->query($sql) === TRUE) {
            $_SESSION['message'] = 'Password Changed';
            $_SESSION['type'] = 'alert-success';

        } else {

            $conn->error;
        }

        header("location: index.php");
        
    }
}

//UPload PHOTO

if(isset($_POST['but_upload'])){
 
  $name = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);
  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
     $query = "UPDATE users SET image='$name' WHERE id=".$_SESSION['id'];
     mysqli_query($conn,$query);
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

  }

  $_SESSION['message'] = 'profile picture Changed';
  $_SESSION['type'] = 'alert-success';

  header('location: index.php');
 
}



?>