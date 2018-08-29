<?php 
include'../include/dbh.inc.php';

if (isset($_POST['lolupdatestats'])) {
	for ($i = 0; $i < count($_POST['kills_new']); $i++) {
		$kills = $_POST['kills_new'][$i];
		$deaths = $_POST['deaths_new'][$i];
		$assists = $_POST['assists_new'][$i];
		$gold = $_POST['gold_new'][$i];
		$cs = $_POST['cs_new'][$i];

		$user = $_POST['user'][$i];
		if ($kills == 0 and $deaths == 0 and $assists == 0 and $gold == 0 and $cs == 0) {
			# code...
		}else{
			$sql = "UPDATE currentseason SET stat_matches=stat_matches +1, stat_kills= stat_kills+$kills,stat_deaths= stat_deaths+$deaths, stat_assists= stat_assists+$assists, stat_gold = stat_gold + $gold, stat_cs = stat_cs + $cs WHERE player_name = '$user'";
			mysqli_query($conn, $sql);
			$sql = "INSERT INTO stat_entries (player_name, game_name, stat_kills, stat_deaths, stat_assists, stat_gold, stat_cs, time) VALUES ('$user', 'League of Legends', $kills, $deaths, $assists, $gold, $cs, UNIX_TIMESTAMP());";
			mysqli_query($conn, $sql);
	
		}
    	
	}

	header("Location: ../admin/lolstatsupdate.php");
}
else if (isset($_POST['csgoupdatestats'])) {
	for ($i = 0; $i < count($_POST['kills_new']); $i++) {
		$kills = $_POST['kills_new'][$i];
		$deaths = $_POST['deaths_new'][$i];
		$assists = $_POST['assists_new'][$i];
		$mvps = $_POST['mvps_new'][$i];
		$user = $_POST['user'][$i];
		$shots = $_POST['shots_new'][$i];
		if ($kills == 0 and $deaths == 0 and $assists == 0 and $mvps == 0) {
			# code...
		}else{
			$sql = "UPDATE currentseason SET stat_matches=stat_matches +1, stat_kills= stat_kills+$kills,stat_deaths= stat_deaths+$deaths, stat_assists= stat_assists+$assists, stat_mvps = stat_mvps + $mvps, stat_shots = stat_shots + $shots WHERE player_name = '$user'";
			mysqli_query($conn, $sql);
			$sql = "INSERT INTO stat_entries (player_name, game_name, stat_kills, stat_deaths, stat_assists, stat_mvps, stat_shots, time) VALUES ('$user', 'Rocket League', $kills, $deaths, $assists, $mvps, $shots, UNIX_TIMESTAMP());";
			mysqli_query($conn, $sql);
		}
    	
	}

	header("Location: ../admin/csgostatsupdate.php");
}


