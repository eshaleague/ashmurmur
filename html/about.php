
<!DOCTYPE html>
<html>
<head>
<title>About us</title>
<meta charset="utf-8">
<link rel="icon" href="../images/eshaDark.png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/try.css">
<link rel="stylesheet" href="../css/rosters.css">
<link rel="stylesheet" href="../css/seasons.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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
<a class="navbar-brand"style="margin-right: 50px;">ESHA</a>

</div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav mainnav">
<li><a href="../index.php">Home</a></li>
<li><a href="./captains.php">Captains</a></li>
<li><a href="./mog.php">Highlights</a></li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">The Games<span class="caret"></span></a>
        <ul class="dropdown-menu" style="background-color: #0A1028;">
          <li ><a href="../thegames/lolmain.php" style="background-color: #013f7a;">League of Legends</a></li>
          <li><a href="../thegames/csgomain.php" style="background-color: #ff7900;">Rocket League</a></li>
          <li><a href="../thegames/hsmain.php" style="background-color: #eaaa29">Hearthstone</a></li>
        </ul>
		</li>
  <li><a href="./sponsors.php">Sponsors</a></li>
<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">About us<span class="caret"></span></a>
        <ul class="dropdown-menu" style="background-color: #0A1028;">
          <li><a href="./faq.php">FAQ</a></li>
          <li><a href="./about.php">Our Team</a></li>
        </ul>
		</li>

<li><a href="../career.php">Login</a></li>

</ul>
</div>
</div>
</nav><div class="container-fluid" id="welcome" style="background-image: url('#')" >
<div class="container">
<div class="row" >
<div class="col-sm-1">
</div>
<div class="col-sm-5 ">
<div id="welcomeSpace">
<h1 style="font-weight: bold;">WELCOME TO THE LEAGUE</h1><br>
<p>The ESports for High School Association (ESHA) is a not-for-profit organisation on a mission to unite high schools from across the nation under the common interest of ESports. <br><br>

ESHA provides a free and professional esports experience in the acedemic environment for students enrolled in high school. </p>
</div>
</div>


<div class="col-sm-5">
<div id="eshaLogo"></div>
</div>

</div>
</div>
</div>

<script>
$(document).ready(function(){
// Add smooth scrolling to all links in navbar + footer link
$("footer a[href='#top']").on('click', function(event) {

// Make sure this.hash has a value before overriding default behavior
if (this.hash !== "") {

// Prevent default anchor click behavior
event.preventDefault();

// Store hash
var hash = this.hash;

// Using jQuery's animate() method to add smooth page scroll
// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
$('html, body').animate({
scrollTop: $(hash).offset().top
}, 900, function(){

// Add hash (#) to URL when done scrolling (default click behavior)
window.location.hash = hash;
});
} // End if
});
})
</script>
<script>
$(window).scroll(function() {
$(".slideanim").each(function(){
var pos = $(this).offset().top;

var winTop = $(window).scrollTop();
if (pos < winTop + 600) {
$(this).addClass("slide");
}
});
});
</script>	
<div class="container-fluid" style="min-height: 600px; margin-top: -20px; " id="crowd">	

<img class="img-responsive" src="../images/eshaWhite.png" alt="logo" width="150" style="margin:auto; margin-top: 50px">
<div class="container" style="margin-top: -10px;">

<h1 style="text-align: center; text-transform: uppercase; font-weight: bold; font-family: Segoe UI; color: white;" >By The Fans For The Fans</h1>
<p style="margin-top: 30px;text-align: center; color: white; margin-bottom: 50px;" >ESHA was created by a group of high school students who wanted to run their own esports tournament. <br>The gang pulled it together to deliver a full experience everyone can enjoy. <br>They hope to host a professional and one of a kind tournament that will highlight the very best of students and schools from across the nation.  
</p>
</div>
</div>
<h1 style="text-align: center; text-transform: uppercase; font-weight: bold; font-family: Segoe UI; margin-top: 40px;">The Leadership Team</h1><br>
<div  class="container">
<div class="row">
<div class="col-sm-6">
<div  class="aboutFirst">
<img src="../images/aboutProfile.png" class="profile">
</div>

<div  class="aboutSecond">
<h1 class="aboutNames">Bryan Ling</h1>
<p>Lead Organizer</p>
</div>
</div>
<div class="col-sm-6">
<div  class="aboutFirst">
<img src="../images/aboutProfile.png" class="profile">
</div>

<div  class="aboutSecond">
<h1 class="aboutNames">Graham Carkner</h1>
<p>Tournament Organizer</p>
</div>
</div>

</div><br>
<div class="row">
<div class="col-sm-6">
<div  class="aboutFirst">
<img src="../images/aboutProfile.png" class="profile">
</div>

<div  class="aboutSecond">
<h1 class="aboutNames">Narein Chenthil</h1>
<p>Outreach</p>
</div>
</div>
<div class="col-sm-6">
<div  class="aboutFirst">
<img src="../images/aboutProfile.png" class="profile">
</div>

<div  class="aboutSecond">
<h1 class="aboutNames">Maahir Gupta</h1>
<p>Statistics Coordinator</p>
</div>
</div>

</div><br>
<div class="row">
<div class="col-sm-6">
<div  class="aboutFirst">
<img src="../images/aboutProfile.png" class="profile">
</div>

<div  class="aboutSecond">
<h1 class="aboutNames">Andrei Secara</h1>
<p>Sponsorships</p>
</div>
</div>
<div class="col-sm-6">
<div  class="aboutFirst">
<img src="../images/aboutProfile.png" class="profile">
</div>

<div  class="aboutSecond">
<h1 class="aboutNames">Max Shiff</h1>
<p>Video Editor</p>
</div>
</div>

</div><br>
<div class="row">
<div class="col-sm-6">
<div  class="aboutFirst">
<img src="../images/aboutProfile.png" class="profile">
</div>

<div  class="aboutSecond">
<h1 class="aboutNames">Ryan Zhang</h1>
<p>Club Content Manager</p>
</div>
</div>
<div class="col-sm-6">
<div  class="aboutFirst">
<img src="../images/aboutProfile.png" class="profile">
</div>

<div  class="aboutSecond">
<h1 class="aboutNames">Julia Jin</h1>
<p>Head Writer</p>
</div>
</div>

</div>
</div><br><br>
<div class="footer">
  <div class="container-fluid">
    <div class="container"><br><br>
    <div class="row">
      <div class="col-sm-2">
      </div>
      <div class="col-sm-4">
        <br>
        <a href="../index.php"><img src="../images/whiteLogoLong.png" width="270px"></a>
      </div>
      <div class="col-sm-2">
        <h3>Pages</h3>
        <a href="./captains.php"><h4>Captains</h4></a>
        <a href="./mog.php"> <h4>Moments of Glory</h4></a>
        <a href="./about.php"><h4>About Us</h4></a>
        <a href="../career.php"><h4>Login</h4></a>
      </div>
      <div class="col-sm-2">
        <h3>Games</h3>
        <a href="../thegames/lolmain.php"> <h4>League of Legends</h4></a>
        <a href="../thegames/csgomain.php"><h4>Rocket League</h4></a>
        <a href="../thegames/hsmain.php"><h4>Hearthstone</h4></a>
      </div>
      <div class="col-sm-2"></div>
    </div>
  </div><br><br>
  </div>
  <div class="container-fluid" style="background-color: #2099ff;">
    <p>&copy;2018 ESports for High School Association, Website by Bryan Ling</p>
    
  </div>
</div>



</body>
</html>