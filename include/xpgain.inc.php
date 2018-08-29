<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
//video watch  
$u_id = $_SESSION['u_id'];
$last_watch = 0;
 //include get the latest video
include 'latest_mog.inc.php';
include 'dbh.inc.php';
$sql = "SELECT last_video_watch FROM users WHERE user_id = '$u_id'";
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_assoc($result)){
	$last_watch =  $row['last_video_watch'];
}

if($last_watch != 0 && time()-$last_watch < 86400){
	echo"<div class='day_video_block'>Please come back tomorrow!</div>";

}
echo "<div class='xp-task'> <p>Watch The Latest<br>Moments of Glory</p>
<button id='watch_mog'>+25</button>
</div>";

echo "<br><div class='xp-task'> <p>Submit a clip to<br>Moments of Glory</p>
<a style='text-decoration: none; color: black;' target= '_blank' href='https://goo.gl/forms/MzDs8VgG5ZB6pDYu1'><button id='watch_mog'>+100</button></a>
</div>";

echo "<br><div class='xp-task'> <p>Have clip featured on<br>Moments of Glory</p>
<button id='watch_mog'>+1000</button>
</div>";

echo"<script src='js/videoxp.js'></script>";
//this is the video overlay that will be showed when the user presses the button
echo'<div class="video_overlay"><button id="video_xp_play">&#9658</button><center><div id="play_block"></div><iframe id="video" width="500" height="400" src="'.$url.'?rel=0" frameborder="0" allowfullscreen></iframe><div id="xp_video_seconds">Watch for 40 seconds to earn xp</div></center><div id="watch_mog_close">x</div></div>';