<?php

session_start();

if(isset($_POST['submitJoinTeam'])){
	include_once 'dbh.inc.php';

	$club = mysqli_real_escape_string($conn, $_POST['clubName']);


	//error handlers
	//check for empty feilds
	if (empty($club)){
		header("Location: ../career.php?jointeam=empty");
		exit();
	}else{

			#select everything from the clubs table 
			$sql = "SELECT * FROM clubs WHERE club_code = '$club'";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);

			//club code does not exist
			if ($resultCheck == 0){
				header("Location: ../career.php?jointeam=incorrect");
				exit();
			}else{
				//updates the users club
				if($row = mysqli_fetch_assoc($result)){
					
					$club_name = $row['club_name'];
					$username = $_SESSION['u_username'];
					$_SESSION['u_club'] = $club_name;
					$sql = "UPDATE users SET user_club='$club_name' WHERE user_username='$username'";
					mysqli_query($conn, $sql);
					header("Location: ../career.php");
				}
				

			}
		}
		
	}
else{
	header("Location: ../career.php");
	exit();
}