$(document).ready(function () {
	$('.form-control').blur(function () {
		if ($(this).val())
			$(this).addClass('used');
		else
			$(this).removeClass('used');
	});

	$(".form-control").each(function (index) {
		var value = $(this).val();
		if (value !== "") {
			$(this).addClass('used');
		}
	});

	$confirmBox = $('#confirm-modal');
	var staticObject =
		function () {
			$('[data-confirm]').on('click.confirm-box-open', function (e) {
				e.preventDefault();
				var $this = $(this);
				$confirmBox.find('p.body').text($this.attr('data-confirm'));
				$confirmBox.find('.yes')
					.attr('href', $this.attr('href'))
					.attr('data-form-id', $this.attr('data-form-id'))
					.attr('data-original-id', $this.attr('id'));
				$confirmBox.modal('show');
				$confirmBox.find('.yes').focus();
			});

		};
	var modal = $('#confirm-modal');
	staticObject.$confirmBox = modal;


	$(document).on('click.confirm-yes', '#confirm-modal' + ' .yes', function (e) {
		e.preventDefault();
		var $this = $(this);
		var href = $this.attr('href');
		if (href && href !== '#') {
			var post_data = 'confirm-post-data';
			if (!post_data) {
				$.get($this.attr('href')).then(function (/* r */) {

				}, function (r) {
					if (r.status !== 200)
						alert('Error in XHR loading\n\nStatus code: ' + r.status);
				});
			} else {
				$.post($(this).attr('href'), {
					selected: post_data
				}).then(function (/* r */) {

				}, function (r) {
					if (r.status !== 200)
						alert('Error in XHR loading\n\nStatus code: ' + r.status);
				});
			}
		}
		staticObject.$confirmBox.modal('hide');
		$this.removeAttr('href');
	});
	$('[data-confirm]').on('click.confirm-box-open', function (e) {
		e.preventDefault();
		var $this = $(this);
		$confirmBox.find('p.body').text($this.attr('data-confirm'));
		$confirmBox.find('.yes')
			.attr('href', $this.attr('href'))
			.attr('data-form-id', $this.attr('data-form-id'))
			.attr('data-original-id', $this.attr('id'));
		$confirmBox.modal('show');
		$confirmBox.find('.yes').focus();
	});
	
	
});