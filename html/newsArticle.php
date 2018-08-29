<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	include "../include/dbh.inc.php";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>FAQ</title>
	<?php
  //include the header
  include_once '../headerMain.php';
?>
	<link rel="stylesheet" type="text/css" href="../css/news.css">
</head>
<body><br>
<div class="news-wrapper" style="padding: 2%;">
	<?php
	$sql = "SELECT * FROM news WHERE id = '$id'";
	$result = mysqli_query($conn, $sql);

  	if ($row = mysqli_fetch_assoc($result)){
  		$date = date("m/d/Y", $row['timestamp']);

  		echo "<h1>".$row['title']."</h1>";
  		echo "<h2>".$date."<span> By ".$row['author']."</span></h2>";
  		echo '<img src="../images/news/'.$row['image'].'.jpg" style="width: 100%;" class="img-responsive"><br>';
  		echo "<p>".$row['text']."</p>";

	}


	?>
</div>
</body>
</html>