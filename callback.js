$(function() {
$('.popup-with-move-anim').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		mainClass: 'my-mfp-slide-bottom'
	});


	$(".callback").submit(function() {
		var th = $(this);
		$.ajax({
		type: "POST",
		url: "callback.php", 
		data: th.serialize()
		}).done(function() {
		$(".success").addClass("visible");			
		});
		return false;
	});


	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {
};
$("img, a").on("dragstart", function(event) { event.preventDefault(); });
});