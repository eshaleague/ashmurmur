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
<div class="admins"><h1>Current Season Control</h1></div>

<div class="container">  
				   <br/>  
				     <div class="table-responsive">   
				    <table id="seasoncontroledit" class="table table-bordered table-striped">
				     <thead>
				      <tr>
				       <th>ID</th>
				       <th>season_name</th>
				       <th>is_current</th>
				       <th>start_date</th>
			
				      </tr>
				     </thead>
				     <tbody>
				     <?php
				     include '../include/dbh.inc.php';
				     	$query = "SELECT * FROM seasoninfo";
						$result = mysqli_query($conn, $query);
				     while($row = mysqli_fetch_array($result))
				     {
				      echo '
				      <tr>
				       <td>'.$row["id"].'</td>
				       <td>'.$row["season_name"].'</td>
				       <td>'.$row["is_current"].'</td>'
				       
				       .'<td>'.$row["start_date"].'</td>
				      </tr>
				      ';
				     }
				     ?>
				     
				     </tbody>

				    </table>

				   </div> 
				   <form action="../adminInclude/seasoncontroladd.inc.php" method="POST">
				   		<button type="submit" name="submit">+Add item</button>
				   	
				   </form>
				   <script>  
						$(document).ready(function(){  
					     $('#seasoncontroledit').Tabledit({
					      url:'../adminInclude/seasoncontrol.php',
					      columns:{
					       identifier:[0, "id"],
					       editable:[[1, 'season_name'], [2, 'is_current'], [3, 'start_date']]
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
