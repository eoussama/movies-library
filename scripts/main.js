$(document).ready(function() {
	const
		$latestFeatures = $('#latestFeatures'),
		$aboutUs = $('#aboutUs'),
		$backToTop = $("#backToTop"),
		$subBtn = $('#subBtn'),
		$headerHeight = $('header div.jumbotron').outerHeight(),
		$navbar = $('#navbar'),
		$updateUserForm = $('#updateUserForm');
	
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
	
	$('table.table tbody tr').on('click', function(e) {
		window.open($(this).data("href"))
	});
	
	$updateUserForm.on('submit', function(e) {
		let
			$username = $('#updateUsername'),
			$curPass = $('#curPass'),
			$newPass = $('#newPass');
		
		e.preventDefault();
		
		$.ajax({
			url: '/movies-library/includes/updateUser.php',
			method: 'post',
			data: {
				username: $username.val(),
				curPass: $curPass.val(),
				newPass: $newPass.val(),
			}
		}).done(function(data) {
			if(data === 'userTaken') {
				$('#errorModal div.modal-body p').html(`The username <b>${$username.val()}</b> is not available.`);
				$('#errorModal').modal('show');
			} else if(data === 'false') {
				$('#errorModal div.modal-body p').html('You have entered a wrong password.');
				$('#errorModal').modal('show');
			} else if(data === 'true') {
				$('#movieModal div.modal-body p').html('You have successfully updated your account.');
				$('#movieModal').modal('show');
				$('#account-userName').text($username.val());
				$('#dropdown-username').html(`<i class="fa fa-user fa-lg"></i> ${$username.val()}`);
			}
		});
	});
});

function addMovie(movieId, movieTitle) {
	$.ajax({
	  url: "/movies-library/includes/addMovie.php",
	  type: "POST",
	  data: {movieId : movieId}
	}).done(function(data) {
		if(data === 'true') {
			$('h2#controlBtns').html('<i id="removeMovie" class="fa fa-times" onclick="removeMovie('+movieId+', \''+movieTitle+'\');"></i>');
			$('#movieModal div.modal-body p').html(`<b>${movieTitle}</b> has been added to your library.`);
			$('#movieModal').modal('show');
		}
	});
}

function removeMovie(movieId, movieTitle) {
	$.ajax({
	  url: "/movies-library/includes/removeMovie.php",
	  type: "POST",
	  data: {movieId : movieId}
	}).done(function(data) {

		if(data === 'true') {
			$('h2#controlBtns').html('<i id="addMovie" class="fa fa-plus" onclick="addMovie('+movieId+', \''+movieTitle+'\');"></i>');
			$('#movieModal div.modal-body p').html(`<b>${movieTitle}</b> has been removed from your library.`);
			$('#movieModal').modal('show');
		}
	});
}

function removeMovieRow(e) {
	e.parent().parent().remove()
}