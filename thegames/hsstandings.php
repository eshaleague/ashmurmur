<!DOCTYPE html>
<html>
<head>
<title>Hearthstone</title>
<link rel="stylesheet" href="../css/thegameshs.css">
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
</style><br>
<div class='thegamesback'>
<div class='thegames' data-spy="affix" data-offset-top="83">
<ul class="nav navbar-nav">
<li><a class='gamename' href="./hsmain.php" style="font-size: 20px;"><img src="../images/eshaWhite.png" width='13px' style='margin-top: -5px;'> Hearthstone</a></li> 
<li><a href="./hsteams.php">Teams</a></li>
<li><a href="./hsstats.php">Stats</a></li>
<li class='gametabactive'><a href="./hsstandings.php">Standings</a></li>
<li><a href="./hsschedule.php">Schedule</a></li>
</ul>
</div>


</div>