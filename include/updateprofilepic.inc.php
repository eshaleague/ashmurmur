<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


if(isset($_POST['submit'])){
	include 'dbh.inc.php';
	$newpicture = $_POST['profileurl'];
	$uid = $_SESSION['u_id'];
	$sql = "UPDATE users SET user_picture='$newpicture' WHERE user_id ='$uid'";
	mysqli_query($conn, $sql);

	header("Location: ../career.php");

}