$(document).ready(function() {
	const
		$latestFeatures = $('#latestFeatures'),
		$aboutUs = $('#aboutUs'),
		$backToTop = $("#backToTop"),
		$subBtn = $('#subBtn');
	
	$aboutUs.on('click', function() {
		$("html, body").animate({ scrollTop: $(document).height() }, "slow");
	});
	
	$backToTop.on('click', function() {
		$("html, body").animate({ scrollTop: 0 }, "slow");
	});
	
	$subBtn.on('click', function(e) {
		let
			$passInput = $('#passInput'),
			$pConfInput = $('#pConfInput');
		
		console.log($passInput.val(), $pConfInput.val());
		if($passInput.val() !== $pConfInput.val())
			$($pConfInput)[0].setCustomValidity('The passwords do not match!');
		else
			$($pConfInput)[0].setCustomValidity('');
	});
});