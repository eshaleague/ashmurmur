<!DOCTYPE html>
<html>
<head>
<title>League of Legends</title>
<link rel="stylesheet" href="../css/thegames.css">
<link rel="stylesheet" href="../css/thegametheteams.css">
<?php
  //include the header
  include_once '../headerGames.php';
  include '../include/dbh.inc.php';

?>
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
  .teamcardactive{
  background-color: #013f7a !important;
  color: white;
}
</style>
<div class='thegamesback'>
<div class='thegames' data-spy="affix" data-offset-top="83">
<ul class="nav navbar-nav">
<li><a class='gamename' href="./lolmain.php"><img src="../images/eshaWhite.png" width='13px' style='margin-top: -5px;'> League of Legends</a></li> 
<li class='gametabactive'><a href="./lolteams.php">Teams</a></li>
<li><a href="./lolstats.php">Stats</a></li>
<li><a href="./lolstandings.php">Standings</a></li>
<li><a href="./lolschedule.php">Schedule</a></li>
</ul>
</div>

<div class="container">
  <h1 style="font-weight: bolder; font-size: 30px; border-bottom: 4px solid #013f7a; width: 165px;">THE TEAMS</h1>
  <div class="row">
  <?php 
    $sql = "SELECT * FROM currentseason WHERE game = 'League of Legends'";
    $result = mysqli_query($conn, $sql);
    $teams = [];
    
    while($row = mysqli_fetch_assoc($result)){
      $teamname = $row['club_name'] . $row['team_letter'];
      if (!in_array($teamname, $teams)){
        array_push($teams, $teamname);
      }
    }
    foreach ($teams as $key) {
      $club_name = substr($key, 0, -1);
      $team_letter = substr($key, -1);
      
      echo '<div class="col-sm-3">
      <div class="teamcard">
      <div class="players"><h2>'.substr($key, 0, -1).'('.substr($key, -1).')'.'</h2><ul>
      ';
      
      $sql = "SELECT player_name FROM currentseason WHERE game = 'League of Legends' AND club_name = '$club_name' AND team_letter = '$team_letter'";
      $result = mysqli_query($conn, $sql);
      
      while($row = mysqli_fetch_assoc($result)){
        echo"<li>".$row['player_name']."</li>";
      }
      echo'
      </ul></div>
      <br><center><img src="../images/rosterProfiles/'.$key.'LOL.png" style="width: 150px;"></center><br>
      <p>'.substr($key, 0, -1).'('.substr($key, -1).')'.'</p>
      <button>VIEW ROSTER</button>
      </div>
    </div>';
    };
    

  ?>
    
  
</div>
<script type="text/javascript">
$(document).ready(function(){
  $("button").click(function(){
      $(this).prevAll(".players").slideToggle();
      $(this).toggleClass("teamcardactive");
  });
});
</script>








</div>
</div>

