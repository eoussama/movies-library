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

	$query = "SELECT COUNT(`movieId`) AS `movies` FROM `libraries` WHERE `userId` = ".$_SESSION['userId'].";";
	$results = mysqli_query($con, $query);
	$movies = mysqli_fetch_assoc($results);
?>
 		<main class="container mt-5 mb-5">
			<h2><i class="fa fa-user-circle"></i> My account</h2>
       		<hr>
       		
       		<div class="card">
				<h3 class="card-header">
					<div class="row">
						<div class="col-10" id="account-userName">
							<?php echo $_SESSION['username']; ?>
						</div>
						<div class="col-2">
							<h3 class="text-right"><span class="badge badge-secondary"><?php echo ($_SESSION['moderator'] == 0) ? "User" : "Moderator"; ?></span></h3>
						</div>
					</div>
				</h3>
				<div class="card-body">
					<div class="row">
						<div class="col-8">
							<h5 class="card-title">Change account information</h5>
							<hr>
							<form id="updateUserForm" action="\movies-library\includes\updateUser.php" method="post" class="form-group">
								<div class="form-group">
									<label for="updateUsername">Username</label>
									<input type="text" value="<?php echo $_SESSION['username']; ?>" maxlength="20" class="form-control" id="updateUsername" aria-describedby="username" placeholder="Enter your desired username" required>
								</div>
								<div class="form-group">
									<label for="curPass">Current password</label>
									<input type="password" maxlength="15" mixlength="5" class="form-control" id="curPass" aria-describedby="Current password" placeholder="Enter your current password" required>
								</div>
								<div class="form-group">
									<label for="newPass">New password</label>
									<input type="password" maxlength="15" mixlength="5" class="form-control" id="newPass" aria-describedby="New password" placeholder="Enter a new password" required>
								</div>
								<hr>
								<div class="form-group">
								 	<div class="row">
								 		<div class="col-6">
								 			<input type="submit" value="Save" class="btn btn-block btn-primary">
								 		</div>
								 		<div class="col-6">
								 			<input type="reset" value="Clear" class="btn btn-block btn-outline-secondary">
								 		</div>
								 	</div>
								</div>
							</form>
						</div>
						<div class="col-4">
							<h5 class="card-title">Account information</h5>
							<hr>
							<ul class="list-group">
								<li class="list-group-item"><i class="fa fa-lg fa-calendar-alt"></i> Join on: <b><?php echo date('Y - M - d', strtotime($_SESSION['joinDate'])); ?></b></li>
								<li class="list-group-item"><a href="\movies-library\pages\library.php" target="_blank" ><i class="fa fa-lg fa-film"></i> Movies: <b><?php echo $movies['movies']; ?></b></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
        </main>
<?php
	include "../includes/footer.php";
?>