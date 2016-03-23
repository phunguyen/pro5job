$(function() {
	console.log('job done');
	job_registerSelectCat();
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
		})
	})
}

function job_editJob() {
	window.location = site_url + 'job/edit/' + $('#list_jobs').val();
}