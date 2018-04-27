<?php

	function hasMovie($con, $movieId) {
		$movieId = mysqli_real_escape_string($con, $movieId);
		$query = "SELECT * FROM `libraries` WHERE `userId` = ".$_SESSION['userId']." AND `movieId` = ".$movieId.";";
		$results = mysqli_query($con, $query);

		if(mysqli_num_rows($results) == 1)
			return true;		
		else
			return false;
	}

	function usernameTaken($con, $username) {
		$username = mysqli_real_escape_string($con, htmlspecialchars($username));
		$query = "SELECT `userId` FROM `users` WHERE `username` = '$username';";
		$results = mysqli_query($con, $query);
		
		if(mysqli_num_rows($results) == 1)
			return true;		
		else
			return false;
	}