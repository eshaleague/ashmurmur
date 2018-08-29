<?php


echo "<br><div class='container scrims'><div class='row'><h5>Open Scrimmage</h5><br>";
$sql = "SELECT * FROM scrim_stattus";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)){
	$game = $row['game'];
	if ($row['status'] == "signup") {

		$sqla = "SELECT * FROM lolscrimsignup WHERE username = '$usernameSesson'";
		$resulta = mysqli_query($conn, $sqla);
		$resultChecka = mysqli_num_rows($resulta);

		if ($resultChecka >= 1) {
			echo"<div class='lobby-card'><h1>Your Lobby:</h1><h2><b>".$game."</b></h2><button>Ready Soon</button><p>*Refresh browser at time</p></div>";
		}else{

			echo "<div class='scrim-card'><h1>".$row['game']."</h1><form method='post' action='include/scrimsignup.inc.php'><input style='display: none' name='user' value='".$usernameSesson."'><input style='display: none' name='game' value='".$row['game']."'><input class='scrim-button' type='submit' value='Signup' name='signup'></form></div>";
		}	
	}

	elseif ($row['status'] == "running") {
		$sqlb = "SELECT * FROM lolscrimsignup WHERE username = '$usernameSesson'";
		$resultb = mysqli_query($conn, $sqlb);
		$resultCheckb = mysqli_num_rows($resultb);

		if ($resultCheckb >= 1) {
			$sqlc = "SELECT * FROM live_scrims WHERE game = '$game' AND username = '$usernameSesson'";
			$resultc = mysqli_query($conn, $sqlc);

			if ($rowc = mysqli_fetch_assoc($resultc)){
    			 $match = $rowc['team'];

    			 echo"<div class='lobby-card'><h1>Your Lobby:</h1><h2><b>".$game."</b></h2><form method='post' action='./include/scrimlobby.php'><input style='display: none' name='matchup' value = '".$match."'><input style='display: none' name='game' value = '".$game."'><input type='submit' name='startscrim' value='PLAY'></form></div>";
     		}
			
		}
		
	}

	else{
		echo"There are currently no scrimmage lobbies available. Please check the schedule and come back later";
	}

	

	
}
echo"</div><div class='row'><br><div class='scrim-schedule'><h1>Schedule</h1><table><thead><tr><td>Type</td><td>Details</td><td>Rewards</td></tr></thead><tbody><tr><td>League of Legends Open Scrims</td><td>Friday, Saturday, Sunday<br>Signup begins at 6:00pm, Games begin at 6:30pm</td><td>+200px</td></tr></tbody></table></div></div></div>";



