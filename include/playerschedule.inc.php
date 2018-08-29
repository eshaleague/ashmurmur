<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

//user's team consists of the club name + the team letter
$teamname = $ind =  "";
//get the user's team
$sql = "SELECT * FROM currentseason WHERE player_name = '$usernameSesson'";
$result = mysqli_query($conn, $sql);


if ($row = mysqli_fetch_assoc($result)){
	$teamname = $row['club_name']." ".$row['team_letter'];
	$ind = $row['game_id'];
	$hsplayerletter = $row['game_letter'];
}



//print all the associated match times when found team name for each game table
//league of legends
if ($gamenames == "League of Legends") {
	$sql = "SELECT * FROM lolschedule WHERE team1 = '$teamname' AND winner = '' OR team2 = '$teamname' AND winner = ''";
	$resul = mysqli_query($conn, $sql);


	while ($hi = mysqli_fetch_assoc($resul)){
		//adds bracket to the team letter for styling purposes
		$team1 = str_replace($hi['team1'][-1], "(".$hi['team1'][-1].")", $hi['team1']);
		$team2 = str_replace($hi['team2'][-1], "(".$hi['team2'][-1].")", $hi['team2']);

		$remaining = strtotime($hi['date']) - time();
		$days_remaining = "Days Left: ".floor($remaining / 86400);
		$background = "";		
		$days_remainingcheck = floor($remaining / 86400);

		if ($days_remainingcheck < 0) {
			$days_remaining = "Days Left: ".'0';
		}
		$background = "notplayedgame";

		//check to see if the lobby is open and adds a join now button
		$checklobbyname = "lobby".$hi['team1'][0].substr($hi['team1'], 2, 3).$hi['team1'][-1].$hi['team2'][0].substr($hi['team2'], 2, 3).$hi['team2'][-1]."lol";
		$sqi = "SELECT * FROM lobbystatus WHERE lobby_name = '$checklobbyname' and status = 'yes'";
		$result = mysqli_query($conn, $sqi);
		$resultCheck= mysqli_num_rows($result);
		$lobbyfound = "inline-block";

		if ($resultCheck < 1) {
			$lobbyfound = "none";
		}


		echo "<div class='schedule-block ".$background."'><div class='matchup'>".$team1." <br><span>vs</span><br> ".$team2."</div>
		<form action = './lobbies/test.php' method = 'POST'style=display:".$lobbyfound.";><input style='display: none;'type='text' name = 'thelobby'value='".$checklobbyname."'>


		<input style='display: none;'type='text' name = 'teamletter1'value='".$hi['team1'][-1]."'>
		<input style='display: none;'type='text' name = 'clubname1'value='".substr($hi['team1'], 0, strlen($hi['team1']) -2)."'>
		<input style='display: none;'type='text' name = 'teamletter2'value='".$hi['team2'][-1]."'>
		<input style='display: none;'type='text' name = 'clubname2'value='".substr($hi['team2'], 0, strlen($hi['team2']) -2)."'>
		<input style='display: none;'type='text' name = 'gamename'value='League of Legends'>

		<button type='submit'>join match</button></form>


		


		<div class='matchdate'>";
		$date = date("Y-m-d", strtotime($hi['date']))."<br>".date("h:ia", strtotime($hi['date']));
		echo $date."<br><br>".$days_remaining."<br></div><div id='demo'></div></div>";


		
		}

		//First select the games that have not been played yet
	$sql = "SELECT * FROM lolschedule WHERE team1 = '$teamname' AND winner <> '' OR team2 = '$teamname' AND winner <> '' ";
	$result = mysqli_query($conn, $sql);


	while ($hi = mysqli_fetch_assoc($result)){
		//adds bracket to the team letter for styling purposes
		$team1 = str_replace($hi['team1'][-1], "(".$hi['team1'][-1].")", $hi['team1']);
		$team2 = str_replace($hi['team2'][-1], "(".$hi['team2'][-1].")", $hi['team2']);
		if ($hi['winner'] == $teamname) {
			$days_remaining = "<span style='color: lightgreen; font-size: 30px;'>WIN</span>";
			$background = "playedgame";
		}

		else{
			$days_remaining = "<span style='color: red; font-size: 30px;'>LOSE</span>";
			$background = "playedgame";
		}

		echo "<div class='schedule-block ".$background."'><div class='matchup'>".$team1." <br><span>vs</span><br> ".$team2."</div><div class='matchdate'>";
		$date = date("Y-m-d", strtotime($hi['date']))."<br>".date("h:ia", strtotime($hi['date']));
		echo $date."<br><br>".$days_remaining."</div><br><br><div id='demo'></div></div>";	
		}
}

