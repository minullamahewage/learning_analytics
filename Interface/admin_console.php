<!DOCTYPE HTML>

<html>
	<head>
		<title>Learning Analytics</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta http-equiv="Content-Language" content="en">
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
		<link rel="icon" href="../assets/graphics/app-icon.png">
		
<?php
		session_start();
require '../User/class.user.php';

$user = new User();
$userid = $_SESSION['userid'];



/*if (!$user->get_session()){
 header("location:../User/login.php");
}*/

if (isset($_GET['q'])){
 $user->user_logout();
 header("location:../index.php");
 }

if($userid!=="admin"){
    //echo "<script type='text/javascript'>alert('Login as a admin to complete this step.');</script>";
    header("location:../index.php");
}
		

?>