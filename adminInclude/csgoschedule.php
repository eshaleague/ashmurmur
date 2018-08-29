<?php  
include'checkadmin.php';
include '../include/dbh.inc.php';

$input = filter_input_array(INPUT_POST);

$team1 = mysqli_real_escape_string($conn, $input["team1"]);
$team2 = mysqli_real_escape_string($conn, $input["team2"]);
$winner = mysqli_real_escape_string($conn, $input["winner"]);
$date = mysqli_real_escape_string($conn, $input["date"]);


if($input["action"] === 'edit')
{
 $query = "UPDATE rocketleagueschedule SET team1 = '".$team1 ."', team2 = '".$team2."', winner = '".$winner."', date = '".$date."' WHERE id = '".$input["id"]."'";

 mysqli_query($conn, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM rocketleagueschedule
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($conn, $query);
}


echo json_encode($input);


?>
