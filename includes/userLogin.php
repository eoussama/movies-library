<?php
    include "database.php";
   	
	if(isset($_POST['username']) and isset($_POST['password'])) {
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = hash('whirlpool', mysqli_real_escape_string($con, $_POST['password']));

		$query = "SELECT `userId`, `joinDate`, `moderator` FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
		$results = mysqli_query($con, $query);
		session_start();
		
		if(mysqli_num_rows($results) == 0)
			$_SESSION['loginFailed'] = true;
		
		else {
			$user = mysqli_fetch_assoc($results);
			
			$_SESSION['loginFailed'] = false;
			$_SESSION['logged-in'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['userId'] = $user['userId'];
			$_SESSION['joinDate'] = $user['joinDate'];
			$_SESSION['moderator'] = $user['moderator'];
		}
		
		header("Location: \movies-library\index.php");
	}