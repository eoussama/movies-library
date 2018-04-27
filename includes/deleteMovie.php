<?php
    include "database.php";
	
	if(isset($_POST['movieId'])) {
		session_start();

		$movieId = mysqli_real_escape_string($con, $_POST['movieId']);
		$query = "DELETE FROM `movies` WHERE `movieId` = $movieId;";
		$results = mysqli_query($con, $query);
	}