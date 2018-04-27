<?php
    include "database.php";
	
	if(isset($_POST['userId'])) {
		session_start();

		$userId = mysqli_real_escape_string($con, $_POST['userId']);
		$query = "DELETE FROM `users` WHERE `userId` = $userId;";
		$results = mysqli_query($con, $query);
	}