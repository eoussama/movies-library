<!DOCTYPE html>

<html lang="en">
    <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="application-name" content="Exchange">
		<meta name="author" content="Amine, Ayman">
		<meta name="description" content="A user-friendly platform that eases exchanging goods online.">
		<meta name="keywords" content="exchange, shopping, e-commerce">

		<link rel="stylesheet" type="text/css" href="\movies-library\fonts\font-awesome\css\fontawesome-all.min.css">
		<link href="\movies-library\styles\bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="\movies-library\styles\error.css">
		<link rel="icon" type="image/png" href="\movies-library\images\favicon.png">

		<title>Exchange</title>
	</head>
    
    <body>
		<div class="jumbotron" style="height: 100vh; padding: 250px;">
			<h1 class="display-1 text-center"><i class="fas fa-bug"></i> Ops, file not found!</h1>
			<hr>
			<p class="text-center">The page you're trying to access does not exists! either that, or there were some problems while being redirected, in that case please let our support team know.</p>
			<div class="row">
				<div class="col">
					<a href="\movies-library\index.php" class="btn btn-dark btn-lg btn-block" target="_self">Go to the main page</a>
				</div>
				<div class="col">
					<a href="javascript:void(0)" class="btn btn-dark btn-lg btn-block" target="_self" id="goBack">Go back</a>
				</div>
			</div>
		</div>
	</body>
	
	<script type="text/javascript" src="\movies-library\scripts\jquery-3.3.1.min.js"></script>
	<script>
		$(document).ready(function() {
			const $goBack = $('#goBack');
			$goBack.on('click', function() {
				history.back();
			});
		});
	</script>
</html>