<?php
include'checkadmin.php';
if (isset($_POST['submit'])) {
	include '../include/dbh.inc.php';
	header("Location: ../admin/hearthstonescheduleadmin.php");
	
	$sql = "INSERT INTO hearthstoneschedule (id) VALUES (NULL);";
	mysqli_query($conn, $sql);


}

