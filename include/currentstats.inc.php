<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$u_id = $_SESSION['u_username'];
$seasonname = $stat_kda= $stat_matches = $stat_kills = $stat_assists = $stat_deaths = $stat_gold = $stat_cs = $stat_mvps = $stat_shots = "";
$user_perc_kda = $user_perc_kills = $user_perc_deaths = $user_perc_assists = $user_perc_gold = $user_perc_cs = $user_perc_mvps = $user_perc_shots = 0;
$perc_kda = $perc_kills = $perc_assists = $perc_deaths = $perc_gold = $perc_cs = $perc_mvps =$perc_shots= [];
//get the percentile arrays
$sql = "SELECT * FROM currentseason WHERE game = '$gamename'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
	if ($row['stat_matches'] == 0) {
		array_push($perc_kills, 0);
		array_push($perc_assists, 0);
		array_push($perc_deaths, 0);
		array_push($perc_gold, 0);
		array_push($perc_cs, 0);
		array_push($perc_mvps, 0);
		array_push($perc_kda, 0);
		array_push($perc_shots, 0);
	}else{
		array_push($perc_kills,round(($row['stat_kills']/ $row['stat_matches']),1));
		array_push($perc_assists,round(($row['stat_assists']/ $row['stat_matches']),1));
		array_push($perc_deaths,round(($row['stat_deaths']/ $row['stat_matches']),1));
		array_push($perc_gold,round(($row['stat_gold']/ $row['stat_matches']),0));
		array_push($perc_cs,round(($row['stat_cs']/ $row['stat_matches']),1));
		array_push($perc_mvps,round(($row['stat_mvps']/ $row['stat_matches']),1));
		array_push($perc_shots,round(($row['stat_shots']/ $row['stat_matches']),1));
		//calculate kda		
		if ($row['stat_deaths'] == 0) {
			array_push($perc_kda, round($row['stat_kills']+$row['stat_assists'], 1));
		}else{
			array_push($perc_kda, round(($row['stat_kills']+$row['stat_assists'])/$row['stat_deaths'], 1));

	}


}
}
rsort($perc_kills);
sort($perc_deaths);
rsort($perc_assists);
rsort($perc_gold);
rsort($perc_cs);
rsort($perc_mvps);
rsort($perc_kda);
rsort($perc_shots);
//get the current season
$sql = "SELECT season_name FROM seasoninfo WHERE is_current = 'yes'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)){
	$seasonname = $row['season_name'];
}

//get the user's stats

$sql = "SELECT * FROM currentseason WHERE player_name = '$u_id' ";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)){
	$stat_matches = $row['stat_matches'];
	if ($row['stat_matches'] == 0) {
		$stat_kills = $stat_assists = $stat_deaths = $stat_gold = $stat_cs = $stat_mvps = 0;
	}else{
		$stat_kills =  round(($row['stat_kills']/ $row['stat_matches']),1);
		$stat_deaths = round(($row['stat_deaths']/ $row['stat_matches']),1);
		$stat_assists = round(($row['stat_assists']/ $row['stat_matches']),1);
		$stat_gold = round(($row['stat_gold']/ $row['stat_matches']),0);
		$stat_cs = round(($row['stat_cs']/ $row['stat_matches']),1);
		$stat_mvps = round(($row['stat_mvps']/ $row['stat_matches']),1);
		$stat_shots = round(($row['stat_shots']/ $row['stat_matches']),1);
	}
	if ($row['stat_deaths'] == 0) {
			$stat_kda = round($row['stat_kills']+$row['stat_assists'], 1);
		}else{
			$stat_kda = round(($row['stat_kills']+$row['stat_assists'])/$row['stat_deaths'], 1);
		}
	}
	

