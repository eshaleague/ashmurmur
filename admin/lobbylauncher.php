<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include'../adminInclude/checkadmin.php';

if (isset($_POST['submit'])) {
	//launch the lobby tables
	include "../include/dbh.inc.php";
	$lobbyname = $_POST['lobbyname'];
	$matchup = $_POST['matchup'];

	$sql = "CREATE TABLE ".$lobbyname."(
	message_id int(11) not null PRIMARY KEY AUTO_INCREMENT,
    user_id int(100) not null,
    message text not null,
    timestamp int(11) not null
	);";
	mysqli_query($conn, $sql);

	//insert into lobby status if not there
	$sql = "SELECT * FROM lobbystatus WHERE lobby_name = '$lobbyname '";
	$result = mysqli_query($conn, $sql);
	$resultCheck= mysqli_num_rows($result);

	if ($resultCheck < 1) {
		$sqe = "INSERT INTO lobbystatus (lobby_name, matchup, status) VALUES ('$lobbyname', '$matchup','yes');";
		mysqli_query($conn, $sqe);
	}
	else{
		$squ = "UPDATE lobbystatus  SET status='yes' WHERE lobby_name ='$lobbyname'";
		mysqli_query($conn, $squ);
	}

	


	

	header("Location: launchlobbies.php");


}