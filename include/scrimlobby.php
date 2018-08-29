<!DOCTYPE html>
<html>
<head>
	<title>Scrim Lobby</title>
	<link rel="stylesheet" type="text/css" href="../css/try.css">
</head>
<body class="scrimlobby">
<?php
$lobbycreator = "";

include('dbh.inc.php');

$matchup = $_POST['matchup'];
$game = $_POST['game'];

$sql = "SELECT * FROM live_scrims WHERE team = '$matchup' AND game = '$game'";
$result = mysqli_query($conn, $sql);

if($row = mysqli_fetch_assoc($result)){
	$lobbycreator = $row['username'];
	echo "<br><h1>".$game." Scrim Lobby</h1><br><div class='scrim-head-buttons'><a href='https://discord.gg/7dMJQAJ' target='_blank'><button>Join<br>Discord</button></a><a href='https://goo.gl/forms/WG0CltfzD13P3BTt2' target='_blank'><button>Submit<br>Highlight</button></a></div><br>";
	//depening on the game change the header
	if ($game == "League of Legends") {
		echo"<div class='scrimgameheader' id='lolscrimheader'></div>";
	}
}

echo"<div class='scrimteams'>";
$sql = "SELECT * FROM live_scrims WHERE team = '$matchup' AND game = '$game'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
	echo "<div class='player'>".$row['username']."</div>";
}

echo"</div>";
echo"<br><h2><b>*".$lobbycreator."</b> is in charge of creating the custom game</h2>";

$sql = "SELECT * FROM live_scrims WHERE team = '$matchup'";
$result = mysqli_query($conn, $sql);

if($row = mysqli_fetch_assoc($result)){
	//depening on the game change the header
	if ($game == "League of Legends") {
		echo"<br><div class='lolscrimlobbyinfo'><h1>Lobby Info</h1><table>
		<tr><td>Lobby Name:</td><td>eshascrim".$matchup."</td></tr>
		<tr><td>Password:</td><td>ybbol".$matchup."</td></tr>
		<tr><td>Game Type:</td><td>Tournament Draft</td></tr>
		<tr><td>Spectators:</td><td>All</td></tr>
		</table></div>";
	}
}


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
closescrim= function(){
$.ajax({
url: '../ajax/scrim.php',
type: 'post',
data: {method: 'closescrimlobby', game: <?php echo "'".$game."'";?>},
success: function(data){
if (data != 'online') {
$("body").html(data);
}
}
});
}

interval = setInterval(closescrim , 60000);
closescrim();
</script>
</body>
</html>

