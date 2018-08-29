<?php
if(!isset($_SESSION)) { 
    session_start(); 
    
} 
$wobbyname = $_SESSION['lobby'];


require '../core/init.php';
if (isset($_POST['method']) === true && empty($_POST['method']) === false ) {
	
	$chat = new Chat();
	$method = trim($_POST['method']);
	//fetch method
	if ($method === 'fetch') {

		$messages = $chat->fetchMessages($wobbyname);

		if(empty($messages) === true){
			echo'...';
		}

		else{
			foreach($messages as $message){

			//check to see if the user is an admin using the user_id, so like 3, etc.
			$styler = "";
			if ($message['user_id'] == 3){
				$styler = "style='color: red;'";
			}
			?>
				<div class="message">
					<p><span <?php echo $styler; ?>><?php echo $message['user_username'];?> </span>: <?php echo nl2br($message['message']);?> </p>
				</div>
			<?php
			}
		}
	}
	else if ($method === 'throw' && isset($_POST['message']) === true) {
		$message = trim($_POST['message']);
		if (empty($message) === false) {
			//throw it 
			$chat->throwMessage($_SESSION['u_id'] , $message, $wobbyname);
		}
	}

	else if ($method === 'getteam'){
		include '../include/dbh.inc.php';

		echo"<div class='firstteam'>";
		
		//first team
		$players = $chat->getplayers($_SESSION['team1letter'] , $_SESSION['team1club'], $_SESSION['gamename']);
		foreach($players as $player){
				$playerid = "";
				$currentguy = $player['player_name'];
				$fullplayer = $player['player_name'];
				$sql = "SELECT * FROM currentseason WHERE player_name = '$currentguy'";
				$result = mysqli_query($conn, $sql);

		      	if ($row = mysqli_fetch_assoc($result)){
		     		$playerid = $row['game_id'];
				}

				//display the player's in game name, first check which game it is
				if($_SESSION['gamename'] == 'Rocket League'){

					try{
			           	 require('../vendor/autoload.php');
			       		 $client = new \Zyberspace\SteamWebApi\Client('26896FAB283A62FF7264998A55E2252E');
			       		 $steamUser = new \Zyberspace\SteamWebApi\Interfaces\ISteamUser($client);
			       		 $response = $steamUser->GetPlayerSummariesV2($playerid);

				        	foreach ($response->response->players as $playerguy) {
				        	  $r = $playerguy->personaname;
				        	  $fullplayer = $fullplayer.'('.$r.')';
				        	  
				        	}
			           	}catch(Exception $e){
				        	 $fullplayer = $fullplayer;
		       			 }

				}
				elseif ($_SESSION['gamename'] == 'League of Legends') {
					try{
						require_once('../php-riot-api-master/php-riot-api.php');
						$instance = new riotapi('na1');
						$r = $instance->getSummonerById($playerid);
						$fullplayer = $fullplayer.'('.$r.')';
				         } catch(Exception $e){
					       $fullplayer = $fullplayer;
			        }
				}
				
				//checks the time difference with now to see if player is still online or not
				$timetaken = time() - $player['timestamp'];
				if ($timetaken > 20) {
					//player is offline
					echo "<p>".$fullplayer."</p>";
				}else{

					echo "<p  style='background-color: #080d21; color: white;'>".$fullplayer."</p>";
				}
				

	
			}
		echo"</div>";
		//second team
		$chats = new Chat();
		$playersother = $chats->getplayers($_SESSION['team2letter'] , $_SESSION['team2club'], $_SESSION['gamename']);
		echo"<div class='secondteam'>";
		foreach($playersother as $playerother){
			$playerid = "";
				$currentguy = $playerother['player_name'];
				$fullplayer = $playerother['player_name'];
				$sql = "SELECT * FROM currentseason WHERE player_name = '$currentguy'";
				$result = mysqli_query($conn, $sql);

		      	if ($row = mysqli_fetch_assoc($result)){
		     		$playerid = $row['game_id'];
				}

				//display the player's in game name, first check which game it is
				if($_SESSION['gamename'] == 'Rocket League'){

					try{
			           	 require('../vendor/autoload.php');
			       		 $client = new \Zyberspace\SteamWebApi\Client('26896FAB283A62FF7264998A55E2252E');
			       		 $steamUser = new \Zyberspace\SteamWebApi\Interfaces\ISteamUser($client);
			       		 $response = $steamUser->GetPlayerSummariesV2($playerid);

				        	foreach ($response->response->players as $playerguy) {
				        	  $r = $playerguy->personaname;
				        	  $fullplayer = $fullplayer.'('.$r.')';
				        	  
				        	}
			           	}catch(Exception $e){
				        	 $fullplayer = $fullplayer;
		       			 }

				}
				elseif ($_SESSION['gamename'] == 'League of Legends') {
					try{
						require_once('../php-riot-api-master/php-riot-api.php');
						$instance = new riotapi('na1');
						$r = $instance->getSummonerById($playerid);
						$fullplayer = $fullplayer.'('.$r.')';
				         } catch(Exception $e){
					       $fullplayer = $fullplayer;
			        }
				}
				
				//checks the time difference with now to see if player is still online or not
				$timetaken = time() - $playerother['timestamp'];
				if ($timetaken > 20) {
					//player is offline
					echo "<p>".$fullplayer."</p>";
				}else{

					echo "<p  style='background-color: #080d21; color: white;'>".$fullplayer."</p>";
				}
				


			
			}
		echo"</div><br>";

	}
	else if ($method === 'updatetime') {
		$chat->updatetime($_SESSION['u_username']);
	}
	else if ($method === 'closelobby') {
		include '../include/dbh.inc.php';
		$sql = "SELECT * FROM lobbystatus WHERE lobby_name = '$wobbyname'";
		$result = mysqli_query($conn, $sql);

		if ($row = mysqli_fetch_assoc($result)){

		     if($row['status'] == 'no'){
		     	echo '<p style="color: white;">This lobby has been closed</p>';
		     }
		     else{
		     	echo'online';
		     }

		}


	}
}