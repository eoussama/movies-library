$(document).ready(function() {
	const
		$latestFeatures = $('#latestFeatures'),
		$aboutUs = $('#aboutUs'),
		$backToTop = $("#backToTop"),
		$subBtn = $('#subBtn'),
		$headerHeight = $('header div.jumbotron').outerHeight(),
		$navbar = $('#navbar');
	
	$aboutUs.on('click', function() {
		$("html, body").animate({ scrollTop: $(document).height() }, "slow");
	});
	
	$backToTop.on('click', function() {
		$("html, body").animate({ scrollTop: 0 }, "slow");
	});
	
	$subBtn.on('click', function() {
		let
			$passInput = $('#passInput'),
			$pConfInput = $('#pConfInput');
		
		if($passInput.val() !== $pConfInput.val())
			$($pConfInput)[0].setCustomValidity('The passwords do not match!');
		else
			$($pConfInput)[0].setCustomValidity('');
	});
	
	$(window).on('scroll', function() {
		if($headerHeight <= this.scrollY)
			$navbar.addClass('navbar-sticky');
		else
			$navbar.removeClass('navbar-sticky');
	});

});

function addMovie(movieId, movieTitle) {
	$.ajax({
	  url: "/movies-library/includes/addMovie.php",
	  type: "POST",
	  data: {movieId : movieId}
	}).done(function(data) {
		$('#movieModal div.modal-body p').html(`<b>${movieTitle}</b> has been added to your library.`);
		$('#movieModal').modal('show');
	});
}