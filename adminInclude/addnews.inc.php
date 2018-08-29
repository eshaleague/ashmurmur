<?php
if (isset($_POST['news'])) {
	$title = $_POST['title'];
	$image = $_POST['image'];
	$text = $_POST['text'];
	$author= $_POST['author'];
	$text = str_replace("'", "â€™", $text);
	require "../include/dbh.inc.php";
	$qweqwe = "INSERT INTO news(`title`, `image`, `text`, `timestamp`, `author`) VALUES ('$title', '$image', '$text', UNIX_TIMESTAMP(), '$author')";
	mysqli_query($conn, $qweqwe);
	header("Location: ../admin/addnews.php");
}

