<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    
if ($_SESSION['u_type'] !== 'admin' || isset($_SESSION['u_type']) === false) {
	header("Location: index.html");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<link rel="stylesheet" type="text/css" href="./css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="jquery.tabledit.min.js"></script>
</head>
<body>
<?php
	echo '<form action="include/logout.inc.php" method="POST">
						<button type="submit" name="submit">Logout</button>
						</form>';
?>
<div class="admins">
	<br>
	<img src="./images/eshadark.png" style="width: 50px; display: block; margin: auto;">
<h1>ESHA ADMINS</h1><br>
<div class="container">
  <ul class="nav nav-tabs">
  	<!--///////////////////////////tab names///////////////////////////////////////////////////////////-->
    <li class="active"><a data-toggle="tab" href="#home">Current Sesason Participants</a></li>
    <li><a data-toggle="tab" href="#menu1">Tournament Schedules</a></li>
    <li><a data-toggle="tab" href="#menu2">GAME DAYS</a></li>
    <li><a data-toggle="tab" href="#menu3">Users</a></li>
    <li><a data-toggle="tab" href="#menu4">Other</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    	<!--///////////////////////////current season participants///////////////////////////////////////////////////////////-->
		   <div class="container">  
		   <br/>  
		     <div class="table-responsive">   
		    <table id="editable_table" class="table table-bordered table-striped">
		     <thead>
		      <tr>
		       <th>ID</th>
		       <th>player_name</th>
		       <th>game</th>
		       <th>game_id</th>
		       <th>club_name</th>
		       <th>team_letter</th>
		      </tr>
		     </thead>
		     <tbody>
		     <?php
		     include './include/dbh.inc.php';
		     	$query = "SELECT * FROM currentseason";
				$result = mysqli_query($conn, $query);
		     while($row = mysqli_fetch_array($result))
		     {
		      echo '
		      <tr>
		       <td>'.$row["id"].'</td>
		       <td>'.$row["player_name"].'</td>
		       <td>'.$row["game"].'</td>
		       <td>'.$row["game_id"].'</td>
		       <td>'.$row["club_name"].'</td>
		       <td>'.$row["team_letter"].'</td>
		      </tr>
		      ';
		     }
		     ?>
		     
		     </tbody>

		    </table>

		   </div> 
		   <form action="./adminInclude/currentseasonadd.inc.php" method="POST">
		   		<button type="submit" name="submit">+Add item</button>
		   	
		   </form>
		   <script>  
				$(document).ready(function(){  
			     $('#editable_table').Tabledit({
			      url:'adminInclude/currentseason.php',
			      columns:{
			       identifier:[0, "id"],
			       editable:[[1, 'player_name'], [2, 'game'], [3, 'game_id'], [4, 'club_name'], [5, 'team_letter']]
			      },
			      restoreButton:false,
			      onSuccess:function(data, textStatus, jqXHR)
			      {
			       if(data.action == 'delete'){
			        $('#'+data.id).remove();
			       }
			      }
			     });
			 
			});  
			</script>
		  </div> 
		 </div> 
		 
    <br>
    <div id="menu1" class="tab-pane fade">
    	<!--///////////////////////////Tournament Scheudles///////////////////////////////////////////////////////////-->
      <div class="container">

		<ul>  
		<li><a href="./admin/seasoncontrol.php">Seasons Controller</a></li><br>
		<li><a href="./admin/lolscheduleadmin.php">League of Legends</a></li>
		<li><a href="./admin/csgoscheduleadmin.php">Rocket League</a></li>
		<li><a href="./admin/hearthstonescheduleadmin.php">Hearthstone</a></li>
		</ul>

</div>
    </div>
    <div id="menu2" class="tab-pane fade">
    	<!--///////////////////////////Stuff on tournament days///////////////////////////////////////////////////////////-->
       <div class="container">
       		<ul>
       			<li><a href="./admin/launchlobbies.php">Lobbies</a></li>
       			<li><a href="./admin/lolstatsupdate.php">LOL:update stats</a></li>
       			<li><a href="./admin/csgostatsupdate.php">Rocket League:update stats</a></li>
       		</ul>
		

		</div>
	</div>
    <div id="menu3" class="tab-pane fade"> 
    	 <div class="container">
       		<ul>
       			<li><a href="./admin/xpcontrol.php">XP Panel</a></li>
       		</ul>
    </div>
  </div>
  <div id="menu4" class="tab-pane fade"> 
    	 <div class="container">
       		<ul>
       			<li><a href="./admin/addnews.php">Add News</a></li>
       			<li><a href="./admin/openscrims.php">Start Scrims</a></li>
       		</ul>
    </div>
  </div>
  </div>
</div>

 </body>  
</html>  
