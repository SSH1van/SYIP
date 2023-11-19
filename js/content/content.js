var block_show = false;

function scrollMore() {
	var $target = $('#showmore-triger');

	if (block_show) {
		return false;
	}

	var wt = $(window).scrollTop();
	var wh = $(window).height();
	try {
		var et = $target.offset().top;
		var eh = $target.outerHeight();
	} catch (e) { 
		block_show = true;
	}

	var dh = $(document).height();

	if (wt + wh >= et || wh + wt == dh || eh + et < wh) {
		var page = $target.attr('data-page');
		page++;
		block_show = true;

		$.ajax({
			url: 'src/content.php?page=' + page,
			dataType: 'html',
			success: function (data) {
				$('.content').append(data);
				block_show = false;
			}
		});

		$target.attr('data-page', page);
		if (page == $target.attr('data-max')) {
			$target.remove();
		}
	}
}

$(window).scroll(function () {
	scrollMore();
});

$(document).ready(function () {
	scrollMore();
});
