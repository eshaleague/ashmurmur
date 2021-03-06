<!DOCTYPE html>
<html>
<head>
<title>Rocket League</title>

<?php
  //include the header
  include_once '../headerGames.php';
  include_once '../include/dbh.inc.php';
?>
<link rel="stylesheet" href="../css/thegamescsgo.css">
<style>

  .affix {
      top: 0;
      z-index: 9999 !important;
      right: 0;
    	left: 0;
   		 margin-right: auto;
   		 margin-left: auto;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
  .centerstatstable table thead{
background-color: #ff7900;
border: none;
}
.centerstatstable h1{
font-weight: bold;
text-align: center;
text-transform: uppercase;

}
</style>
<div class='thegamesback' style="padding: 0;">
<div style="padding-top: 50px; background-color: navy; height: 650px; background-image: url('../images/csgomainbackground.jpg'); background-size: cover;">
<div class='thegames' data-spy="affix" data-offset-top="83">
<ul class="nav navbar-nav">
<li><a class='gamename' href="./csgomain.php" style="font-size: 15px;"><img src="../images/eshaWhite.png" width='25px' style=' margin-top: -5px; margin-right: 5px;'>Rocket League</a></li> 
<li><a href="./csgoteams.php">Teams</a></li>
<li><a href="./csgostats.php">Stats</a></li>
<li><a href="./csgostandings.php">Standings</a></li>
<li><a href="./csgoschedule.php">Schedule</a></li>
</ul>
</div>
<div class="container-fluid" >
  <br>
  <br>
  <br>
  <br>
  <img class="img-responsive" src="../images/season1rllogo.png" alt="logo" width="350" style="margin: auto;">
</div>
</div>

<div class="centerstatstable">
<?php
$sql = "SELECT stat_entries.*, (stat_entries.stat_kills + stat_entries.stat_assists + stat_entries.stat_deaths ) AS ranking, currentseason.club_name, currentseason.team_letter FROM stat_entries INNER JOIN currentseason ON stat_entries.player_name = currentseason.player_name WHERE game_name = 'Rocket League' AND UNIX_TIMESTAMP() - time < 604800 order by ranking desc limit 5";
$result = mysqli_query($conn, $sql);
$resultCheck= mysqli_num_rows($result);


if ($resultCheck >= 1) {

echo "
<h1 style='font-size: 35px;'>Top 5 Performances This Week</h1><br>
<table>
<thead>
  <tr>
    <td>Rank</td>
    <td>Player</td>
    <td>Team</td>
    <td>Score</td>
    <td>Goals</td>
    <td>Assists</td>
    <td>Savces</td>
    <td>Shots</td>
  </tr></thead>
<tbody>";
$rank = 1;
while($row = mysqli_fetch_assoc($result)){
$profile = "<img align='center'width='35px' src=../images/rosterProfiles/".$row['club_name'].$row['team_letter']."ROCKETLEAGUE.png>";
if ($row['stat_deaths'] == 0) {
$kda = round(($row['stat_kills']+ $row['stat_assists']),1);
}else{
$kda = round(($row['stat_kills']+ $row['stat_assists'])/ $row['stat_deaths'],1);
}
  Echo"<tr><td>".$rank."</td><td>".$row['player_name']."</td><td>".$profile."</td><td>".$row['stat_kills']."</td><td>".$row['stat_deaths']."</td><td>".$row['stat_assists']."</td><td>".$kda."</td><td>".$row['stat_shots']."</td></tr>";
  $rank ++;
}

echo"</tbody></table>";
}

?>
</div>


</div>