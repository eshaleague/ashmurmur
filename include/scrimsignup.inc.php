<?php

include "../include/dbh.inc.php";

if (isset($_POST['signup'])) {
	if ($_POST['game'] == "League of Legends") {
		$user = $_POST['user'];
		$sql = "INSERT INTO lolscrimsignup (username, game) VALUES ('$user','League of Legends');";
		mysqli_query($conn, $sql);

	}
}

header("Location: ../career.php#menu2");