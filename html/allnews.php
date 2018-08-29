<!DOCTYPE html>
<html>
<head>
	<title>FAQ</title>
	<?php
  //include the header
  include_once '../headerMain.php';
  include "../include/dbh.inc.php";
?>
	<link rel="stylesheet" type="text/css" href="../css/news.css">
</head>

<body><br><h1 style="text-align: center;">NEWS</h1><div class="container">
	<div class="row">

	<?php
	$sql = "SELECT * FROM news ORDER BY id DESC";
	$result = mysqli_query($conn, $sql);
	$result2 = mysqli_query($conn, $sql);

	echo "<style>";
	while ($row = mysqli_fetch_assoc($result)){
     	echo '.newsback'.$row['id'].'{background-image:url("../images/news/'.$row['image'].'.jpg")}';

	}
	echo "</style>";

     while ($row = mysqli_fetch_assoc($result2)){
     	$date = date("m/d/Y", $row['timestamp']);
     	echo '<div class="col-sm-4"><div class="allnewscard"><a href="../html/newsarticle.php?id='.$row['id'].'"><div class="news-panel newsback'.$row['id'].'"><h4>'.$date.'</h4><h3>'.$row['title'].'</h3><p>'.substr($row['text'], 0, 60).'...</p></div></a></div></div>';

	}


	?>
</div></div></div>
</body>
</html>