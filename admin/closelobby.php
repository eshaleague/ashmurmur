<?php
include'../adminInclude/checkadmin.php';

if (isset($_POST['submit'])) {

	$lobby = $_POST['lobbyname'];
	include '../include/dbh.inc.php';
	$sql = "UPDATE lobbystatus SET status = 'no' WHERE lobby_name = '$lobby'";
	mysqli_query($conn, $sql);
	$sql = "DROP TABLE $lobby";
	mysqli_query($conn, $sql);

	header("Location: launchlobbies.php");



}