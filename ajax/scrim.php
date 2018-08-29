<?php
$method = trim($_POST['method']);
if ($method === 'closescrimlobby') {
	include '../include/dbh.inc.php';
	$game = $_POST['game'];
	$sql = "SELECT * FROM scrim_stattus WHERE game = '$game' AND status = 'running'";
	$result = mysqli_query($conn, $sql);
	$resultCheck= mysqli_num_rows($result);

	if ($resultCheck >= 1) {
		echo"online";
		
	}else{
		echo '<p style="color: white;">This lobby has been closed</p>';
	}
}
