<?php  
include'checkadmin.php';
include '../include/dbh.inc.php';

$input = filter_input_array(INPUT_POST);

$player_name = mysqli_real_escape_string($conn, $input["player_name"]);
$game = mysqli_real_escape_string($conn, $input["game"]);
$game_id = mysqli_real_escape_string($conn, $input["game_id"]);
$club_name = mysqli_real_escape_string($conn, $input["club_name"]);
$team_letter = mysqli_real_escape_string($conn, $input["team_letter"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE currentseason SET player_name = '".$player_name ."', game = '".$game."', game_id = '".$game_id."', club_name = '".$club_name."', team_letter = '".$team_letter."' WHERE id = '".$input["id"]."'";

 mysqli_query($conn, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM currentseason
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($conn, $query);
}


echo json_encode($input);


?>
