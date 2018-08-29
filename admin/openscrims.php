
<?php
include "../include/dbh.inc.php";
echo"<h3>Closed lobbies</h3>"; 
$sql = "SELECT * FROM scrim_stattus WHERE status = 'off'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)){
     Echo $row['game']."<form method='post' action='../adminInclude/scrimpanel.inc.php'><input name='gamename' value='".$row['game']."' style='display: none;'><input style='display: inline-block;' type='submit' value='open' name='opensignup'></form>";

}

echo "<h3>Open for signup</h3>";
$sql = "SELECT * FROM scrim_stattus WHERE status = 'signup'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)){
     Echo $row['game']."<form method='post' action='../adminInclude/scrimpanel.inc.php'><input name='gamename' value='".$row['game']."' style='display: none;'><input style='display: inline-block;' type='submit' value='Start' name='running'></form>";

}

echo "<h3>Running Lobbies</h3>";
$sql = "SELECT * FROM scrim_stattus WHERE status = 'running'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)){
     Echo $row['game']."<form method='post' action='../adminInclude/scrimpanel.inc.php'><input name='gamename' value='".$row['game']."' style='display: none;'><input style='display: inline-block;' type='submit' value='Close' name='close'></form>";
}

$sql = "SELECT * FROM lolscrimsignup";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)){
	echo "<table><thead><tr></tr></thead><tbody></tbody></table>";
}

