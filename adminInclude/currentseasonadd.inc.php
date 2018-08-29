<?php
include'checkadmin.php';
if (isset($_POST['submit'])) {
	include '../include/dbh.inc.php';
	header("Location: ../admin.php");
	
	$sql = "INSERT INTO currentseason (id) VALUES (NULL);";
	mysqli_query($conn, $sql);


}

