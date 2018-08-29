<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$rank = 0;
include('../include/dbh.inc.php');
if (isset($_REQUEST["lolstat"])) {
	$s1=$_REQUEST["lolstat"];
	$sql="select *, ((stat_cs + stat_gold - stat_deaths + stat_kills + stat_assists)/stat_matches) AS ranking from currentseason where player_name like '%".$s1."%' and game = 'League of Legends' order by ranking desc";
	$result = mysqli_query($conn, $sql);

	while($row= mysqli_fetch_assoc($result))
	{
	//find the user's rank from the session varibale
	if ($row['stat_matches'] == 0) {
		$rank_find = 0;
	}
	else{
		$rank_find= ($row['stat_cs'] + $row['stat_gold'] - $row['stat_deaths'] + $row['stat_kills'] + $row['stat_assists'])/$row['stat_matches'];
	}

	$rank = array_search($rank_find, $_SESSION['rank_stats']) + 1;
	$profile = $row['club_name'].$row['team_letter']."LOL.png";
	//prevent dividing by 0
	if($row['stat_matches'] == 0){
	$kills = round($row['stat_kills'], 1);
	$deaths = round($row['stat_deaths'],1);
	$assists = round($row['stat_assists'],1);
	$gold = round($row['stat_gold'],1);  
	$cs = round($row['stat_cs'],1);  
	}else{
	$kills = round($row['stat_kills'] / $row['stat_matches'], 1);
	$deaths = round($row['stat_deaths'] / $row['stat_matches'],1);
	$assists = round($row['stat_assists'] / $row['stat_matches'],1);
	$gold = round($row['stat_gold'] / $row['stat_matches'],0);  
	$cs = round($row['stat_cs'] / $row['stat_matches'],0);  

	}
	if ($deaths == 0) {
	$kda = round(($kills + $assists),1);
	}else{
	$kda = round(($kills + $assists)/ $deaths,1);
	}

	echo "<tr><td>".$rank."</td><td>".$row['player_name']."</td><td><img align='center'width='35px'src='../images/rosterProfiles/".$profile."'></td><td>".$kills."</td><td>".$deaths."</td><td>".$assists."</td><td>".$kda."</td><td>".$gold."</td><td>".$cs."</td></tr>";
	}


}
//CSGOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
else if (isset($_REQUEST["csgostat"])) {
	$s1=$_REQUEST["csgostat"];
	$sql="select *, ((stat_mvps + stat_deaths + stat_kills + stat_assists)/stat_matches) AS ranking from currentseason where player_name like '%".$s1."%' and game = 'Rocket League' order by ranking desc";
	$result = mysqli_query($conn, $sql);

	while($row= mysqli_fetch_assoc($result))
	{

	//find the user's rank from the session varibale
	if ($row['stat_matches'] == 0) {
		$rank_find = 0;
	}
	else{
		$rank_find= ($row['stat_mvps'] + $row['stat_deaths'] + $row['stat_kills'] + $row['stat_assists'])/$row['stat_matches'];
	}

	$rank = array_search($rank_find, $_SESSION['rank_stats']) + 1;
	$profile = $row['club_name'].$row['team_letter']."ROCKETLEAGUE.png";
	//prevent dividing by 0
	if($row['stat_matches'] == 0){
	$kills = round($row['stat_kills'], 1);
	$deaths = round($row['stat_deaths'],1);
	$assists = round($row['stat_assists'],1);
	$mvps = round($row['stat_mvps'],1); 
	$shots = round($row['stat_shots'],1);  
	}else{
	$kills = round($row['stat_kills'] / $row['stat_matches'], 1);
	$deaths = round($row['stat_deaths'] / $row['stat_matches'],1);
	$assists = round($row['stat_assists'] / $row['stat_matches'],1);
	$mvps = round($row['stat_mvps'] / $row['stat_matches'],1);
	$shots = round($row['stat_shots'] / $row['stat_matches'],1);   

	}
	if ($deaths == 0) {
	$kda = round(($kills + $assists),1);
	}else{
	$kda = round(($kills + $assists)/ $deaths,1);
	}

	echo "<tr><td>".$rank."</td><td>".$row['player_name']."</td><td><img align='center'width='35px'src='../images/rosterProfiles/".$profile."'></td><td>".$kills."</td><td>".$deaths."</td><td>".$assists."</td><td>".$mvps."</td><td>".$shots."</td></tr>";
	}


}
