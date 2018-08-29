<?php
if(!isset($_SESSION)) { 
    session_start(); 
} 

include 'dbh.inc.php';
$letters = $_SESSION['team1letter'] ;
$club = $_SESSION['team1club'] ;
$game = $_SESSION['gamename'] ;
$incharge = '';

$sqq = "SELECT * FROM currentseason WHERE team_letter = '$letters' AND club_name = '$club' AND game = '$game'";
$result = mysqli_query($conn, $sqq);

if ($row = mysqli_fetch_assoc($result)){
$incharge = '*'.$row['player_name'].' is in charge of creating<br> the custom game in League of Legends';

}

echo "<br><br><div class='lolcustomlobby'><h1>Lobby info</h1><table>
	<tr>
		<td>Lobby Name:</td>
		<td>esha-".substr($_SESSION['lobby'] , 5, 10 )."</td>
	</tr>
	<tr>
		<td>Password:</td>
		<td>".$_SESSION['lobby']."</td>
	</tr>
	<tr>
		<td>Game Type:</td>
		<td>Tournament Draft</td>
	</tr>
	<tr>
		<td>Spectators:</td>
		<td>All</td>
	</tr>


	</table><h2>".$incharge."</h2></div>";