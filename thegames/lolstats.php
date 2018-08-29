<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$_SESSION['rank_stats'] = [];
include('../include/dbh.inc.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>League of Legends</title>

<?php
  //include the header
  include_once '../headerGames.php';
?>
<link rel="stylesheet" href="../css/thegames.css">
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
    background-color: #013f7a;
    border: none;
  }
  .centerstatstable h1{
  font-weight: bold;
  text-align: center;
  text-transform: uppercase;
  
}


</style>
<div class='thegamesback'>
<div class='thegames' data-spy="affix" data-offset-top="83">
<ul class="nav navbar-nav">
<li><a class='gamename' href="./lolmain.php"><img src="../images/eshaWhite.png" width='13px' style='margin-top: -5px;'> League of Legends</a></li> 
<li><a href="./lolteams.php">Teams</a></li>
<li class='gametabactive'><a href="./lolstats.php">Stats</a></li>
<li><a href="./lolstandings.php">Standings</a></li>
<li><a href="./lolschedule.php">Schedule</a></li>
</ul>
</div> 
<br>
<div class="centerstatstable">
<?php
$sql = "SELECT stat_entries.*, (stat_entries.stat_kills + stat_entries.stat_assists - stat_entries.stat_deaths ) AS ranking, currentseason.club_name, currentseason.team_letter FROM stat_entries INNER JOIN currentseason ON stat_entries.player_name = currentseason.player_name WHERE game_name = 'League of Legends' AND UNIX_TIMESTAMP() - time < 604800 order by ranking desc limit 5";
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
    <td>Kills</td>
    <td>Deaths</td>
    <td>Assists</td>
    <td>KDA</td>
    <td>Gold</td>
    <td>CS</td>
  </tr></thead>
<tbody>";
$rank = 1;
while($row = mysqli_fetch_assoc($result)){
$profile = "<img align='center'width='35px' src=../images/rosterProfiles/".$row['club_name'].$row['team_letter']."LOL.png>";
if ($row['stat_deaths'] == 0) {
$kda = round(($row['stat_kills']+ $row['stat_assists']),1);
}else{
$kda = round(($row['stat_kills']+ $row['stat_assists'])/ $row['stat_deaths'],1);
}
  Echo"<tr><td>".$rank."</td><td>".$row['player_name']."</td><td>".$profile."</td><td>".$row['stat_kills']."</td><td>".$row['stat_deaths']."</td><td>".$row['stat_assists']."</td><td>".$kda."</td><td>".$row['stat_gold']."</td><td>".$row['stat_cs']."</td></tr>";
  $rank ++;
}

echo"</tbody></table>";
}

?>
<br><br>
<h1 style='font-size: 35px; text-align: left;'>Leaderboard</h1>
<input type="text" onKeyUp="searchplayerstats(this.value)" autocomplete="off" name="qu" id="qu" class="textbox" placeholder="Search Player" tabindex="1" style="position: relative; right: 0;">
<div id="statresults">
<table>
  <thead>
  <tr>
    <td>Rank</td>
    <td>Player</td>
    <td>Team</td>
    <td>Kills</td>
    <td>Deaths</td>
    <td>Assists</td>
    <td>KDA</td>
    <td>Gold</td>
    <td>CS</td>
  </tr></thead>
  <tbody>
    <?php

      $sql="select *, ((stat_cs + stat_gold - stat_deaths + stat_kills + stat_assists)/stat_matches) AS ranking from currentseason where game = 'League of Legends' order by ranking desc";
      $result = mysqli_query($conn, $sql);

      while($row= mysqli_fetch_assoc($result))
      {
          //append to the array to determine rank on search 
          if ($row['stat_matches'] == 0) {
            $rank_stats = 0;
          }
          else{
            $rank_stats = ($row['stat_cs'] + $row['stat_gold'] - $row['stat_deaths'] + $row['stat_kills'] + $row['stat_assists'])/$row['stat_matches'];
          }
          array_push($_SESSION['rank_stats'] , $rank_stats);
          $rank = array_search($rank_stats, $_SESSION['rank_stats']) + 1;
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
          if ($row['stat_deaths'] == 0) {
            $kda = round(($row['stat_kills']+ $row['stat_assists']),1);
          }else{
            $kda = round(($row['stat_kills']+ $row['stat_assists'])/ $row['stat_deaths'],1);
          }


          echo "<tr><td>".$rank."</td><td>".$row['player_name']."</td><td><img align='center'width='35px'src='../images/rosterProfiles/".$profile."'></td><td>".$kills."</td><td>".$deaths."</td><td>".$assists."</td><td>".$kda."</td><td>".$gold."</td><td>".$cs."</td></tr>";
      }
    ?>
  
  </tbody>
</table>

</div>
</div>


<script type="text/javascript">

  function searchplayerstats(str)
{
var s1=document.getElementById("qu").value;
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("statresults").innerHTML="<table><thead><tr><td>Rank</td><td>Player</td><td>Team</td><td>Kills</td><td>Deaths</td><td>Assists</td><td>KDA</td><td>Gold</td><td>CS</td></tr></thead><tbody>"+xmlhttp.responseText+"</table>";
    }
  }
xmlhttp.open("GET","findplayerstats.php?lolstat="+s1,true);
xmlhttp.send(); 
}
</script>


</div>