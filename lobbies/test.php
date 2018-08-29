<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$_SESSION['lobby'] = $_POST['thelobby'];
$_SESSION['team1letter'] = $_POST['teamletter1'];
$_SESSION['team1club']= $_POST['clubname1'];
$_SESSION['team2letter']= $_POST['teamletter2'];
$_SESSION['team2club']= $_POST['clubname2'];
$_SESSION['gamename']= $_POST['gamename'];
require '../core/classes/core.php'; 
require '../core/classes/chat.php'; 
$chat = new chat();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Lobby</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/chat.css">
	<link rel="stylesheet" type="text/css" href="../css/try.css">

</head>
<body>
<div class="matchuptitle"><h1><?php echo $_SESSION['team1club']."(".$_SESSION['team1letter'].") <span>vs</span> ".$_SESSION['team2club']."(".$_SESSION['team2letter'].")"?></h1></div><br>
<div class="container-fluid">
	<div class='lobby-button-wrapper'>
	<a target= '_blank' href="https://goo.gl/forms/aObpLG0UN2ErF7mz2"><div id="score">Report <br> Score</div></a>
	<a target= '_blank' href="https://goo.gl/forms/MzDs8VgG5ZB6pDYu1"><div id='mogclip'>Submit  <br> highlight</div></a>
	</div>
</div><br>
<?php 
if ($_SESSION['gamename'] !== "Hearthstone") {
	echo '
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="lobbyplayers"></div>';
	//if the game is league of legends, do thing that tells people the lobby name and who is making it
	if ($_SESSION['gamename'] === "League of Legends") {
		include '../include/makelolcustom.inc.php';

	}
	echo '

		<p style="text-align: center; color: white; font-weight: bold;">**The winning team manager must report the score</p>
		</div>
		
		<div class="col-sm-6">
			<div class="chat">
				<div class = "messages"></div>
				<textarea class="entry" placeholder="Enter text"></textarea>
			</div>
		</div>
		
	</div>
</div> ';
}else{
	echo "<div class='container'><p style='color: white'>Add your opopenent on the Blizzard client </p></div>";
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
var chat = {};

chat.fetchMessages = function(){
	$.ajax({
		url: '../ajax/chatjax.php',
		type: 'post',
		data: { method: 'fetch'},
		success: function(data){
			$(".chat .messages").html(data);
		}
	});
}

chat.throwMessage = function(message){
	if ($.trim(message).length != 0){	
		$.ajax({
			url: '../ajax/chatjax.php',
			type: 'post',
			data: {method: 'throw', message: message},
			success: function(data){
				chat.fetchMessages();
				chat.entry.val('');

			}
		});
	}
}
chat.getteam = function(){
	$.ajax({
		url: '../ajax/chatjax.php',
		type: 'post',
		data: {method: 'getteam'},
		success: function(data){
			$(".lobbyplayers").html(data);

		}
	});
}

chat.updatetime = function(){
	$.ajax({
		url: '../ajax/chatjax.php',
		type: 'post',
		data: {method: 'updatetime'},
		success: function(data){

		}
	});
}
chat.closelobby= function(){
	$.ajax({
		url: '../ajax/chatjax.php',
		type: 'post',
		data: {method: 'closelobby'},
		success: function(data){
			if (data != 'online') {
				$("body").html(data);
			}
		}
	});
}
chat.entry = $('.chat .entry');
chat.entry.bind('keydown', function(e){
	if (e.keyCode === 13 && e.shiftKey === false) {
		chat.throwMessage($(this).val());
		e.preventDefault();
	}
});

chat.interval = setInterval(chat.closelobby , 60000);
chat.closelobby ();

chat.interval = setInterval(chat.updatetime , 5000);
chat.updatetime ();

chat.interval = setInterval(chat.getteam, 5000);
chat.getteam();

chat.interval = setInterval(chat.fetchMessages, 5000);
chat.fetchMessages();





</script>


</body>
</html>