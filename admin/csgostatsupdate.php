<link rel="stylesheet" type="text/css" href="../css/admin.css">
<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include'../adminInclude/checkadmin.php';
include'../include/dbh.inc.php';
 require('../vendor/autoload.php');
 $client = new \Zyberspace\SteamWebApi\Client('26896FAB283A62FF7264998A55E2252E');
 $steamUser = new \Zyberspace\SteamWebApi\Interfaces\ISteamUser($client);

$kda = 0;
$summoner = "";
$sql = "SELECT * FROM currentseason WHERE game = 'Rocket League'";
$result = mysqli_query($conn, $sql);
echo"<h1>ROCKET LEAGUE STATS</h1><h2>*stats are added up, averages calculated when viewing on other pages</h2>";

echo "<div class='statsupdate'><form method='POST' action='../adminInclude/updatestats.inc.php'>

<table style='position: fixed;'><thead stlye='position: fixed;'><tr><td>player_name</td><td>///in_game_name//</td><td>matches played</td><td>Score</td><td>Goals</td><td>assists</td><td>Saves</td><td>Shots</td><td id='newsubmission'>score submission</td><td id='newsubmission'>goals submission</td><td id='newsubmission'>assists submission</td><td id='newsubmission'>saves submission</td><td id='newsubmission'>shots submission</td></tr></thead></table><br><Br><Br>

<table><tbody>";
while ($row = mysqli_fetch_assoc($result)){
    $summoner = $row['game_id'];
//get the player's summoner name
try{

 $response = $steamUser->GetPlayerSummariesV2($row['game_id']);

foreach ($response->response->players as $player) {
  $summoner = $player->personaname;
}
} catch(Exception $e){
    $summoner = $row['game_id'];
}




Echo "<tr><td>".$row['player_name']."</td><td>".$summoner."</td><td>".$row['stat_matches']."</td><td>".$row['stat_kills']."</td><td>".$row['stat_deaths']."</td><td>".$row['stat_assists']."</td><td>".$row['stat_mvps']."</td><td>".$row['stat_shots']."</td><td>
    
<input style = 'display: none;'type='text' name='user[]' value='".$row['player_name']."'>
    <input type='number' name='kills_new[]' value='0'></td><td>
    <input type='number' name='deaths_new[]' value='0'></td><td>
    <input type='number' name='assists_new[]' value='0'></td><td>
    <input type='number' name='mvps_new[]' value='0'></td><td>
    <input type='number' name='shots_new[]' value='0'>

    
    </td></tr>";

}

echo "</tbody></table><input type='submit' name='csgoupdatestats'>
    </form></div>";

for ($i = 0; $i < 50; $i++) {
    echo"<br>";
}
