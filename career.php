<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_SESSION['u_type']) === true) {

	if ($_SESSION['u_type'] === 'admin') {
		header("Location: admin.php");
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
<title>ESHA -My Account</title>
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="icon" href="./images/eshaDark.png">
<meta http-equiv="refresh" content="20">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="./css/try.css">
<link rel="stylesheet" type="text/css" href="./css/career.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<meta property="og:description" content="Don't miss your chance to be a part of the 2017-2018 school season!"/>
<meta property="og:title" content="ESHA 2017: Your Premier High School eSports League. "/>
<meta property="og:image" content="./images/websiteThumb.png">


</head>

<body>

<nav class="navbar" style="border-radius: 0;" id="top">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span> 
</button>
<a class="navbar-brand" style="margin-right: 50px;">ESHA      </a>

</div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">
<li><a href="./index.html">Home</a></li>
<li><a href="./html/captains.php">Captains</a></li>
<li><a href="./html/mog.php">Highlights</a></li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">The Games<span class="caret"></span></a>
        <ul class="dropdown-menu" style="background-color: #0A1028;">
          <li ><a href="thegames/lolmain.php" style="background-color: #013f7a;">League of Legends</a></li>
          <li><a href="thegames/csgomain.php" style="background-color: #ff7900;">Rocket League</a></li>
          <li><a href="thegames/hsmain.php" style="background-color: #eaaa29">Hearthstone</a></li>
        </ul>
		</li>
<li><a href="./html/about.php">About us</a></li>
<li><a href="./career.php">Login</a></li>

</ul>
</div>
</div>
</nav><br>
<?php
	// Login and logout
 	 include_once 'header.php'; 
?>
<div class="profile-wrapper">
<section class="main-container">
	<div class="main-wrapper">
		
		<?php
			//Set the profile picture
			if (isset($_SESSION['u_id'])) {
				include './include/dbh.inc.php';

				//get the user's profile picture
				$idman = $_SESSION['u_id'];
				$sql = "SELECT * FROM users WHERE user_id = '$idman'";
				$result = mysqli_query($conn, $sql);
				$profileurl = "";

				if ($row = mysqli_fetch_assoc($result)){
				  $profileurl = $row['user_picture'];

				}

				
				echo "<style>.user_picture{background-image: url('".$profileurl."');}</style>";
				echo "<div class='careerheader'><div class='user_picturewrapper'><div class='user_picture'></div></div>";

				

				//progress bar for profile level, define variables
				$user_xp = 0;
				$user_level = 0;
				$user_required = 0;
				$user_current = 0;
				$user_percent = 0;
				//get the user's xp
				$username = $_SESSION['u_username'];
				$sql = "SELECT * FROM users WHERE user_username = '$username'";
				
				$result = mysqli_query($conn, $sql);


			    if ($row = mysqli_fetch_assoc($result)){
			    	$user_xp =  $row['xp'];
				}

				//select which xp level it corresponds to
				$sql = "SELECT * FROM xp_levels WHERE level_min <= '$user_xp' AND level_max >= '$user_xp'";
				$result = mysqli_query($conn, $sql);


			    if ($row1 = mysqli_fetch_assoc($result)){
			    	$user_required =  $row1['xp_required'];
				}

				//sets the approprate level 
				if($user_required  == 100){
					$user_level = floor($user_xp/100);
					$user_current = $user_xp % 100 ;
				}
				else if ($user_required  == 200) {
					$user_level = floor((($user_xp - 1000)/200) + 10);
					$user_current = ($user_xp-1000) % 200 ;
				}
				else if ($user_required  == 500) {
					$user_level = floor((($user_xp - 4000)/500) + 10 + 15);
					$user_current = ($user_xp-4000) % 500 ;
				}
				else{
					$user_level = floor((($user_xp - 41500)/1000) + 10 + 15 + 100);
					$user_current = ($user_xp-41500) % 1000 ;
				}

				$user_percent = $user_current / $user_required * 100;
				echo'<div class="container"><div class="user-level">'.$user_level .'</div>
					  <div class="progress">
					    <div class="progress-bar progress-bar-striped active" role="progressbar" style="width:'.$user_percent.'%">
					      '.$user_current .'/'.$user_required.'
					    </div>
					  </div>
					</div>';
			}
		?>
		
		
		<div class="profile-name">
			<?php
			//se the user's first name, last name, and username
			if (isset($_SESSION['u_id'])) {
				echo $_SESSION['u_first']." ".$_SESSION['u_last']."<br>( ".$_SESSION['u_username']." )";
				
			}
		?>
		</div>	

	</div>
	</div>

</section>


<?php
	
	//player tabs underneath the profile picture
	if (isset($_SESSION['u_id'])){

		include_once "./include/careerTabs.inc.php";
	
	}
	
	
?>

<script>
$(document).ready(function(){
    $("[data-toggle='tooltip']").tooltip(); 

    // Javascript to enable link to tab
	var url = document.location.toString();
	if (url.match('#')) {
	    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
	} 

	// Change hash for page-reload
	$('.nav-tabs a').on('shown.bs.tab', function (e) {
	    window.location.hash = e.target.hash;
	})
	
});
</script>
<?php
	include_once 'footer.php'; 
?>

