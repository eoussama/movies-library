<?php
	require_once "database.php";
	
	$query = 'SELECT * FROM `movies` ORDER BY `releaseDate` DESC LIMIT 6;';
	$results = mysqli_query($con, $query);
	$movies = mysqli_fetch_all($results, MYSQLI_ASSOC);
	$output = "<div class=\"row mb-5\">";
	$iter = 0;
		 
	foreach($movies as $movie) {
		$iter++;
		
	if($iter == 4) $output .= "</div><div class=\"row\">";
		$output .= "
			<div class=\"col\">
				<div class=\"card\" style=\"width: 18rem;\">
					<img class=\"card-img-top\" style=\"height: 300px;\" src=\"\movies-library\images\movies\\${movie["movieId"]}.jpg\" alt=\"${movie["title"]} image\">
					<div class=\"card-body\">
						<h5 class=\"card-title\">${movie["title"]} - (".date('Y', strtotime($movie["releaseDate"])).")</h5>
						<p class=\"card-text\">${movie["description"]}</p>
						<a href=\"\movies-library\pages\movie.php?movie=${movie["movieId"]}\" class=\"btn btn-primary\">Details</a>
					</div>
				</div>
			</div>
		";
	}
	$output .= '</div>';

	echo $output;