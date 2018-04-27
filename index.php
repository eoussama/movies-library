<?php
	session_start();
	
	$_SESSION['logged-in'] = (!isset($_SESSION['logged-in'])) ? false : $_SESSION['logged-in'];
	$_SESSION['loginFailed'] = (!isset($_SESSION['loginFailed'])) ? false : $_SESSION['loginFailed'];
	$_SESSION['username'] = (!isset($_SESSION['username'])) ? '' : $_SESSION['username'];
	$_SESSION['password'] = (!isset($_SESSION['password'])) ? '' : $_SESSION['password'];
	$_SESSION['userId'] = (!isset($_SESSION['userId'])) ? 0: $_SESSION['userId'];
	$_SESSION['joinDate'] = (!isset($_SESSION['joinDate'])) ? 0 : $_SESSION['joinDate'];
	$_SESSION['moderator'] = (!isset($_SESSION['moderator'])) ? 0 : $_SESSION['moderator'];

	if($_SESSION['username'] === '')
		$_SESSION['logged-in'] = false;
		
	include "includes/header.php";
?>
 		<main class="container mt-5 mb-5">
      		<div class="card mb-5">
				<div class="card-header">
					<h2>The finest movie browsing experience!</h2>
				</div>
				<div id="slideCore" class="card-body" id="latestFeatures">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100" style="height: 500px;" src="images/slides/slide-1.jpg" alt="Movies">

								<div class="carousel-caption d-none d-md-block">
									<h5>Rich movie library</h5>
									<p>Easily find and track your favourite movies</p>
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" style="height: 500px;" src="images/slides/slide-2.jpg" alt="Star Wars">

								<div class="carousel-caption d-none d-md-block">
									<h5>Star Wars</h5>
									<p>The greatest sci-fi franchise ever!</p>
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" style="height: 500px;" src="images/slides/slide-3.jpg" alt="The lord of the rings">

								<div class="carousel-caption d-none d-md-block">
									<h5>The lord of the rings</h5>
									<p>The famous mystery trillogy.</p>
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block w-100" style="height: 500px;" src="images/slides/slide-4.jpg" alt="The Avengers">

								<div class="carousel-caption d-none d-md-block">
									<h5>The Avengers</h5>
									<p>The most thrilling hero franchise of all time.</p>
								</div>
							</div>
						</div>

						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
						</ol>

						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
       	
       	
        	<div class="card">
				<div class="card-header">
					<h4>Latest features</h4>
				</div>
				<div class="card-body" id="latestFeatures">
					<?php require_once "includes/latestFeatures.php"; ?>
				</div>
			</div>
       
       		<div class="card mt-5">
				<div class="card-header">
					<h4>Top 10 movies of all time</h4>
				</div>
				<div class="card-body" id="latestFeatures">
					<?php require_once "includes/topMovies.php"; ?>
				</div>
			</div>
        </main>
<?php
	include "includes/footer.php";
?>