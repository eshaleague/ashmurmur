<?php
//define variables to be set
$season_name = "";
$club_name = "";
$team_letter = "";
$teammates = array(); 
//display the current season
$sql = "SELECT * FROM seasoninfo WHERE is_current = 'yes'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)){
$season_name = $row['season_name'];
}

//display the team name
$playername = $_SESSION['u_username'];
$sql = "SELECT * FROM currentseason WHERE player_name = '$playername'";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)){
$club_name= $row['club_name'];
$team_letter= $row['team_letter'];
}

//get team mates
$sql = "SELECT * FROM currentseason WHERE game = '$gamename' AND club_name = '$club_name' AND team_letter = '$team_letter'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
	//get the game id and ask for name
	if ($gamename == 'League of Legends') {
		
		try{
			require_once('./php-riot-api-master/php-riot-api.php');
			$instance = new riotapi('na1');
			$r = $instance->getSummonerById($row['game_id']);
			array_push($teammates, $row['player_name']."(" .$r.")");
	         } catch(Exception $e){
		        array_push($teammates, $row['player_name']);
        }
	}

	elseif ($gamename == 'Rocket League') {
		try{
           	 require('./vendor/autoload.php');
       		 $client = new \Zyberspace\SteamWebApi\Client('26896FAB283A62FF7264998A55E2252E');
       		 $steamUser = new \Zyberspace\SteamWebApi\Interfaces\ISteamUser($client);
       		 $response = $steamUser->GetPlayerSummariesV2($row['game_id']);

        	foreach ($response->response->players as $player) {
        	  $r = $player->personaname;
        	  array_push($teammates, $row['player_name']."(" .$r.")");
        	}
           	} catch(Exception $e){
	        	array_push($teammates, $row['player_name']);
            
		
        }
	}
    
}


//echo info to table format to html
echo'
<div class="currentSeasonInfo"><br>
<h1>Tournament Info</h1><br>
<table>
	<thead>
		<tr>
			<td>Info</td>
			<td>Details</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Tournament</td>
			<td>'.$season_name.'<br>'.$gamename.' Championship</td>
		</tr>
		<tr>
			<td>Team</td>
			<td>'.$club_name.' '.$team_letter.'<br><img src="images/'.$club_name.'.png" width = 75px></td>
		</tr>
		<tr>
		<td>Members';
		//change if it says (summoner name) or steam name based on the game etc
		if ($gamename == 'League of Legends'){
			echo"(Summoner Name)";
		}
		else if  ($gamename == 'CSGO'){
			echo"(Steam Name)";
		}
		echo '</td>
			<td><ul>';
				//echo the team memebers
				foreach ($teammates as $key) {
					echo '<li>'.$key.'</li>';
				}
			echo'</ul></td>
		</tr>
	</tbody>
</table>
</div>
';
?>
