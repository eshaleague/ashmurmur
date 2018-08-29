<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include '../include/dbh.inc.php';
include'../adminInclude/checkadmin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/lobbylauncher.css">
</head>
<body>
<div class="lobbylaunch">
<h3>League of Legends</h3>
<?php
//lol
$sqr = "SELECT * FROM lolschedule WHERE winner = ''";
$result = mysqli_query($conn, $sqr);
$resultCheck= mysqli_num_rows($result);
if ($resultCheck >= 1) {
    while ($row = mysqli_fetch_assoc($result)){
    	//display the games and have them ready to be launched
    	echo "<div class='lobbyrow'>";
     	echo "<p>".$row['team1']." VS ".$row['team2']."(".$row['date'].")"."</p>";
     	echo "<form action='lobbylauncher.php' method='post'><input name='lobbyname'style='display: none;'type='text' value='lobby".$row['team1'][0].substr($row['team1'], 2, 3).$row['team1'][-1].$row['team2'][0].substr($row['team2'], 2, 3).$row['team2'][-1]."lol'>

     	<input name='matchup'style='display: none;'type='text' value='".$row['team1']." VS ".$row['team2']."(".$row['date'].")"."lol'>

     	<button type='submit' name='submit'>Launch</button></form>";
     	echo "</div>";
	}

}
?>
<h3>Rocket League</h3>
<?php
//rocketleague
$sqr = "SELECT * FROM rocketleagueschedule WHERE winner = ''";
$result = mysqli_query($conn, $sqr);
$resultCheck= mysqli_num_rows($result);
if ($resultCheck >= 1) {
    while ($row = mysqli_fetch_assoc($result)){
    	//display the games and have them ready to be launched
    	echo "<div class='lobbyrow'>";
     	echo "<p>".$row['team1']." VS ".$row['team2']."(".$row['date'].")"."</p>";
     	echo "<form action='lobbylauncher.php' method='post'><input name='lobbyname'style='display: none;'type='text' value='lobby".$row['team1'][0].substr($row['team1'], 2, 3).$row['team1'][-1].$row['team2'][0].substr($row['team2'], 2, 3).$row['team2'][-1]."rocketleague'>

     	<input name='matchup'style='display: none;'type='text' value='".$row['team1']." VS ".$row['team2']."(".$row['date'].")"."rocketleague'>

     	<button type='submit' name='submit'>Launch</button></form>";
     	echo "</div>";
	}
}

?>
<h3>Hearthstone</h3>
<?php
//rocketleague
$sqr = "SELECT * FROM hearthstoneschedule WHERE winner = ''";
$result = mysqli_query($conn, $sqr);
$resultCheck= mysqli_num_rows($result);
if ($resultCheck >= 1) {
    while ($row = mysqli_fetch_assoc($result)){
        //display the games and have them ready to be launched
        echo "<div class='lobbyrow'>";
        echo "<p>".$row['team1']." VS ".$row['team2']."(".$row['date'].")"."</p>";
        echo "<form action='lobbylauncher.php' method='post'><input name='lobbyname'style='display: none;'type='text' value='lobby".$row['team1'].$row['team2']."hearthstone'>

        <input name='matchup'style='display: none;'type='text' value='".$row['team1']." VS ".$row['team2']."(".$row['date'].")"."hearthstone'>

        <button type='submit' name='submit'>Launch</button></form>";
        echo "</div>";
    }
}

?>
</div>
<div class="runninglobbies">
<h1>Running Lobbies</h1>
<?php
//display the lobbies that are running
$sqr = "SELECT * FROM lobbystatus WHERE status = 'yes'";
$result = mysqli_query($conn, $sqr);
$resultCheck= mysqli_num_rows($result);
if ($resultCheck >= 1) {
    while ($row = mysqli_fetch_assoc($result)){
        
        //take the last three character of the lobby name to determing the game because im bad ad code and should have planned this ahead of time
        $gamename = "";
        if(substr($row['lobby_name'], -3, 3) == "lol"){
            $matchupsplit = explode(" ", $row['matchup']);
            $gamename ="League of Legends";
            echo "<p>".$row['matchup']."[".$row['lobby_name']."]"."</p>";

        echo "<form action = '../lobbies/test.php' method = 'POST'><input style='display: none;'type='text' name = 'thelobby'value='".$row['lobby_name']."'>


        <input style='display: none;'type='text' name = 'teamletter1'value='".$matchupsplit[1]."'>
        <input style='display: none;'type='text' name = 'clubname1'value='".$matchupsplit[0]."'>
        <input style='display: none;'type='text' name = 'teamletter2'value='".substr($matchupsplit[4], 0, 1)."'>
        <input style='display: none;'type='text' name = 'clubname2'value='".$matchupsplit[3]."'>
        <input style='display: none;'type='text' name = 'gamename'value='".$gamename."'>

        <button type='submit'>join match</button></form>";

        //add button to delete the lobby 
        echo"<form action='closelobby.php' method ='POST'><input style='display: none;' value =".$row['lobby_name']." name='lobbyname'><button name='submit' type='submit'>Close Lobby</button></form><br>";
        }
        else if (substr($row['lobby_name'], -3, 3) == "gue"){
            $matchupsplit = explode(" ", $row['matchup']);
             $gamename ="Rocket League";
             echo "<p>".$row['matchup']."[".$row['lobby_name']."]"."</p>";

        echo "<form action = '../lobbies/test.php' method = 'POST'><input style='display: none;'type='text' name = 'thelobby'value='".$row['lobby_name']."'>


        <input style='display: none;'type='text' name = 'teamletter1'value='".$matchupsplit[1]."'>
        <input style='display: none;'type='text' name = 'clubname1'value='".$matchupsplit[0]."'>
        <input style='display: none;'type='text' name = 'teamletter2'value='".substr($matchupsplit[4], 0, 1)."'>
        <input style='display: none;'type='text' name = 'clubname2'value='".$matchupsplit[3]."'>
        <input style='display: none;'type='text' name = 'gamename'value='".$gamename."'>

        <button type='submit'>join match</button></form>";

        //add button to delete the lobby 
        echo"<form action='closelobby.php' method ='POST'><input style='display: none;' value =".$row['lobby_name']." name='lobbyname'><button name='submit' type='submit'>Close Lobby</button></form><br>";
        }
        else if (substr($row['lobby_name'], -3, 3) == "one"){
            $matchupsplit = explode(" ", $row['matchup']);
             $gamename ="Hearthstone";
             echo "<p>".$row['matchup']."[".$row['lobby_name']."]"."</p>";

        echo "<form action = '../lobbies/test.php' method = 'POST'><input style='display: none;'type='text' name = 'thelobby'value='".$row['lobby_name']."'>


        <input style='display: none;'type='text' name = 'teamletter1'value='".$matchupsplit[0]."'>
        <input style='display: none;'type='text' name = 'clubname1'value=''>
        <input style='display: none;'type='text' name = 'teamletter2'value='".$matchupsplit[2]."'>
        <input style='display: none;'type='text' name = 'clubname2'value=''>
        <input style='display: none;'type='text' name = 'gamename'value='".$gamename."'>

        <button type='submit'>join match</button></form>";

        //add button to delete the lobby 
        echo"<form action='closelobby.php' method ='POST'><input style='display: none;' value =".$row['lobby_name']." name='lobbyname'><button name='submit' type='submit'>Close Lobby</button></form><br>";
        }
    	
    	
	}

}
?>
</div>
</body>
</html>

