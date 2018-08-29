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
<title>Hearthstone</title>

<?php
  //include the header
  include_once '../headerGames.php';
?>
<link rel="stylesheet" href="../css/thegameshs.css">
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
    background-color: #eaaa29;
    border: none;
  }
  .centerstatstable h1{
  font-weight: bold;
  text-align: center;
  text-transform: uppercase;
  
}


</style><br>
<div class='thegamesback'>
<div class='thegames' data-spy="affix" data-offset-top="83">
<ul class="nav navbar-nav">
<li><a class='gamename' href="./hsmain.php" style="font-size: 20px;"><img src="../images/eshaWhite.png" width='13px' style='margin-top: -5px;'> Hearthstone</a></li> 
<li><a href="./hsteams.php">Teams</a></li>
<li class='gametabactive'><a href="./hsstats.php">Stats</a></li>
<li><a href="./hsstandings.php">Standings</a></li>
<li><a href="./hsschedule.php">Schedule</a></li>
</ul>
</div> 
<br>



</div>