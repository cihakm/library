$(document).ready(function () {
	$('.alert').delay(5000).slideToggle('slow');
	$('.book-carousel').slick({
		dots: false,
		infinite: true,
		arrows: true,
		speed: 300,
		slidesToShow: 4,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 992,
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
	$('.alert').delay(5000).slideToggle('slow');
});
