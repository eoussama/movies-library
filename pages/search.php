<?php
	include "../includes/header.php";
	include "../includes/database.php";

	$searchQuery = $_GET['searchQuery'];
	$filterCategory = !isset($_GET['filterCategory']) == true ? "" : $_GET['filterCategory'];

	if(strlen($filterCategory) == 0)
		$query = "SELECT * FROM `movies` WHERE `title` LIKE '%$searchQuery%';";
	else
		$query = "SELECT * FROM `movies` WHERE `title` LIKE '%$searchQuery%' AND `categories` LIKE '%$filterCategory%';";

	$results = mysqli_query($con, $query);
	$movies = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>
 		<main class="container mt-5 mb-5">
      		<h2><i class="fa fa-search"></i> Searching for <?php echo (strlen($searchQuery) == 0 ? "<b>[Movies]</b>" : "<b>[$searchQuery]</b>"); ?> - <?php echo (strlen($filterCategory) != 0 ? "Filter: <b>[$filterCategory]</b> -" : ""); ?> <?php echo "<b>".sizeof($movies)."</b>"; ?> movie(s) found.</h2>
      		<hr>
      		<?php if(sizeof($movies) == 0): ?>
      			<div class="alert alert-danger" role="alert">
					<h4 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> Search failed</h4>
					<p>No movies in out database were found under the matching query search <b><?php echo $searchQuery; ?></b>, make sure you typed the correct keyword, or contact our support team for help.</p>
					<hr>
					<p class="mb-0">With love, movies library team.</p>
				</div>
      		<?php else: ?>
				<?php foreach($movies as $movie): ?>
					<div class="card mb-3" style="height: 350px; overflow: hidden;">
						<div class="card-header">
							<h3><?php echo "${movie["title"]} - (".date('Y', strtotime($movie["releaseDate"])).")"; ?></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-3">
									<img style="width: 250px; height: 240px;" src="\movies-library\images\movies\<?php echo $movie['movieId']; ?>.jpg" alt="<?php echo "${movie["title"]} image"; ?>">
								</div>
								<div class="col">
									<h3 class="score text-right"><i class="fa fa-star"></i> Score: <?php echo $movie['score']; ?></h3>
									<h6 class="card-title">Categories: <?php echo $movie['categories']; ?></h6>
									<p class="card-text"><b>Description:</b> <?php echo $movie['description']; ?></p>
									<a href="<?php echo "\movies-library\pages\movie.php?movie=${movie["movieId"]}"; ?>" class="btn btn-primary">Details</a>
								</div>
							</div>

						</div>
					</div>
				<?php endforeach; ?>
       		<?php endif; ?>
        </main>
<?php
	include "../includes/footer.php";
?>