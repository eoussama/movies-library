<?php
	session_start();
	
	$_SESSION['logged-in'] = (!isset($_SESSION['logged-in'])) ? true : $_SESSION['logged-in'];
	$_SESSION['loginFailed'] = (!isset($_SESSION['loginFailed'])) ? false : $_SESSION['loginFailed'];
	$_SESSION['username'] = (!isset($_SESSION['username'])) ? '' : $_SESSION['username'];
	$_SESSION['password'] = (!isset($_SESSION['password'])) ? '' : $_SESSION['password'];
	$_SESSION['userId'] = (!isset($_SESSION['userId'])) ? 0: $_SESSION['userId'];
	$_SESSION['joinDate'] = (!isset($_SESSION['joinDate'])) ? 0 : $_SESSION['joinDate'];
	$_SESSION['moderator'] = (!isset($_SESSION['moderator'])) ? 0 : $_SESSION['moderator'];

	if(!isset($_GET['userId']))
		header('Location: \movies-library\index.php');

	include "../includes/header.php";
	include "../includes/database.php";

	$userId = mysqli_real_escape_string($con, htmlspecialchars($_GET['userId']));
	$query = "SELECT `username`, `joinDate`, `moderator` FROM `users` WHERE `userId` = $userId;";
	$results = mysqli_query($con, $query);
	$user = mysqli_fetch_assoc($results);
	$query = "SELECT COUNT(`movieId`) AS `movies` FROM `libraries` WHERE `userId` = $userId;";
	$results = mysqli_query($con, $query);
	$movies = mysqli_fetch_assoc($results);
	
?>
 		<main class="container mt-5 mb-5">
			<h2><i class="fa fa-user"></i> User information</h2>
       		<hr>
       		
       		<div class="card">
				<h3 class="card-header">
					<div class="row">
						<div class="col-10" id="account-userName">
							<?php echo $user['username']; ?>
						</div>
						<div class="col-2">
							<h3 class="text-right"><span class="badge badge-secondary"><?php echo ($user['moderator'] == 0) ? "User" : "Moderator"; ?></span></h3>
						</div>
					</div>
				</h3>
				<div class="card-body">
					<div class="row">
						<div class="col">
							<h5 class="card-title">Account information</h5>
							<hr>
							<ul class="list-group">
								<li class="list-group-item"><i class="fa fa-lg fa-calendar-alt"></i> Join on: <b><?php echo date('Y - M - d', strtotime($_SESSION['joinDate'])); ?></b></li>
								<li class="list-group-item"><i class="fa fa-lg fa-film"></i> Movies: <b><?php echo $movies['movies']; ?></b></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
        </main>
<?php
	include "../includes/footer.php";
?>