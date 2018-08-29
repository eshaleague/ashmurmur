<?php

session_start();

if (isset($_POST['submit']) ) {
	include 'dbh.inc.php';
	
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//error handlers
	//empty?
	if (empty($uid) || empty($pwd)){
		header("Location: ../career.php?login=error");
		exit();
	}else{

		$sql = "SELECT * FROM users WHERE user_username = '$uid' OR user_email = '$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck= mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../career.php?login=error");
			exit();
		}else{
			if ($row = mysqli_fetch_assoc($result)) {
				//de-has the password
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if ($hashedPwdCheck  == false) {
					header("Location: ../career.php?login=error");
					exit();
				}else if ($hashedPwdCheck  == true){
					//login the admin
					if($row['user_type'] == "admin"){
						$_SESSION['u_type'] = $row['user_type'];
						$_SESSION['u_id'] = $row['user_id'];
						header("Location: ../admin.php?login=success");
					}
					else{
						//Log in the normal user here
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['u_email'] = $row['user_email'];
						$_SESSION['u_username'] = $row['user_username'];
					

						if ($row['user_club'] == ""){
							$_SESSION['u_club'] = "none";
						}
						else{
							$_SESSION['u_club'] = $row['user_club'];
						}
						header("Location: ../career.php?login=success");
						exit();
						}
					
				}
			}
		}

	}
}else{
		header("Location: ../career.php?login=error");
		exit();
	};