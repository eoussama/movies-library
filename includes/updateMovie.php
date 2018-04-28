<?php
    include "database.php";

	$movieId = mysqli_real_escape_string($con, htmlspecialchars($_POST['movieId']));
	$title = mysqli_real_escape_string($con, htmlspecialchars($_POST['title']));
	$score = mysqli_real_escape_string($con, htmlspecialchars($_POST['score']));
	$releaseDate = mysqli_real_escape_string($con, htmlspecialchars($_POST['releaseDate']));
	$categories = mysqli_real_escape_string($con, htmlspecialchars($_POST['categories']));
	$length = mysqli_real_escape_string($con, htmlspecialchars($_POST['length']));
	$description = mysqli_real_escape_string($con, htmlspecialchars($_POST['description']));

	$query = "UPDATE `movies` SET `title` = '$title', `score` = $score, `releaseDate` = '$releaseDate', `categories` = '$categories', `length` = $length, `description` = '$description' WHERE `movieId` = $movieId;";
	mysqli_query($con, $query);
	mysqli_close($con);

	$target_file = "../images/movies/".basename($_FILES["poster"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
	$check = getimagesize($_FILES["poster"]["tmp_name"]);
    if($check !== false)
        $uploadOk = 1;
	else
        $uploadOk = 0;

	if (file_exists($target_file))
		$uploadOk = 0;

	if ($_FILES["poster"]["size"] > 3000000)
		$uploadOk = 0;

	if($imageFileType != "jpg")
		$uploadOk = 0;

	if ($uploadOk == 1) {
		if(file_exists("../images/movies/$movieId.jpg"))
			unlink("../images/movies/$movieId.jpg");
		
		if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file))
			rename("../images/movies/".basename($_FILES["poster"]["name"]), "../images/movies/$movieId.jpg");
	}

	header("Location: \movies-library\pages\\editMovie.php?movie=$movieId");