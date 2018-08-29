<?php  
include'checkadmin.php';
include '../include/dbh.inc.php';

$input = filter_input_array(INPUT_POST);

$season_name = mysqli_real_escape_string($conn, $input["season_name"]);
$is_current = mysqli_real_escape_string($conn, $input["is_current"]);
$start_date = mysqli_real_escape_string($conn, $input["start_date"]);


if($input["action"] === 'edit')
{
 $query = "UPDATE seasoninfo SET season_name = '".$season_name ."', is_current = '".$is_current."', start_date = '".$start_date."' WHERE id = '".$input["id"]."'";

 mysqli_query($conn, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM seasoninfo
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($conn, $query);
}


echo json_encode($input);


?>
