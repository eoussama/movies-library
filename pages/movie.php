<?php
	include "../includes/header.php";
	require "../includes/database.php";

	$movieId = $_GET['movie'];
	$query = 'SELECT * FROM `movies` WHERE `movieId` = '.$movieId.';';
	$results = mysqli_query($con, $query);
	$movie = mysqli_fetch_assoc($results);

	function formatTime($minutes) {
		return intval(($minutes/60))."h ".intval($minutes%60)."m";
	}
?>
 		<main class="container mt-5 mb-5">
       		<div class="card mt-5 mb-5">
				<div class="card-header">
					<h2><?php echo "${movie["title"]} - (".date('Y', strtotime($movie["releaseDate"])).")"; ?></h2>
				</div>
				<div class="card-body" id="movieInfo">
					<div class="row">
						<div class="col-4">
							<img style="width: 350px; height: 524px;" src="\movies-library\images\movies\<?php echo $movieId; ?>.jpg" alt="<?php echo "${movie["title"]} image"; ?>">
						</div>
						<div class="col-5">
							<p>Title: <span class="focus"><?php echo $movie['title']; ?></span></p>
							<p>Movie Id: <span class="focus"><?php echo $movieId; ?></span></p>
							<p><i class="fa fa-clock"></i> Length: <span class="focus"><?php echo formatTime($movie['length']); ?></span></p>
							<p><i class="fa fa-filter"></i> Categorie(s): <span class="focus"><?php echo $movie['categories']; ?></span></p>
							<p><i class="fa fa-calendar-alt"></i> Release date: <span class="focus"><?php echo date('Y - M - d', strtotime($movie['releaseDate'])); ?></span></p>
							<p>Description:
								<textarea style="width: 700px; height: 300px; resize: none;" readonly><?php echo $movie["description"]; ?></textarea>
							</p>
						</div>
						<div class="col-3">
							<p class=" score"><i class="fa fa-star"></i> Score: <?php echo $movie['score']; ?></p>
							<a target="_blank" href="https://www.youtube.com/results?search_query=<?php echo $movie['title']; ?> trailer" class="btn btn-dark btn-block">Movie trailer</a>
						</div>
					</div>
				</div>
			</div>
        </main>
<?php
	include "../includes/footer.php";
?>