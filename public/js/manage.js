function loadManageJobs() {
	// change profile
	$('#profiles').on('change', function() {
		var data_json = {
			doaction: 'get_profile_jobs',
			profile_id: $(this).val()
		}

		// get list jobs filtered
		$.ajax({
			url: site_url + 'manage/getdata',
			data: data_json,
			// dataType: 'json',
			success: function(data) {
				data = JSON.parse(data);
				var list_jobs = data.list_jobs;
				var list_jobs_html = '';
				for(i = 0;i < list_jobs.length;i++) {
					list_jobs_html += '<li><h5><input type="checkbox" class="job_cb" data-jobid="' + list_jobs[i].job_id + '"> <a data-jobid="' + list_jobs[i].job_id + '" class="job-filtered" data-content="' + list_jobs[i].description + '" data-placement="bottom" data-toggle="popover" title="" data-original-title="' + list_jobs[i].job_name + '">' + list_jobs[i].job_name + '</a></h5></li>';
				}
				$('#list_jobs_filtered').html(list_jobs_html);
				manage_registerViewJobs();
			}
		});

		// get list jobs profile
		data_json.doaction = 'get_jobs_profile';
		$.ajax({
			url: site_url + 'manage/getdata',
			data: data_json,
			// dataType: 'json',
			success: function(data) {
				data = JSON.parse(data);
				var list_jobs = data.list_jobs;
				var list_jobs_html = '';
				for(i = 0;i < list_jobs.length;i++) {
					list_jobs_html += '<li><h5><input type="checkbox" class="job_cb" data-jobid="' + list_jobs[i].job_id + '"> <a data-jobid="' + list_jobs[i].job_id + '" class="job-filtered" data-content="' + list_jobs[i].description + '" data-placement="bottom" data-toggle="popover" title="" data-original-title="' + list_jobs[i].job_name + '">' + list_jobs[i].job_name + '</a></h5></li>';
				}
				$('#list_jobs_profile').html(list_jobs_html);
				manage_registerViewJobs();
			}
		});
	});
	$('#profiles').trigger('change');

	// export jobs to word file
	$('.export-word').on('click', function() {
		var list_jobs = '';
		$('.job_cb:checked').each(function() {
			list_jobs += $(this).data('jobid') + '_';
		})
		window.location = site_url + 'manage/export2word/' + list_jobs;
	});

	// export jobs email to word file
	$('.export-emails').on('click', function() {
		var list_jobs = '';
		$('.job_cb:checked').each(function() {
			list_jobs += $(this).data('jobid') + '_';
		})
		window.location = site_url + 'manage/export2emails/' + list_jobs;
	});
}

function manage_registerViewJobs() {
	$('.job-filtered').off('click').on('click', function() {
		$.ajax({
			url: site_url + 'filter/viewjob/' + $(this).data('jobid'),
			success: function(data) {
				$('#modalViewJob').modal().html(data).find('[data-toggle="popover"]').popover();
			}
		});
	});
}

function loadManageProfiles() {
	// change profile
	$('#jobs').on('change', function() {
		var data_json = {
			doaction: 'get_job_profiles',
			job_id: $(this).val()
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
					list_jobs_html += '<li><h5><input type="checkbox"> | <a data-jobid="' + list_jobs[i].job_id + '" class="job-filtered" data-content="' + list_jobs[i].description + '" data-placement="bottom" data-toggle="popover" title="" data-original-title="' + list_jobs[i].job_name + '">' + list_jobs[i].job_name + '</a></h5></li>';
				}
				$('#list_jobs_filtered').html(list_jobs_html);
				manage_registerViewJobs();
			}
		});
	});
	$('#jobs').trigger('change');

	// export to word file
	$('.export-word').on('click', function() {
		window.location = site_url + 'manage/export2word';
	});
}