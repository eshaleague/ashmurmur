<?php 
include'../include/dbh.inc.php';

if (isset($_POST['submit'])) {
	for ($i = 0; $i < count($_POST['user']); $i++) {
		$xp = $_POST['xp'][$i];
		$user = $_POST['user'][$i];
    	$sql = "UPDATE users SET xp=$xp WHERE user_username ='$user'";
		mysqli_query($conn, $sql);

	}
}

header("Location: ./xpcontrol.php");