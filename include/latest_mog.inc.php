<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

include 'dbh.inc.php';
$url = "";
//find the lates video in the table and redircets for user 
$sql = "SELECT * FROM esha_videos WHERE id=(SELECT max(id) FROM esha_videos)";
$result = mysqli_query($conn, $sql);

if ($row = mysqli_fetch_assoc($result)){
$url = $row['url'];
}
