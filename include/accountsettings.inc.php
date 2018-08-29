<?php
//if user is not on a team ask for a code
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
echo"<div class='accountsettings'><br><h1>Account Settings</h1><br><table>
<tbody>
<tr>
<td>Profile Picture</td><td>";
//get the user's profile pic url
if (isset($_SESSION['u_id'])) {
	$pic = "";
	$uid = $_SESSION['u_id'];
	$sql = "SELECT * FROM users WHERE user_id = '$uid'";
	$result = mysqli_query($conn, $sql);
	if ($row = mysqli_fetch_assoc($result)){
	     $pic = $row['user_picture'];
	}



	echo"URL:<form action ='include/updateprofilepic.inc.php' method='POST'><input name = 'profileurl'type='text'value='".$pic."'><button type='submit' name='submit'>Save</button></form</td>";

}
echo"</td>
</tr>
</tbody>
</table>";
//add the option to join a club

echo"</div>";

?>