else if ($gamenames == "Rocket League") {
	//First select the games that have not been played yet
	$sqz = "SELECT * FROM rocketleagueschedule WHERE team1 = '$teamname' AND winner = '' OR team2 = '$teamname' AND winner = ''";
	$wesult = mysqli_query($conn, $sqz);


	while ($hi = mysqli_fetch_assoc($wesult)){
		//adds bracket to the team letter for styling purposes
		$team1 = str_replace($hi['team1'][-1], "(".$hi['team1'][-1].")", $hi['team1']);
		$team2 = str_replace($hi['team2'][-1], "(".$hi['team2'][-1].")", $hi['team2']);

		$remaining = strtotime($hi['date']) - time();
		$days_remaining = "Days Left: ".floor($remaining / 86400);
		$background = "";		
		$days_remainingcheck = floor($remaining / 86400);

		if ($days_remainingcheck < 0) {
			$days_remaining = "Days Left: ".'0';
		}
		$background = "notplayedgame";

		//check to see if the lobby is open and adds a join now button
		$checklobbyname = "lobby".$hi['team1'][0].substr($hi['team1'], 2, 3).$hi['team1'][-1].$hi['team2'][0].substr($hi['team2'], 2, 3).$hi['team2'][-1]."rocketleague";
		$sqw = "SELECT * FROM lobbystatus WHERE lobby_name = '$checklobbyname' and status = 'yes'";
		$result = mysqli_query($conn, $sqw);
		$resultCheck= mysqli_num_rows($result);
		$lobbyfound = "inline-block";

		if ($resultCheck < 1) {
			$lobbyfound = "none";
		}


		echo "<div class='schedule-block ".$background."'><div class='matchup'>".$team1." <br><span>vs</span><br> ".$team2."</div>
		<form action = './lobbies/test.php' method = 'POST'style=display:".$lobbyfound.";><input style='display: none;'type='text' name = 'thelobby'value='".$checklobbyname."'>


		<input style='display: none;'type='text' name = 'teamletter1'value='".$hi['team1'][-1]."'>
		<input style='display: none;'type='text' name = 'clubname1'value='".substr($hi['team1'], 0, strlen($hi['team1']) -2)."'>
		<input style='display: none;'type='text' name = 'teamletter2'value='".$hi['team2'][-1]."'>
		<input style='display: none;'type='text' name = 'clubname2'value='".substr($hi['team2'], 0, strlen($hi['team2']) -2)."'>
		<input style='display: none;'type='text' name = 'gamename'value='Rocket League'>


		<button type='submit'>play Match</button></form>


		<div class='matchdate'>";
		$date = date("Y-m-d", strtotime($hi['date']))."<br>".date("h:ia", strtotime($hi['date']));
		echo $date."<br><br>".$days_remaining."</div><br><br><div id='demo'></div></div>";


		
		}

		//add matches played
	$sql = "SELECT * FROM rocketleagueschedule WHERE team1 = '$teamname' AND winner <> '' OR team2 = '$teamname' AND winner <> '' ";
	$result = mysqli_query($conn, $sql);


	while ($hi = mysqli_fetch_assoc($result)){
		//adds bracket to the team letter for styling purposes
		$team1 = str_replace($hi['team1'][-1], "(".$hi['team1'][-1].")", $hi['team1']);
		$team2 = str_replace($hi['team2'][-1], "(".$hi['team2'][-1].")", $hi['team2']);
		if ($hi['winner'] == $teamname) {
			$days_remaining = "<span style='color: green; font-size: 30px;'>WIN</span>";
			$background = "playedgame";
		}

		else{
			$days_remaining = "<span style='color: red; font-size: 30px;'>LOSE</span>";
			$background = "playedgame";
		}

		echo "<div class='schedule-block ".$background."'><div class='matchup'>".$team1." <br><span>vs</span><br> ".$team2."</div><div class='matchdate'>";
		$date = date("Y-m-d", strtotime($hi['date']))."<br>".date("h:ia", strtotime($hi['date']));
		echo $date."<br><br>".$days_remaining."</div><br><br><div id='demo'></div></div>";	
		}
	}
