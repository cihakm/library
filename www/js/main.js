$(document).ready(function () {
	$('.alert').delay(5000).hide('slow');
	$('.book-carousel').slick({
		dots: false,
		infinite: true,
		arrows: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 960,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 769,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
	$(function () {
		$.nette.init();
	});

});
$(document).ajaxComplete(function () {
	$('.alert').delay(5000).hide('slow');
});
