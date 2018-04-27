<?php
	session_start();
	
	$_SESSION['logged-in'] = (!isset($_SESSION['logged-in'])) ? true : $_SESSION['logged-in'];
	$_SESSION['loginFailed'] = (!isset($_SESSION['loginFailed'])) ? false : $_SESSION['loginFailed'];
	$_SESSION['username'] = (!isset($_SESSION['username'])) ? '' : $_SESSION['username'];
	$_SESSION['password'] = (!isset($_SESSION['password'])) ? '' : $_SESSION['password'];
	$_SESSION['userId'] = (!isset($_SESSION['userId'])) ? 0: $_SESSION['userId'];
	$_SESSION['joinDate'] = (!isset($_SESSION['joinDate'])) ? 0 : $_SESSION['joinDate'];
	$_SESSION['moderator'] = (!isset($_SESSION['moderator'])) ? 0 : $_SESSION['moderator'];

	if($_SESSION['logged-in'] === false)
		header('Location: \movies-library\index.php');

	include "../includes/header.php";
	include "../includes/database.php";

	$query = "SELECT `movies`.`movieId`, `movies`.`title`, `movies`.`score`, `movies`.`categories` FROM `libraries` INNER JOIN `movies` ON `movies`.`movieId` = `libraries`.`movieId` WHERE `userId` = ".$_SESSION["userId"].";";
	$results = mysqli_query($con, $query);
	$movies = mysqli_fetch_all($results, MYSQLI_ASSOC);
	$i = 0;
?>
 		<main class="container mt-5 mb-5">
 			<h2><i class="fa fa-th-list"></i> My library - <b><?php echo sizeof($movies); ?></b> movie(s)</h2>
 			<hr>
 			<table class="table table-hover cursor">
 				<thead class="thead-light">
 					<th scope="col">#</th>
 					<th scope="col">Poster</th>
 					<th scope="col">Title</th>
 					<th scope="col">Categories</th>
 					<th class="text-center" scope="col"><i class="fa fa-star"></i> Score</th>
 					<th class="text-center" scope="col">Remove</th>
 				</thead>
 				
 				<tbody id="lib">
 					<?php foreach($movies as $movie): ?>
						<tr data-href="\movies-library\pages\movie.php?movie=<?php echo $movie["movieId"]; ?>">
							<th scope="row"><?php echo ++$i; ?> </th>
							<td><img style="width: 50px;" src="\movies-library\images\movies\<?php echo $movie["movieId"]; ?>.jpg" alt="<?php echo $movie["title"]; ?> poster"></td>
							<td><?php echo $movie["title"]; ?></td>
							<td><?php echo $movie["categories"]; ?></td>
							<td class="text-center font-weight-bold"><?php echo $movie["score"]; ?></td>
							<td>
								<button onclick="removeMovie(<?php echo $movie["movieId"].", '".$movie["title"]."'"; ?>);removeMovieRow($(this));" class="btn mx-auto d-block">
									<i class="fa fa-times"></i>
								</button>
							</td>
						</tr>
					<?php endforeach; ?>
 				</tbody>
 			</table>
        </main>
<?php
	include "../includes/footer.php";
?>