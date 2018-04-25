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
							<a class="nav-link" href="index.html">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  Categories
						</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Adventure</a>
								<a class="dropdown-item" href="#">Sci-fi</a>
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
					<input class="btn btn-light mr-sm-2" type="button" value="Sign up">
					<input class="btn btn-outline-light" type="button" value="Login">
				</form>
			</nav>
        </header>