//calculate the percentile
$user_perc_kills = round((array_search($stat_kills, $perc_kills)+1) / sizeof($perc_kills) * 100, 0);
$user_perc_deaths = round((array_search($stat_deaths, $perc_deaths)+1) / sizeof($perc_kills) * 100, 0);
$user_perc_assists = round((array_search($stat_assists, $perc_assists)+1) / sizeof($perc_kills) * 100, 0);
$user_perc_gold = round((array_search($stat_gold, $perc_gold)+1) / sizeof($perc_kills) * 100, 0);
$user_perc_cs = round((array_search($stat_cs, $perc_cs)+1) / sizeof($perc_kills) * 100, 0);
$user_perc_mvps = round((array_search($stat_mvps, $perc_mvps)+1) / sizeof($perc_kills) * 100, 0);
$user_perc_kda = round((array_search($stat_kda, $perc_kda)+1) / sizeof($perc_kda) * 100, 0);
$user_perc_shots = round((array_search($stat_shots, $perc_shots)+1) / sizeof($perc_shots) * 100, 0);
echo"<br><h1 style='font-size: 25px; font-weight: bold; text-align: center;'>STATS OVERVIEW</h1><br>";
if ($gamename == "League of Legends") {
	echo"<div class='container statsummary'>";
	echo"<h1>".$seasonname.": ".$gamename."</h1><h2>Matches Played: ".$stat_matches."</h2><br>";
	echo "<div class='row'><div class='col-sm-4'><a data-placement='bottom' href='#' data-toggle='tooltip' title='Top ".$user_perc_kills."%'> ".$stat_kills."<br><div class='progress' style='width: 150px; height: 6px;'><div class='progress-bar' role='progressbar' style='width:".(100 - $user_perc_kills)."%'></div></div></a><br><span class='category'>KILLS</span></div>";
	echo "<div class='col-sm-4'><a data-placement='bottom' href='#' data-toggle='tooltip' title='Top ".$user_perc_deaths."%'> ".$stat_deaths."<br><div class='progress' style='width: 150px; height: 6px;'><div class='progress-bar' role='progressbar' style='width:".(100 - $user_perc_deaths)."%'></div></div></a><br><span class='category'>DEATHS</span></div>";
	echo "<div class='col-sm-4'><a data-placement='bottom' href='#' data-toggle='tooltip' title='Top ".$user_perc_assists."%'> ".$stat_assists."<br><div class='progress' style='width: 150px; height: 6px;'><div class='progress-bar' role='progressbar' style='width:".(100 - $user_perc_assists)."%'></div></div></a><br><span class='category'>ASSISTS</span></div></div><br>";
	echo "<div class='row'> <div class='col-sm-4'><a data-placement='bottom' href='#' data-toggle='tooltip' title='Top ".$user_perc_kda."%'> ".$stat_kda."<br><div class='progress' style='width: 150px; height: 6px;'><div class='progress-bar' role='progressbar' style='width:".(100 - $user_perc_kda)."%'></div></div></a><br><span class='category'>KDA</span></div>";
	echo "<div class='col-sm-4'><a data-placement='bottom' href='#' data-toggle='tooltip' title='Top ".$user_perc_gold."%'> ".$stat_gold."<br><div class='progress' style='width: 150px; height: 6px;'><div class='progress-bar' role='progressbar' style='width:".(100 - $user_perc_gold)."%'></div></div></a><br><span class='category'>GOLD</span></div>";
	echo "<div class='col-sm-4'><a data-placement='bottom' href='#' data-toggle='tooltip' title='Top ".$user_perc_cs."%'> ".$stat_cs."<br><div class='progress' style='width: 150px; height: 6px;'><div class='progress-bar' role='progressbar' style='width:".(100 - $user_perc_cs)."%'></div></div></a><br><span class='category'>CS</span></div></div></div>";


}
else if ($gamename == "Rocket League") {
echo"<div class='container statsummary'>";
	echo"<h1>".$seasonname.": ".$gamename."</h1><h2>Matches Played: ".$stat_matches."</h2><br>";
	echo "<div class='row'><div class='col-sm-4'><a data-placement='bottom' href='#' data-toggle='tooltip' title='Top ".$user_perc_kills."%'> ".$stat_kills."<br><div class='progress' style='width: 150px; height: 6px;'><div class='progress-bar' role='progressbar' style='width:".(100 - $user_perc_kills)."%'></div></div></a><br><span class='category'>SCORE</span></div>";
	echo "<div class='col-sm-4'><a data-placement='bottom' href='#' data-toggle='tooltip' title='Top ".$user_perc_deaths."%'> ".$stat_deaths."<br><div class='progress' style='width: 150px; height: 6px;'><div class='progress-bar' role='progressbar' style='width:".$user_perc_deaths."%'></div></div></a><br><span class='category'>GOALS</span></div>";
	echo "<div class='col-sm-4'><a data-placement='bottom' href='#' data-toggle='tooltip' title='Top ".$user_perc_assists."%'> ".$stat_assists."<br><div class='progress' style='width: 150px; height: 6px;'><div class='progress-bar' role='progressbar' style='width:".(100 - $user_perc_assists)."%'></div></div></a><br><span class='category'>ASSISTS</span></div></div><br>";
	echo "<div class='row'> <div class='col-sm-4'><a data-placement='bottom' href='#' data-toggle='tooltip' title='Top ".$user_perc_mvps."%'> ".$stat_mvps."<br><div class='progress' style='width: 150px; height: 6px;'><div class='progress-bar' role='progressbar' style='width:".(100 - $user_perc_mvps)."%'></div></div></a><br><span class='category'>SAVES</span></div>";
	echo "<div class='col-sm-4'><a data-placement='bottom' href='#' data-toggle='tooltip' title='Top ".$user_perc_shots."%'> ".$stat_shots."<br><div class='progress' style='width: 150px; height: 6px;'><div class='progress-bar' role='progressbar' style='width:".(100 - $user_perc_shots)."%'></div></div></a><br><span class='category'>SHOTS</span></div></div></div>";


}








