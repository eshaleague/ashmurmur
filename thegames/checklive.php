<?php 

$sql = "SELECT * FROM seasoninfo WHERE is_current= 'yes'";
$result = mysqli_query($conn, $sql);
$resultCheck= mysqli_num_rows($result);

if ($resultCheck < 1) {
	header("Location: ./undermaintenance.php");

}
