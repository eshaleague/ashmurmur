<!DOCTYPE html>
<html>
<head>
<title>ROCKET LEAGUE</title>
<link rel="stylesheet" href="../css/thegamescsgo.css">
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
<li><a class='gamename' href="./csgomain.php" style="font-size: 15px;"><img src="../images/eshaWhite.png" width='25px' style='margin-top: -5px;'> ROCKET LEAGUE</a></li> 
<li><a href="./csgoteams.php">Teams</a></li>
<li><a href="./csgostats.php">Stats</a></li>
<li><a href="./csgostandings.php">Standings</a></li>
<li class='gametabactive'><a href="./csgoschedule.php">Schedule</a></li>
</ul>
</div>


</div>