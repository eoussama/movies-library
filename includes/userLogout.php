<?php
    include "database.php";
   	
		session_start();
		$user = mysqli_fetch_assoc($results);

		$_SESSION['logged-in'] = false;
		$_SESSION['loginFailed'] = false;
		$_SESSION['username'] = '';
		$_SESSION['password'] = '';
		$_SESSION['userId'] = 0;
		$_SESSION['joinDate'] = 0;
		$_SESSION['moderator'] = 0;
		
		header("Location: \movies-library\index.php");