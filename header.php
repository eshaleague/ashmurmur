<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

?>

<div class="main-wrapper">

	<div class="nav-login">
		<?php
			if (isset($_SESSION['u_id'])) {
				echo '<form action="include/logout.inc.php" method="POST">
						<button type="submit" name="submit">Logout</button>
						</form>';
			}else{
				echo '<form action="include/login.inc.php" method="POST">
					<input type="text" name="uid" placeholder="Username/email">
					<input type="password" name="pwd" placeholder="password">
					<button type="submit" name="submit">Login</button>
					</form>
					<a href="signup.php">Sign up</a>';
		
			}
		?>
		
		
	</div>
</div>


