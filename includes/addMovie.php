<?php
    include "database.php";
	session_start();

   	$movieId = mysqli_real_escape_string($con, $_POST['movieId']);
	$query = "INSERT INTO `libraries`(`userId`, `movieId`) VALUES (".$_SESSION['userId'].", ".$movieId.");";

	mysqli_query($con, $query);