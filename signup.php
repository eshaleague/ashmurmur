<!DOCTYPE html>
<html>
<head>
<title>ESHA -Home</title>
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="icon" href="./images/eshaDark.png">
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
<nav class="navbar navbar-inverse" style="border-radius: 0;" id="top">
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
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Schedules<span class="caret"></span></a>
        <ul class="dropdown-menu" style="background-color: #0A1028">
          <li><a href="./html/LOL.php">LOL</a></li>
		  <li><a href="./html/CSGO.php">CS:GO</a></li>
		  <li><a href="./html/CLASHROYALE.php">Clash Royale</a></li>
        </ul>
		</li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Seasons<span class="caret"></span></a>
        <ul class="dropdown-menu" style="background-color: #0A1028">
          <li><a href="./html/season0.php">Season 0</a></li>
        </ul>
		</li>
<li><a href="./html/rosters.php">Rosters</a></li>
<li><a href="./html/about.php">About us</a></li>
<li><a href="./career.php">My Career</a></li>

</ul>
</div>
</div>
</nav>
<section class="main-container">
	<div class="main-wrapper">
		<h2>Sign up</h2>	
		<form class="signup-form" action="include/signup.inc.php" method="POST">
			<input type="text" name="first" placeholder="First name" required>
			<input type="text" name="last" placeholder="Last name" required>
			<input type="text" name="email" placeholder="e-mail" required>
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="pwd" placeholder="Password" required>
			<button type="submit" name="submit">Sign up</button>
		</form>
	</div>
	

</section>

<?php
	include_once 'footer.php'; 
?>

