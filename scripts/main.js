$(document).ready(function() {
	const
		$latestFeatures = $('#latestFeatures'),
		$aboutUs = $('#aboutUs'),
		$backToTop = $("#backToTop");
	
	$aboutUs.on('click', function() {
		$("html, body").animate({ scrollTop: $(document).height() }, "slow");
	});
	
	$backToTop.on('click', function() {
		$("html, body").animate({ scrollTop: 0 }, "slow");
	});
});