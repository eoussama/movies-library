<?php
	session_start();
	
	$_SESSION['logged-in'] = (!isset($_SESSION['logged-in'])) ? true : $_SESSION['logged-in'];
	$_SESSION['loginFailed'] = (!isset($_SESSION['loginFailed'])) ? false : $_SESSION['loginFailed'];
	$_SESSION['username'] = (!isset($_SESSION['username'])) ? '' : $_SESSION['username'];
	$_SESSION['password'] = (!isset($_SESSION['password'])) ? '' : $_SESSION['password'];
	$_SESSION['userId'] = (!isset($_SESSION['userId'])) ? 0: $_SESSION['userId'];
	$_SESSION['joinDate'] = (!isset($_SESSION['joinDate'])) ? 0 : $_SESSION['joinDate'];
	$_SESSION['moderator'] = (!isset($_SESSION['moderator'])) ? 0 : $_SESSION['moderator'];
	
	if($_SESSION['username'] === '')
		$_SESSION['logged-in'] = false;

	if($_SESSION['moderator'] <= 0)
		header("Location: \movies-library\index.php");
	
	if(!isset($_GET['movie']))
		header("Location: \movies-library\index.php");
	
	include "../includes/header.php";
	require "../includes/database.php";

	$movieId = mysqli_real_escape_string($con, $_GET['movie']);

	$query = "SELECT * FROM `movies` WHERE `movieId` = $movieId;";
	$results = mysqli_query($con, $query);
	$movie = mysqli_fetch_assoc($results);
?>
 		<main class="container mt-5 mb-5">
       		<h2><i class="fa fa-film"></i> Editing <a href="\movies-library\pages\movie.php?movie=<?php echo $movieId; ?>" target="_blank" ><?php echo $movie['title']; ?></a></h2>
       		<hr>
       		
       		<form action="\movies-library\includes\updateMovie.php" enctype="multipart/form-data" method="post">
       			<div class="row">
       				<div class="col-3">
       					<input onchange="updateImage(this);" type="file" name="poster" class="form-control mb-1">
       					<img id="moviePoster" style="width: 255px; height: 208px;" src="\movies-library\images\movies\<?php echo $movieId; ?>.jpg" alt="<?php echo $movie['title'] ?> movie poster">
       				</div>
       				<div class="col">
       					<input class="form-control mb-3" type="text" name="title" maxlength="50" minlength="1" placeholder="Input a valid movie title" value="<?php echo $movie['title']; ?>" required>
       					<input class="form-control mb-3" type="number" step="0.1" min="0" max="10" name="score" placeholder="Input a movie decimal score between 0 and 10" value="<?php echo $movie['score']; ?>" required>
       					<input class="form-control mb-3" type="date" name="releaseDate" placeholder="Input a valid movie release date" value="<?php echo date('Y-m-d', strtotime($movie['releaseDate'])); ?>" required>
						<input class="form-control mb-3" type="text" name="categories" maxlength="50" minlength="1" placeholder="Input valid categories separated by commas" value="<?php echo $movie['categories']; ?>" required>
      					<input class="form-control mb-3" type="number" name="length" min="0" placeholder="Input a valid movie length (minutes)" value="<?php echo $movie['length']; ?>" required>
       				</div>
       				<div class="col">
       					<textarea class="form-control" name="description" cols="30" rows="10" style="resize: none;" placeholder="Enter a valid description for this movie"><?php echo $movie['description']; ?></textarea>
       				</div>
       			</div>
       			<div class="row mt-3">
       				<input type="hidden" name="movieId" value="<?php echo $movieId; ?>">
       				<div class="col"><input type="submit" class="btn btn-block btn-primary" value="Edit"></div>
       				<div class="col"><input type="reset" class="btn btn-block btn-outline-secondary" value="Reset"></div>     				
       			</div>
       		</form>
        </main>
<?php
	include "../includes/footer.php";
?>