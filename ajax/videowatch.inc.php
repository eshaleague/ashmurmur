<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if ($_POST['method'] === 'add') {
	include '../include/dbh.inc.php';
	//define variables
	$xp = 25;
	$usernameSesson = $_SESSION['u_username'];

	//add xp to the user's account
	$sql = "UPDATE users SET xp = xp + $xp WHERE user_username = '$usernameSesson'";
	mysqli_query($conn, $sql);

	$sqp = "UPDATE users SET last_video_watch = UNIX_TIMESTAMP() WHERE user_username = '$usernameSesson'";
	mysqli_query($conn, $sqp);
}






