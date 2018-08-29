<!DOCTYPE html>
<html>
<head>
<title>Hearthstone</title>
<link rel="stylesheet" href="../css/thegameshs.css">
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
  background-color: #eaaa29 !important;
  color: white;
}
</style><br>
<div class='thegamesback'>
<div class='thegames' data-spy="affix" data-offset-top="83">
<ul class="nav navbar-nav">
<li><a class='gamename' href="./hsmain.php" style="font-size: 20px"><img src="../images/eshaWhite.png" width='13px' style='margin-top: -5px;'> Hearthstone</a></li> 
<li class='gametabactive'><a href="./hsteams.php">Teams</a></li>
<li><a href="./hsstats.php">Stats</a></li>
<li><a href="./hsstandings.php">Standings</a></li>
<li><a href="./hsschedule.php">Schedule</a></li>
</ul>
</div>

<div class="container">
  <h1 style="font-weight: bolder; font-size: 30px; border-bottom: 4px solid #eaaa29; width: 165px;">THE TEAMS</h1>
  <div class="row">
  <?php 
    $sql = "SELECT * FROM currentseason WHERE game='Hearthstone'";
    $result = mysqli_query($conn, $sql);
    $teams = [];
    
    while($row = mysqli_fetch_assoc($result)){
      $teamname = $row['club_name'];
      if (in_array($teamname, $teams)){
        
      }else{
        array_push($teams, $teamname);
      }
    }

    foreach ($teams as $key) {
      $club_name = $key;
      
      echo '<div class="col-sm-3">
      <div class="teamcard">
      <div class="players"><h2>'.$key.'</h2><ul>
      ';
      
      $sql = "SELECT player_name FROM currentseason WHERE game = 'Hearthstone' AND club_name = '$club_name' ";
      $result = mysqli_query($conn, $sql);
      
      while($row = mysqli_fetch_assoc($result)){
        echo"<li>".$row['player_name']."</li>";
      }
      echo'
      </ul></div>
      <br><center><img src="../images/rosterProfiles/'.$key.'LOL.png" style="width: 150px;"></center><br>
      <p>'.$key.'</p>
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

