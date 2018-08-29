<?php
include'checkadmin.php';
if (isset($_POST['submit'])) {
	include '../include/dbh.inc.php';
	header("Location: ../admin/csgoscheduleadmin.php");
	
	$sql = "INSERT INTO rocketleagueschedule (id) VALUES (NULL);";
	mysqli_query($conn, $sql);


}

