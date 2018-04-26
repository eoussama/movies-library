<?php
    include "database.php";
   	
	if(isset($_POST['username']) and isset($_POST['password'])) {
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = hash('whirlpool', mysqli_real_escape_string($con, $_POST['password']));

		$query = "INSERT INTO `users`(`username`, `password`) VALUES('$username', '$password');";
		mysqli_query($con, $query);
		header("Location: \movies-library\index.php");
	}