else if ($gamenames == "Hearthstone") {
	//First select the games that have not been played yet
	$sqz = "SELECT * FROM hearthstoneschedule WHERE team1 = '$ind' AND winner = '' OR team2 = '$ind' AND winner = ''";
	$wesult = mysqli_query($conn, $sqz);


	while ($hi = mysqli_fetch_assoc($wesult)){
		//adds bracket to the team letter for styling purposes
		$team1 = $hi['team1'];
		$team2 = $hi['team2'];

		$remaining = strtotime($hi['date']) - time();
		$days_remaining = "Days Left: ".floor($remaining / 86400);
		$background = "";		
		$days_remainingcheck = floor($remaining / 86400);

		if ($days_remainingcheck < 0) {
			$days_remaining = "Days Left: ".'0';
		}
		$background = "notplayedgame";

		//check to see if the lobby is open and adds a join now button
		$checklobbyname = "lobby".$hi['team1'].$hi['team2']."hearthstone";
		$sqw = "SELECT * FROM lobbystatus WHERE lobby_name = '$checklobbyname' and status = 'yes'";
		$result = mysqli_query($conn, $sqw);
		$resultCheck= mysqli_num_rows($result);
		$lobbyfound = "inline-block";

		if ($resultCheck < 1) {
			$lobbyfound = "none";
		}


		echo "<div class='schedule-block ".$background."'><div class='matchup'>".$team1." <br><span>vs</span><br> ".$team2."</div>
		<form action = './lobbies/test.php' method = 'POST'style=display:".$lobbyfound.";><input style='display: none;'type='text' name = 'thelobby'value='".$checklobbyname."'>


		<input style='display: none;'type='text' name = 'teamletter1'value='".$hi['team1']."'>
		<input style='display: none;'type='text' name = 'clubname1'value=''>
		<input style='display: none;'type='text' name = 'teamletter2'value='".$hi['team2']."'>
		<input style='display: none;'type='text' name = 'clubname2'value=''>
		<input style='display: none;'type='text' name = 'gamename'value='Hearthstone'>


		<button type='submit'>play Match</button></form>


		<div class='matchdate'>";
		$date = date("Y-m-d", strtotime($hi['date']))."<br>".date("h:ia", strtotime($hi['date']));
		echo $date."<br><br>".$days_remaining."</div><br><br><div id='demo'></div></div>";


		
		}

		//add matches played
	$sql = "SELECT * FROM rocketleagueschedule WHERE team1 = '$teamname' AND winner <> '' OR team2 = '$teamname' AND winner <> '' ";
	$result = mysqli_query($conn, $sql);


	while ($hi = mysqli_fetch_assoc($result)){
		//adds bracket to the team letter for styling purposes
		$team1 = str_replace($hi['team1'][-1], "(".$hi['team1'][-1].")", $hi['team1']);
		$team2 = str_replace($hi['team2'][-1], "(".$hi['team2'][-1].")", $hi['team2']);
		if ($hi['winner'] == $teamname) {
			$days_remaining = "<span style='color: green; font-size: 30px;'>WIN</span>";
			$background = "playedgame";
		}

		else{
			$days_remaining = "<span style='color: red; font-size: 30px;'>LOSE</span>";
			$background = "playedgame";
		}

		echo "<div class='schedule-block ".$background."'><div class='matchup'>".$team1." <br><span>vs</span><br> ".$team2."</div><div class='matchdate'>";
		$date = date("Y-m-d", strtotime($hi['date']))."<br>".date("h:ia", strtotime($hi['date']));
		echo $date."<br><br>".$days_remaining."</div><br><br><div id='demo'></div></div>";	
		}
	}


