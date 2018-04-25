<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="application-name" content="Movies library">
        <meta name="author" content="EOussama">
        <meta name="description" content="A simple movies browsing platform.">
        <meta name="keywords" content="movies, movie database">

        <link href="\movies-library\fonts\font-awesome\css\fontawesome-all.min.css" rel="stylesheet">
        <link href="\movies-library\styles\bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="\movies-library\styles\main.css">
        <link rel="icon" type="image/png" href="\movies-library\images\favicon.png">

        <title>Movies library</title>
    </head>

    <body>
        <header>
			<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="loginModalLabel"><i class="fas fa-sign-in-alt"></i> Login</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" action="">
							<div class="modal-body">
									<div class="form-group">
										<label for="login-username" class="col-form-label">Username</label>
										<input type="text" class="form-control" placeholder="Input a valid username" maxlength="20" id="login-username" required>
									</div>
									<div class="form-group">
										<label for="login-password" class="col-form-label">Password</label>
										<input type="password" class="form-control" placeholder="Input a valid username" maxlength="15" minlength="5" id="login-password" required>
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<input type="submit" class="btn btn-primary" value="Login">
							</div>
						</form>
					</div>
				</div>
			</div>
       		<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="signupModalLabel"><i class="fas fa-user-plus"></i> Sign-up</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" action="">
							<div class="modal-body">
									<div class="form-group">
										<label for="signin-username" class="col-form-label">Username</label>
										<input type="text" class="form-control" placeholder="Input a valid username" maxlength="20" id="signin-username" required>
									</div>
									<div class="form-group">
										<label for="signin-password" class="col-form-label">Password</label>
										<input type="password" id="passInput" class="form-control" placeholder="Input a valid username" maxlength="15" minlength="5" id="signin-password" required>
									</div>
									<div class="form-group">
										<label for="signin-password" class="col-form-label">Password confirmation</label>
										<input type="password" id="pConfInput" class="form-control" placeholder="Input a valid username" maxlength="15" minlength="5" id="signin-password" required>
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<input type="submit" id="subBtn" class="btn btn-primary" value="Sign-up">
							</div>
						</form>
					</div>
				</div>
			</div>
       	
        	<div class="jumbotron text-center">
        		<img src="\movies-library\images\logo.svg" class="mx-auto d-block" style="width: 150px;" alt="Logo">
        		<h1 class="display-4">The movie library</h1>
        		<p class="text-secondary">The future of looking up movies</p>
        	</div>
        	
        	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="\movies-library\index.php">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Categories
						</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Adventure</a>
								<a class="dropdown-item" href="#">Biography</a>
								<a class="dropdown-item" href="#">Comedy</a>
								<a class="dropdown-item" href="#">Crime</a>
								<a class="dropdown-item" href="#">Drama</a>
								<a class="dropdown-item" href="#">Fantasy</a>
								<a class="dropdown-item" href="#">Horro</a>
								<a class="dropdown-item" href="#">Sci-fi</a>
								<a class="dropdown-item" href="#">Romance</a>
								<a class="dropdown-item" href="#">Thriller</a>
								<a class="dropdown-item" href="#">War</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="javascript:void(0)" id="aboutUs">About us</a>
						</li>
						<form class="form-inline ml-2">
							<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-light" type="submit">Search</button>
						</form>
					</ul>
				</div>
				<form class="form-inline my-2 my-lg-0">
					<input class="btn btn-light mr-sm-2" data-toggle="modal" data-target="#signupModal" type="button" value="Sign up">
					<input class="btn btn-outline-light" data-toggle="modal" data-target="#loginModal" type="button" value="Login">
				</form>
			</nav>
        </header>