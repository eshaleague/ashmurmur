<link rel="stylesheet" type="text/css" href="../css/admin.css">
<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include'../adminInclude/checkadmin.php';
include'../include/dbh.inc.php';

$kda = 0;
$summoner = "";
$sql = "SELECT * FROM currentseason WHERE game = 'League of Legends'";
$result = mysqli_query($conn, $sql);
echo"<h1>LOL STATS</h1><h2>*stats are added up, averages calculated when viewing on other pages</h2>";
echo "<div class='statsupdate'><form method='POST' action='../adminInclude/updatestats.inc.php'>

<table style='position: fixed;'><thead stlye='position: fixed;'><tr><td>player_name</td><td>//////in_game_name/////</td><td>matches played</td><td>kills</td><td>deaths</td><td>assists</td><td>gold</td><td>CS</td><td id='newsubmission'>kills submission</td><td id='newsubmission'>deaths submission</td><td id='newsubmission'>assists submission</td><td id='newsubmission'>gold submission</td><td id='newsubmission'>cs submission</td></tr></thead></table><br><Br><Br>

<table><tbody>";
while ($row = mysqli_fetch_assoc($result)){
//get the player's summoner name
require_once('../php-riot-api-master/php-riot-api.php');
    $instance = new riotapi('na1');
    //summoner name exists
    try {
    $summoner = $instance->getSummonerById($row['game_id']);
    } 
    //summoner name does not exist
    catch(Exception $e) {
    $summoner = $row['game_id'];

    };      

Echo "<tr><td>".$row['player_name']."</td><td>".$summoner."</td><td>".$row['stat_matches']."</td><td>".$row['stat_kills']."</td><td>".$row['stat_deaths']."</td><td>".$row['stat_assists']."</td><td>".$row['stat_gold']."</td><td>".$row['stat_assists']."</td><td>
    
<input style = 'display: none;'type='text' name='user[]' value='".$row['player_name']."'>
    <input type='number' name='kills_new[]' value='0'></td><td>
    <input type='number' name='deaths_new[]' value='0'></td><td>
    <input type='number' name='assists_new[]' value='0'></td><td>
    <input type='number' name='gold_new[]' value='0'></td><td>
    <input type='number' name='cs_new[]' value='0'>
    
    </td></tr>";

}

echo "</tbody></table><input type='submit' name='lolupdatestats'>
    </form></div>";

for ($i = 0; $i < 50; $i++) {
    echo"<br>";
}




