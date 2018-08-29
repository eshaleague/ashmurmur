<?php

if(isset($_POST['submit'])){
	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['username']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//error handlers
	//check for empty feilds
	if (empty($first)||empty($last)||empty($email)||empty($uid)||empty($pwd)){
		header("Location: ../signup.php?signup=empty");
		exit();
	}else{
		//check if input characters are valid
		if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
			header("Location: ../signup.php?signup=invalid");
			exit();
		}else{
			//check if email is valid
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				header("Location: ../signup.php?signup=invalidemail");
				exit();
			}else{
				$sql = "SELECT * FROM users WHERE user_username = '$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0){
					header("Location: ../signup.php?signup=usertaken");
					exit();
				}else{
					//Hashing the password 
					$hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert user into the database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_username, user_pwd, user_picture) VALUES ('$first', '$last', '$email', '$uid', '$hashedPWD','http://www.combonetwork.com/img/empty_profile.png');";
					mysqli_query($conn, $sql);
					header("Location: ../career.php?signup=success");
					exit();
				}
			}
		}
	}
} else{
	header("Location: ../signup.php");
	exit();
}