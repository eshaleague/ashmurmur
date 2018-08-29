<?php
include'checkadmin.php';
if (isset($_POST['submit'])) {
	include '../include/dbh.inc.php';
	header("Location: ../admin/seasoncontrol.php");
	
	$sql = "INSERT INTO seasoninfo (id) VALUES (NULL);";
	mysqli_query($conn, $sql);


}

