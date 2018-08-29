<?php 
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include'../adminInclude/checkadmin.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="../jquery.tabledit.min.js"></script>
</head>
<body>
<br>
<div class="admins"><h1>Rocket League Schedule</h1></div>

<div class="container">  
				   <br/>  
				     <div class="table-responsive">   
				    <table id="csgoscheduleedit" class="table table-bordered table-striped">
				     <thead>
				      <tr>
				       <th>ID</th>
				       <th>team1</th>
				       <th>team2</th>
				       <th>winner</th>
				       <th>date</th>
				      </tr>
				     </thead>
				     <tbody>
				     <?php
				     include '../include/dbh.inc.php';
				     	$query = "SELECT * FROM rocketleagueschedule";
						$result = mysqli_query($conn, $query);
				     while($row = mysqli_fetch_array($result))
				     {
				      echo '
				      <tr>
				       <td>'.$row["id"].'</td>
				       <td>'.$row["team1"].'</td>
				       <td>'.$row["team2"].'</td>'
				       
				       .'<td>'.$row["winner"].'</td>
				       <td>'.$row["date"].'</td>
				      </tr>
				      ';
				     }
				     ?>
				     
				     </tbody>

				    </table>

				   </div> 
				   <form action="../adminInclude/csgoscheduleadd.inc.php" method="POST">
				   		<button type="submit" name="submit">+Add item</button>
				   	
				   </form>
				   <script>  
						$(document).ready(function(){  
					     $('#csgoscheduleedit').Tabledit({
					      url:'../adminInclude/csgoschedule.php',
					      columns:{
					       identifier:[0, "id"],
					       editable:[[1, 'team1'], [2, 'team2'], [3, 'winner'], [4, 'date'],]
					      },
					      restoreButton:false,
					      onSuccess:function(data, textStatus, jqXHR)
					      {
					       if(data.action == 'delete'){
					        $('#'+data.id).remove();
					       }
					      }

					      
					     });
					 
					});  
					</script>
		  </div>
</body>
</html>
