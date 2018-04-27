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

	include "../includes/header.php";
	require "../includes/database.php";

	$query = "SELECT `movieId`, `title`, `score` FROM `movies`;";
	$results = mysqli_query($con, $query);
	$movies = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>
 		<main class="container mt-5 mb-5">
			<div class="row">
				<div class="col-11">
					<h3 id="moviesCount"><i class="fa fa-film"></i> <b><?php echo sizeof($movies); ?></b> movie(s) found.</h3>
				</div>
				<div class="col-1 text-left">
					<a href="/movies-library/pages/insertMovie.php" target="_blank" class="ml-1 btn btn-primary"><i class="fa fa-plus"></i></a>
				</div>
			</div>
 			<hr>
			<ul class="list-group">
				<?php foreach($movies as $movie): ?>
					<li class="list-group-item">
						<div class="row">
							<div class="col-1 text-left">
								<span class="badge badge-warning"><i class="fa fa-star"></i> <?php echo $movie['score']; ?></span>
							</div>
							<div class="col-9">
								<a href="/movies-library/pages/movie.php?movie=<?php echo $movie['movieId']; ?>" target="_blank" ><b><?php echo $movie['title']; ?></b></a>
							</div>
							<div class="col-1 text-right">
								<a class="btn btn-dark" href="/movies-library/pages/editMovie.php?movie=<?php echo $movie['movieId']; ?>" target="_blank"><i class="fa fa-edit"></i></a>
							</div>
							<div class="col-1 text-right">
								<button class="btn btn-danger" onclick="deleteMovie(this, <?php echo $movie['movieId']; ?>);"><i class="fa fa-times"></i></button>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
        </main>
<?php
	include "../includes/footer.php";
?>