<?php
    include "database.php";

	$title = mysqli_real_escape_string($con, htmlspecialchars($_POST['title']));
	$score = mysqli_real_escape_string($con, htmlspecialchars($_POST['score']));
	$releaseDate = mysqli_real_escape_string($con, htmlspecialchars($_POST['releaseDate']));
	$categories = mysqli_real_escape_string($con, htmlspecialchars($_POST['categories']));
	$length = mysqli_real_escape_string($con, htmlspecialchars($_POST['length']));
	$description = mysqli_real_escape_string($con, htmlspecialchars($_POST['description']));

	$query = "INSERT INTO `movies`(`title`, `length`, `categories`, `score`, `releaseDate`, `description`) VALUES('$title', $length, '$categories', $score, '$releaseDate', '$description');";
	mysqli_query($con, $query);
	$movieId = mysqli_insert_id($con);
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
		if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file))
			rename("../images/movies/".basename($_FILES["poster"]["name"]), "../images/movies/$movieId.jpg");
	}

	header("Location: \movies-library\pages\insertMovie.php");