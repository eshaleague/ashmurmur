<!DOCTYPE html>
<html>
<head>
<title>ESHA -Home</title>
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<link rel="icon" href="./images/eshaDark.png">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<meta property="og:description" content="Don't miss your chance to be a part of the 2017-2018 school season!"/>
<meta property="og:title" content="ESHA 2017: Your Premier High School eSports League. "/>
<meta property="og:image" content="./images/websiteThumb.png">
<link rel="stylesheet" href="./css/try.css?version=1.2">


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
<ul class="nav navbar-nav mainnav">
<li class="active"><a href="./index.html">Home</a></li>
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
<li><a href="./html/sponsors.php">Sponsors</a></li>
<li><a href="./career.php">Login</a></li>

</ul>
</div>
</div>
</nav>

<div class="container" id="mainslide" style="width: 100%; ">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="max-height: 550px;width: 100%; overflow: hidden; background-color:black; border-bottom: 5px solid #2099ff "><div class="carousel-wrapper">
<?php
  include "include/dbh.inc.php";
  $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 1";
  $resulta = mysqli_query($conn, $sql);
     while ($row = mysqli_fetch_assoc($resulta)){
      echo '<a href="./html/newsarticle.php?id='.$row['id'].'"><div class="carousel-caption">
          <h2 style=" text-shadow: 0.5px  0.5ppx  1px black;">'.$row['title'].'</h2><div class="outer"><div class="inner"></div></div>
          <p style=" text-shadow: 0.5ppx  0.5ppx  1px black;">'.substr($row['text'], 0, 80).'...</p></h1></div></a>';
  }
?></div>

    
  <?php
  include "include/dbh.inc.php";
  $sqla = "SELECT * FROM news ORDER BY id DESC LIMIT 1";
  $resultb = mysqli_query($conn, $sqla);
     while ($row = mysqli_fetch_assoc($resultb)){
      echo '<img src="./images/news/'.$row['image'].'.jpg" style="width: 1300px;  display: block; margin: auto;margin-top: 0px; position: relative; top: -95px; left: 0; right: 0; z-index: 2; " class="news-banner-image">';
  }

?>
<img  src="./images/bannerShadow.png"  id="bannershad" >

        
        


</div></div>

<div class="container-fluid seasonbanner" >
  <div class="container">
  <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-3" style="min-width: 270px; display: block;margin: auto;"><img src="./images/season1-mainlogo.png" width="250px"></div>
  <div class="col-sm-3" style="min-width: 270px"><br><br><Br><Br><Br><div class="registerButton" id="frontRegister" style="margin: 2px" ><div class="registerButtoninner">
<a target="_blank" href="./html/captains.php" style="font-size: 27px; " > REGISTER NOW</a></div>
</div></div>
  </div>
  </div>
  
</div>

<div class="container-fluid" style=" background-color: white; margin-bottom: 30px; ">
<div class="container">

<div class="row" style="border-bottom: 2px solid #ddd">
  <h1 style="font-weight: normal; margin-left: 10px">LATEST NEWS</h1>
<a href="./html/allnews.php" style="display: block; width: 100%; text-align: right; color: #2099ff">VIEW ALL NEWS > </a>


<?php
  include "include/dbh.inc.php";
  $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 3";
  $result = mysqli_query($conn, $sql);
  $result2 = mysqli_query($conn, $sql);

  echo "<style>";
  while ($row = mysqli_fetch_assoc($result)){
      echo '.newsback'.$row['id'].'{background-image:url("./images/news/'.$row['image'].'.jpg")}';

  }
  echo "</style>";

     while ($row = mysqli_fetch_assoc($result2)){
      $date = date("m/d/Y", $row['timestamp']);
      echo '<div class="col-sm-4"><a href="./html/newsarticle.php?id='.$row['id'].'"><div class="news-panel newsback'.$row['id'].'"><h4>'.$date.'</h4><h3>'.$row['title'].'</h3></div></a></div>';

  }



?>


</div></div></div>
<div class="container-fluid">
<div class="row tablebackground">
  <h2 style="text-align: center; color: white; font-weight: bold; text-transform: uppercase;">2018-2019 Registered Teams</h2>

  <table><thead><tr><th style="background-color: #1f2e68;font-weight: bold;">Name</th><th style="background-color: #1f2e68;font-weight: bold;">Captain</th></tr></thead><tbody>
    <tr><td style="border: none">Waterloo Collegiate Institute</td><td style="border: none; text-align: center;">Ryan Zhang</td></tr>
    <tr><td style="border: none; background-color: #eee">Waterloo Oxford</td><td style="border: none; text-align: center; background-color: #eee">Narein Chenthil</td></tr>
    <tr><td style="border: none">Sir John A. Macdonald Secondary School</td><td style="border: none; text-align: center;">Andrew Bao</td></tr>
  </tbody></table><br><br><div class="registerButton" id="frontRegister" ><div class="registerButtoninner">
<a target="_blank" href="./html/captains.php" style="font-size: 27px; " > REGISTER NOW</a></div>
</div><br><br>
</div></div>


<div class="container" style="">
<div class="row">
<div class="col-sm-1">
</div>
<div class="col-sm-5">
<div id="welcomeSpace" >
<h1>WELCOME TO THE LEAGUE</h1><br>
<p> The ESports for High school Assocation is on a mission to unite high schools from across the nation under the common interest of ESports. We work alongside student and teacher captains to inagurate high school esport clubs and run tournaments for teams across the nation. Visit our <a href="./html/faq.php">FAQ page</a> for more info. 
</p> 
</div>
</div>


<div class="col-sm-6">
<img class="img-responsive" style="margin-top: 22%; margin-bottom: 100px;" src="./images/darkLogoLong.png" width="420px">
</div>


</div>

</div>



<div class="container-fluid" id="ready"style="background-color: #0A1028; padding-bottom: 20px;">


<h1 style="text-shadow: 2px 2px 2px #000000;text-align: center;color: white;margin-bottom: 70px;line-height: 70px;"><br>THE LEAGUE IS READY.<br> ARE YOU?</h1>
<a href="https://goo.gl/forms/vwgnUgHkoYFfIQdw2" class="hiddenAnchor"><div class="registerButton">REGISTER</div></a>
<!--
<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfvV8hSnA3YmRjXMUY6cttiLIcHKsOCWhwJjOF-RY0FWfEvVQ/viewform?embedded=true" class="frame"width="800" height="2000" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
-->
</div></div>


<div class="footer">
  <div class="container-fluid">
    <div class="container"><br><br>
    <div class="row">
      <div class="col-sm-2">
      </div>
      <div class="col-sm-4">
        <br>
        <a href="./index.php"><img src="./images/whiteLogoLong.png" width="270px"></a>
      </div>
      <div class="col-sm-2">
        <h3>Pages</h3>
        <a href="./html/captains.php"><h4>Captains</h4></a>
        <a href="./html/mog.php"> <h4>Moments of Glory</h4></a>
        <a href="./html/about.php"><h4>About Us</h4></a>
        <a href="./career.php"><h4>Login</h4></a>
      </div>
      <div class="col-sm-2">
        <h3>Games</h3>
        <a href="./thegames/lolmain.php"><h4>League of Legends</h4></a>
        <a href="./thegames/csgomain.php"><h4>Rocket League</h4></a>
        <a href="./thegames/hsmain.php"><h4>Hearthstone</h4></a>
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
