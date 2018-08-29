<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include 'dbh.inc.php';


if(isset($_POST['submit']) ){
	$gameid = mysqli_real_escape_string($conn, $_POST['gameid']);
	
	if (empty($gameid)){
		header("Location: ../career.php?gameid=empty");
		exit();
	}

	else{
		//for league of legends
		if ($_SESSION['idGame'] == "League of Legends"){
			require_once('../php-riot-api-master/php-riot-api.php');
			$instance = new riotapi('na1');
			
			//summoner name exists
			try {
			$r = $instance->getSummonerId($gameid);
			$username = $_SESSION['u_username'];
			$sql = "UPDATE currentseason SET game_id='$r' WHERE player_name ='$username'";
			mysqli_query($conn, $sql);
			header("Location: ../career.php?gameid=success");
			} 
			//summoner name does not exist
			catch(Exception $e) {
			echo "Error: " . $e->getMessage();
			header("Location: ../career.php?gameid=failure");

			};		
		}
		//for steam
		else if ($_SESSION['idGame'] == "Rocket League"){
			//header("Location: ../career.php?gameid=csgo");
			require('../vendor/autoload.php');
			$client = new \Zyberspace\SteamWebApi\Client('26896FAB283A62FF7264998A55E2252E');
			$steamUser = new \Zyberspace\SteamWebApi\Interfaces\ISteamUser($client);
			$response = $steamUser->GetPlayerSummariesV2($gameid);

			foreach ($response->response->players as $player) {
				$steamid = $player->personaname;
			}
			//steam id returns nothing therfore not valie
			if ($steamid == "") {
				header("Location: ../career.php?gameid=failure");
			}
			//steam id returns a name and is valid
			else{
				$username = $_SESSION['u_username'];
				$sql = "UPDATE currentseason SET game_id='$gameid' WHERE player_name ='$username'";
				mysqli_query($conn, $sql);
				header("Location: ../career.php?gameid=success");
			}

		}
		//Hearthstone, no api because lazy
		else if ($_SESSION['idGame'] == "Hearthstone"){
		$username = $_SESSION['u_username'];
		$sql = "UPDATE currentseason SET game_id='$gameid' WHERE player_name ='$username'";
		mysqli_query($conn, $sql);
		header("Location: ../career.php?gameid=success");
			

		}
	
		



	}
}


