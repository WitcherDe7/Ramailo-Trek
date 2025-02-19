<?php
include 'controllers/authController.php';
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['id']);
	unset($_SESSION['username']);
	unset($_SESSION['email']);
	unset($_SESSION['verify']);
	header("location: login.php");
}else{
	echo "404 PAGE NOT FOUND!";
	// header('location: index.php');
}