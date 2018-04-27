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

	$query = "SELECT `userId`, `username`, `moderator` FROM `users`;";
	$results = mysqli_query($con, $query);
	$users = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>
 		<main class="container mt-5 mb-5">
 			<h3 id="usersCount"><i class="fa fa-users"></i> <b><?php echo sizeof($users); ?></b> user(s) found.</h3>
 			<hr>
			<ul class="list-group">
				<?php foreach($users as $user): ?>
					
					<li class="list-group-item">
						<div class="row">
							<div class="col-1 text-left">
								<span class="badge badge-secondary"><?php echo ($user['moderator'] == 0) ? "User" : "Moderator"; ?></span>
							</div>
							<div class="col-10">
								<a href="/movies-library/pages/user.php?userId=<?php echo $user['userId']; ?>" target="_blank" ><b><?php echo $user['username']; ?></b></a>
							</div>
							<div class="col-1 text-right">
								<button class="btn btn-danger" onclick="deleteUser(this, <?php echo $user['userId']; ?>);"><i class="fa fa-times"></i></button>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
        </main>
<?php
	include "../includes/footer.php";
?>