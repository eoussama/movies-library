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

	if(!isset($_GET['searchQuery']))
		header("Location: \movies-library\index.php");

	include "../includes/header.php";
	include "../includes/database.php";

	$searchQuery = $_GET['searchQuery'];
	$searchType = (!isset($_GET['searchType']) == true) ? "movies" : $_GET['searchType'];
	$searchQuery = mysqli_real_escape_string($con, $searchQuery);
	$filterCategory = !isset($_GET['filterCategory']) == true ? "" : $_GET['filterCategory'];
	$resultPage = !isset($_GET['resultPage']) == true ? 0 : $_GET['resultPage'];
	
	if($searchType === 'movies') {
		if(strlen($filterCategory) == 0) {
			$query = "SELECT * FROM `$searchType` WHERE `title` LIKE '%$searchQuery%' LIMIT ".($resultPage * 5).", 5;";
			$rquery = "SELECT * FROM `$searchType` WHERE `title` LIKE '%$searchQuery%';";
		}
		else
		{
			$query = "SELECT * FROM `$searchType` WHERE `title` LIKE '%$searchQuery%' AND `categories` LIKE '%$filterCategory%' LIMIT ".($resultPage * 5).", 5;";
			$rquery = "SELECT * FROM `$searchType` WHERE `title` LIKE '%$searchQuery%' AND `categories` LIKE '%$filterCategory%';";
		}

		$results = mysqli_query($con, $query);
		$rows = mysqli_num_rows(mysqli_query($con, $rquery));
		$pages = ceil($rows / 5);
		$movies = mysqli_fetch_all($results, MYSQLI_ASSOC);
	}
	
	else {
		$query = "SELECT `username`, `userId` FROM `$searchType` WHERE `username` LIKE '%$searchQuery%' LIMIT ".($resultPage * 5).", 5;";
		$rquery = "SELECT `username`, `userId` FROM `$searchType` WHERE `username` LIKE '%$searchQuery%';";

		$results = mysqli_query($con, $query);
		$rows = mysqli_num_rows(mysqli_query($con, $rquery));
		$pages = ceil($rows / 5);
		$users = mysqli_fetch_all($results, MYSQLI_ASSOC);
	}
?>
 		<main class="container mt-5 mb-5">
     		<?php if($searchType === 'movies'): ?>
      			<h2><i class="fa fa-search"></i> Searching for <?php echo (strlen($searchQuery) == 0 ? "<b>[Movies]</b>" : "<b>[$searchQuery]</b>"); ?> - <?php echo (strlen($filterCategory) != 0 ? "Filter: <b>[$filterCategory]</b> -" : ""); ?> <?php echo "<b>".$rows."</b>"; ?> movie(s) found.</h2>
     		<?php else: ?>
     			<h2><i class="fa fa-search"></i> Searching for <?php echo (strlen($searchQuery) == 0 ? "<b>[Users]</b>" : "<b>[$searchQuery]</b>"); ?> - <?php echo "<b>".$rows."</b>"; ?> users(s) found.</h2>
     		<?php endif; ?>
      		<hr>
      		<?php if($searchType === 'movies'): ?>
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
      		<?php else: ?>
       			<?php if(sizeof($users) == 0): ?>
					<div class="alert alert-danger" role="alert">
						<h4 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> Search failed</h4>
						<p>No movies in out database were found under the matching query search <b><?php echo $searchQuery; ?></b>, make sure you typed the correct keyword, or contact our support team for help.</p>
						<hr>
						<p class="mb-0">With love, movies library team.</p>
					</div>
				<?php else: ?>
					<?php foreach($users as $user): ?>
						<div class="card mb-3">
							<div class="card-header">
								<h3><a href="/movies-library/pages/user.php?userId=<?php echo $user['userId']; ?>" target="_blank" ><?php echo "${user["username"]}"; ?></a></h3>
							</div>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
       		<?php endif; ?>
       		<?php if($pages > 1): ?>
				<nav aria-label="Movie pagination">
					<ul class="pagination justify-content-center">
						<li class="page-item <?php if($resultPage == 0) echo "disabled" ?>">
							<a class="page-link" href="<?php echo "\movies-library\pages\search.php?searchQuery=$searchQuery&filterCategory=$filterCategory&resultPage=".($resultPage - 1); ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<?php for($i = 0; $i<$pages; $i++): ?>
							<li class="page-item <?php if($i == $resultPage) echo "active" ?>"><a class="page-link" href="<?php echo "\movies-library\pages\search.php?searchQuery=$searchQuery&filterCategory=$filterCategory&resultPage=$i"; ?>"><?php echo $i + 1; ?></a></li>
						<?php endfor; ?>
						<li class="page-item <?php if($resultPage + 1 == $pages) echo "disabled" ?>">
							<a class="page-link" href="<?php echo "\movies-library\pages\search.php?searchQuery=$searchQuery&filterCategory=$filterCategory&resultPage=".($resultPage + 1); ?>" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					</ul>
					<hr>
				</nav>
      		<?php endif; ?>
        </main>
<?php
	include "../includes/footer.php";
?>