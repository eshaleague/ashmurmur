<?php
include "../include/dbh.inc.php";


if (isset($_POST['opensignup'])) {
	$game = $_POST['gamename'];
	$sql = "UPDATE scrim_stattus SET status='signup' WHERE game ='$game'";
	mysqli_query($conn, $sql);
	
}
if (isset($_POST['running'])) {
	$game = $_POST['gamename'];
	if ($game == "League of Legends") {
		$teams = ['ab', 'cd', 'ef', 'gh', 'ij', 'kl', 'mn' ];
		$team_counter = 0;
		$next_team = 1; 
		
		$sql = "UPDATE scrim_stattus SET status='running' WHERE game ='$game'";
		mysqli_query($conn, $sql);

		$sqla = "SELECT * FROM lolscrimsignup WHERE game ='$game'";
		$resulta = mysqli_query($conn, $sqla);

		while($rowa = mysqli_fetch_assoc($resulta)){
	     	$username = $rowa['username']; 
	     	$team = $teams[$team_counter];

	     	$sqlb = "INSERT INTO live_scrims (username, team, game) VALUES ('$username', '$team', '$game');";
			mysqli_query($conn, $sqlb);

			$next_team = $next_team + 1;
			if ($next_team >= 11) {
				$next_team = 1;
				$team_counter = $team_counter + 1;
			}


		}
		
	}
	

	
}

if (isset($_POST['close'])) {
	$game = $_POST['gamename'];
	$sql = "UPDATE scrim_stattus SET status='off' WHERE game ='$game'";
	mysqli_query($conn, $sql);
	$sql = "SELECT * FROM live_scrims WHERE game = '$game'";
	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result)){
		$username = $row['username'];
	   	$sqla = "UPDATE users SET xp=xp+200 WHERE user_username ='$username'";
		mysqli_query($conn, $sqla);

		$sql = "DELETE FROM lolscrimsignup WHERE username ='$username'";
		mysqli_query($conn, $sql);

		$sql = "DELETE FROM live_scrims WHERE username ='$username'";
		mysqli_query($conn, $sql);



	}

	

	
}


header("Location: ../admin/openscrims.php");