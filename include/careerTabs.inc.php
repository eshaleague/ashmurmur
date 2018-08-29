<?php


include 'dbh.inc.php';

echo '<br></div><br><div class="container careerTab">
  <ul class="nav nav-tabs headtabs">
    <li class="active"><a data-toggle="tab" href="#homer">Current Season</a></li>
    <li><a data-toggle="tab" href="#menu1">Earn XP</a></li>
    <li><a data-toggle="tab" href="#menu2">Scrimmages</a></li>
    <li><a data-toggle="tab" href="#menu3">Account Settings</a></li>
  </ul>';

  echo '<div class="tournamenContent-wrapper">';
  echo'<div class="tab-content">
    <div id="homer" class="tab-pane fade in active">';
    //first tab
    $usernameSesson = $_SESSION['u_username'];
    $sql = "SELECT player_name FROM currentseason WHERE player_name = '$usernameSesson'";
    $result = mysqli_query($conn, $sql);
    $resultCheck= mysqli_num_rows($result);
    //name cannot be found in current season table
    if ($resultCheck < 1) {
      echo "<br>You are not signed up for any seasons. Signup with your club captain. </div>";
    }
    //found user in current season table
    else{
      $username = $_SESSION['u_username'];
      $sql = "SELECT game_id FROM currentseason WHERE player_name = '$username'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if ($row = mysqli_fetch_assoc($result)){
        //game id is empty
        if (empty($row['game_id'])){
          //select tha aprropriate game for the game id  to be added
          $sql = "SELECT game FROM currentseason WHERE player_name = '$username'";
          $result = mysqli_query($conn, $sql);


            if ($row = mysqli_fetch_assoc($result)){
              //league of legends
              if($row['game'] == "League of Legends"){
                echo "You have been signed up for the League of Legends championship, <br>please enter your current summoner name to participate";
                echo '<form action="./include/gameid.inc.php" method="POST">
                <input type="text" name="gameid" placeholder="Summoner name" required>
                <button type="submit" name="submit">submit</button>
                </form>';
                $_SESSION['idGame'] = "League of Legends";
                include_once "./include/gameid.inc.php";
                  }
                  //CSGO
              if($row['game'] == "Rocket League"){
                echo "You have been signed up for the next Rocket League championship, <br>please enter your Steam id to coninue";
                echo '<form action="./include/gameid.inc.php" method="POST">
                <input type="text" name="gameid" placeholder="Steam ID" required>
                <button type="submit" name="submit">submit</button>
                </form><img src="http://i.imgur.com/RM0DDEz.jpg" width="500px">';
                $_SESSION['idGame'] = "Rocket League";
                include_once "./include/gameid.inc.php";
                  }
                  if($row['game'] == "Hearthstone"){
                echo "You have been signed up for the next Hearthstone championship, <br>please enter your battle tag to coninue";
                echo '<form action="./include/gameid.inc.php" method="POST">
                <input type="text" name="gameid" placeholder="exampl#1111" required>
                <button type="submit" name="submit">submit</button>
                </form><img src="https://techaeris.com/wp-content/uploads/2016/05/Battle.Net_.jpg" width="500px">';
                $_SESSION['idGame'] = "Hearthstone";
                include_once "./include/gameid.inc.php";
                  }
            }

          

          
        //IF the game id has been succesfully set, display the current live tournament info
        }else{
            $username = $_SESSION['u_username'];
            $sql = "SELECT * FROM currentseason WHERE player_name = '$username '";
            $result = mysqli_query($conn, $sql);
            if ($row = mysqli_fetch_assoc($result)){
               echo'<br>';

               //displays a welcome image with the users game id, and prints error if unable to connect
                //league of legends
                if($row['game'] == "League of Legends"){
                try{
                         require_once('./php-riot-api-master/php-riot-api.php');
                          $instance = new riotapi('na1');
                          $r = $instance->getSummonerById($row['game_id']);
                          echo "<center>Your summoner name: ".$r."</center>";
                     } catch(Exception $e){
                         echo "<center>Error: unable to connect summoner id</center>";
                     }
              }
              //Rocket League
                    else if($row['game'] == "Rocket League"){
                      try{
                        require('./vendor/autoload.php');
                        $clients = new \Zyberspace\SteamWebApi\Client('26896FAB283A62FF7264998A55E2252E');
                        $steamUsers = new \Zyberspace\SteamWebApi\Interfaces\ISteamUser($clients);
                        $responses = $steamUsers->GetPlayerSummariesV2($row['game_id']);


                        foreach ($responses->response->players as $playert) {
                          $steamid = $playert->personaname;
                        }
                        echo "<center>Your steam username: $steamid</center>";

                        }catch(Exception $e){
                          echo"<center>Error: Unable to connect to steam</center>";
                        }
                        //tabs under the currents season such as tournament details and match times
                    }
               echo'<br><div class="container">
              <ul class="nav nav-pills" style="width: 400px;">
                <li class="active"><a data-toggle="pill" href="#home1">My Matches</a></li>
                <li><a data-toggle="pill" href="#menut">My Stats</a></li>
                <li><a data-toggle="pill" href="#menuq">Details</a></li>
              </ul>';

              
              echo'<div class="tab-content">
                <div id="home1" class="tab-pane fade in active">';
                  //display the user's schedule 
                $gamenames = $row['game'];
                echo'<br><h1>My Matches</h1>';
                  include('playerschedule.inc.php');
                     echo'</div><div id="menuq" class="tab-pane fade">';
                  //display the tournamnet info
                     //includes the info of the tournament
                     $gamename = $row['game'];
                    include('currentinfo.inc.php');
                    echo'</div><div id="menut" class="tab-pane fade">';
                  //mystats

                     include('currentstats.inc.php');
                 
                   
                       echo'</div></div></div></div>';
                      
                    
        
              
            }



        }
      }
      
    }
//this is the end of the current season tab, this will be used for other things like profile leveling past this point im just typing alot here so that it will expand the line ok i thinks thats good enough

//earn xp
  echo'
    <div id="menu1" class="tab-pane fade">';
      include('xpgain.inc.php');

    echo'</div>';

//scrimmages
  echo'
    <div id="menu2" class="tab-pane fade">';
    include('scrims.inc.php');

    echo'</div>';

//my acocunt 
 echo'
    <div id="menu3" class="tab-pane fade">';
    include('accountsettings.inc.php');

    echo'</div>
  </div>
</div></div>';