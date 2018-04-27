<?php
    include "database.php";
	include "functions.php";
   	
	if(isset($_POST['username']) && isset($_POST['curPass']) && isset($_POST['newPass'])) {
		session_start();
		
		$username = mysqli_real_escape_string($con, htmlspecialchars($_POST['username']));
		$curPass = hash('whirlpool', mysqli_real_escape_string($con, htmlspecialchars($_POST['curPass'])));
		$newPass = hash('whirlpool', mysqli_real_escape_string($con, htmlspecialchars($_POST['newPass'])));
		
		if(usernameTaken($con, $username) === true)
			exit("userTaken");
		elseif($curPass !== $_SESSION['password'])
			exit("false");
		else {
			$query = "UPDATE `users` SET `username` = '$username', `password` = '$newPass' WHERE `userId` = ".$_SESSION['userId'].";";
			mysqli_query($con, $query);
			
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $newPass;
			
			exit("true");
		}
	}