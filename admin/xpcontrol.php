<link rel="stylesheet" type="text/css" href="../css/admin.css">
<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include'../adminInclude/checkadmin.php';
include'../include/dbh.inc.php';

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

echo "<div id='adminxp'><table id='fixed_top'><tr><td class='username'>Username</td><td class='button'>MOG vid watch</td><td class='button'>MOG submit</td><td class='button'>MOG Feature</td><td class = 'currentvalue'>xp change</td><td class = 'currentvalue'>current xp</td><td class = 'currentvalue'>xp change(+\-)</td></tr></table><table><br><form action='updatexp.inc.php' method='POST'>";
while ($row = mysqli_fetch_assoc($result)){
	Echo "<tr><td class='username'><input type='text' name='user[]' value='".$row['user_username']."' style='display: none;'>".$row['user_username']."</td>
	<td><button class='video' type='button'>+25</button>
	<button class='mog_submit' type='button'>+100</button>
	<button class='mog_feature' type='button'>+1000</button>
	<input class = 'currentvalue'type='number' name='xp[]' value = '".$row['xp']."'>
	<div class='currentxp'>".$row['xp']."</div>
	<input class='startingxp' style='display: none;' value='".$row['xp']."'>
	<input type='number' class='allxpchanges' style='display: none;' value = '0' >
	<div class='difference'></div></td></tr>";
}
echo "<tr><td><button type = 'submit' name = 'submit' id='xpsubmit'>Save All</button></td></tr></form></table></div>"
;
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

    $(".video").click(function(){
    	var allxpchanges = parseInt($(this).nextAll('.allxpchanges').val());
    	 $(this).nextAll('.allxpchanges').val(25 + allxpchanges);

    	var current_value = parseInt($(this).nextAll('.currentvalue').val());
    	var allxpchanges = parseInt($(this).nextAll('.allxpchanges').val());

        $(this).nextAll('.currentvalue').val(current_value + 25);
        $(this).nextAll('.difference').html(allxpchanges);
    });

    $(".mog_submit").click(function(){
    	var allxpchanges = parseInt($(this).nextAll('.allxpchanges').val());
    	 $(this).nextAll('.allxpchanges').val(100 + allxpchanges);

    	var current_value = parseInt($(this).nextAll('.currentvalue').val());
    	var allxpchanges = parseInt($(this).nextAll('.allxpchanges').val());

        $(this).nextAll('.currentvalue').val(current_value + 100);
        $(this).nextAll('.difference').html(allxpchanges);
    })

    $(".mog_feature").click(function(){
    	var allxpchanges = parseInt($(this).nextAll('.allxpchanges').val());
    	 $(this).nextAll('.allxpchanges').val(1000 + allxpchanges);

    	var current_value = parseInt($(this).nextAll('.currentvalue').val());
    	var allxpchanges = parseInt($(this).nextAll('.allxpchanges').val());

        $(this).nextAll('.currentvalue').val(current_value + 1000);
        $(this).nextAll('.difference').html(allxpchanges);
    })


});
</script>

