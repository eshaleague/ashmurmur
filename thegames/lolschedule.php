<!DOCTYPE html>
<html>
<head>
<title>League of Legends</title>
<link rel="stylesheet" href="../css/thegames.css">
<?php
  //include the header
  include_once '../headerGames.php';
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
</style>
<div class='thegamesback'>
<div class='thegames' data-spy="affix" data-offset-top="83">
<ul class="nav navbar-nav">
<li><a class='gamename' href="./lolmain.php"><img src="../images/eshaWhite.png" width='13px' style='margin-top: -5px;'> League of Legends</a></li> 
<li><a href="./lolteams.php">Teams</a></li>
<li><a href="./lolstats.php">Stats</a></li>
<li><a href="./lolstandings.php">Standings</a></li>
<li class='gametabactive'><a href="./lolschedule.php">Schedule</a></li>
</ul>
</div>


</div>