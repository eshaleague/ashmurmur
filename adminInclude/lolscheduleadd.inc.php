<?php
include'checkadmin.php';
if (isset($_POST['submit'])) {
	include '../include/dbh.inc.php';
	header("Location: ../admin/lolscheduleadmin.php");
	
	$sql = "INSERT INTO lolschedule (id) VALUES (NULL);";
	mysqli_query($conn, $sql);


}

