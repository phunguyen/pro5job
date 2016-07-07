function loadManageJobs() {
	// change profile
	$('#profiles').on('change', function() {
		var data_json = {
			doaction: 'get_profile_jobs',
			profile_id: $(this).val()
		}
		$.ajax({
			url: site_url + 'manage/getdata',
			data: data_json,
			// dataType: 'json',
			success: function(data) {
				data = JSON.parse(data);
				var list_jobs = data.list_jobs;
				var list_jobs_html = '';
				for(i = 0;i < list_jobs.length;i++) {
					list_jobs_html += '<li><h5><input type="checkbox"> | <a data-content="' + list_jobs[i].description + '" data-placement="bottom" data-toggle="popover" title="" data-original-title="' + list_jobs[i].job_name + '">' + list_jobs[i].job_name + '</a></h5></li>';
				}
				$('#list_jobs_filtered').append(list_jobs_html);
			}
		});
	});
	$('#profiles').trigger('change');
}