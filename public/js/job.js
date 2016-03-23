$(function() {
	job_registerSelectCat();
	job_registerSelectAsk();
});

function job_registerSelectCat() {
	$('.job-cat').on('click', function() {
		var cat_id = $(this).data('cat-id');
		$('.job-cat-asks').each(function() {
			if($(this).data('cat-id') == cat_id) {
				$(this).show();
			} else {
				$(this).hide();
			}
		});
	});
}

function job_registerSelectAsk() {
	$('.job-ask').on('click', function() {
		var cat_id = $(this).closest('.job-cat-asks').data('cat-id');
		var selected_cat = $('#selected_cat_' + cat_id);
		var current_level = selected_cat.data('level');
		current_level--;
		selected_cat.next().find('li ul').append('<li>' + $(this).html() + '</li>');
		selected_cat.show();
		selected_cat.prevAll('.job-selected-cat').each(function() {
			if($(this).data('level') == current_level) {
				$(this).show();
				current_level--;
			}
		});
	});
}

function job_editJob() {
	window.location = site_url + 'job/edit/' + $('#list_jobs').val();
}