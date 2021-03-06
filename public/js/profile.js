function profile_registerEvents() {
	profile_registerSelectCat();
	profile_registerSelectAsk();
	profile_registerRemoveSelectedAsk();
	profile_registerProfileActions();

	// datepicker
	$('#profile_birthdate').datepicker({format: "yyyy-mm-dd", autoclose: true, todayHighlight: true});

	// display first ASK Category
	$('.profile-cat:first').trigger('click');

	// view job
	$('.view-profile').on('click', function() {
		var profile_id = $('#list_profiles').val();
		$.ajax({
			url: site_url + 'profile/view/' + profile_id,
			success: function(data) {
				$('#modalViewProfile').modal().html(data).find('[data-toggle="popover"]').popover();
			}
		});
	});
}

function profile_registerStarRating($objParent, curRating) {
	$objParent.find('.star-rating .glyphicon').on('click', function() {
		var selRating = $(this).data('rating');
		$objParent.find('input.rating-value').val(selRating);
		$objParent.find('.star-rating .glyphicon').each(function() {
	        if (parseInt(selRating) >= parseInt($(this).data('rating'))) {
	            return $(this).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
	        } else {
	            return $(this).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
	        }
	    });
	});

	// set selected star rating
	$objParent.find('.star-rating .glyphicon').each(function() {
		if (parseInt(curRating) == parseInt($(this).data('rating'))) {
			$(this).trigger('click');
		}
	});
}

function profile_registerSelectCat() {
	$('.profile-cat').on('click', function() {
		var cat_id = $(this).data('cat-id');
		$('#selected_cat_id').val(cat_id);
		$('.profile-cat-asks').each(function() {
			if($(this).data('cat-id') == cat_id) {
				$(this).show();
			} else {
				$(this).hide();
			}
		});
	});
}

function profile_registerSelectAsk() {
	$('.profile-ask .glyphicon').on('click', function() {
		var ask_id = $(this).closest('.profile-ask').data('ask-id');
		$('#selected_ask_' + ask_id).show();
		var ask_star = $(this).data('rating');
		profile_updateSelectedAsksField(ask_id, ask_star, 'add');
		profile_registerStarRating($('#selected_ask_' + ask_id), ask_star);

		var cat_id = $(this).closest('.profile-cat-asks').data('cat-id');
		var selected_cat = $('#selected_cat_' + cat_id);
		var current_level = selected_cat.data('level');
		current_level--;
		selected_cat.show();
		selected_cat.prevAll('.profile-selected-cat').each(function() {
			if($(this).data('level') == current_level) {
				$(this).show();
				current_level--;
			}
		});
	});
}

function profile_registerRemoveSelectedAsk() {
	$('.remove-selected-ask').on('click', function() {
		var ask_id = $(this).closest('.selected-ask').data('ask-id');
		profile_updateSelectedAsksField(ask_id, '', 'remove');
		$(this).closest('.selected-ask').hide();
	});
}

function profile_updateSelectedAsksField(ask_id, ask_star, mode) {
	ask_id = ask_id.toString();
	var selected_asks = $('#selected_asks').val();
	var aSelectedAsks = selected_asks.split(';');
	var selected_asks_rating = $('#selected_asks_rating').val();
	var aSelectedAsksRating = selected_asks_rating.split(';');
	var pos = aSelectedAsks.indexOf(ask_id);
	if(mode == 'remove') {
		if(pos > -1) {
			aSelectedAsks.splice(pos, 1);
			aSelectedAsksRating.splice(pos, 1);
		}
	} else {
		if(pos < 0) {
			aSelectedAsks.push(ask_id);
			aSelectedAsksRating.push(ask_star);
		}
	}
	$('#selected_asks').val(aSelectedAsks.join(';'));
	$('#selected_asks_rating').val(aSelectedAsksRating.join(';'));
}

function profile_displaySelectedAsk(ask_id, rating) {
	$('#ask_' + ask_id).find('span[data-rating=' + rating + ']').trigger('click');
}

function profile_registerProfileActions() {
	$('.delete-profile').on('click', function() {
		window.location = site_url + 'profile/delete/' + $('#list_profiles').val();
	});
	$('.edit-profile').on('click', function() {
		window.location = site_url + 'profile/edit/' + $('#list_profiles').val();
	});
	$('.new-profile').on('click', function() {
		window.location = site_url + 'profile';
	});
}

function profile_viewSelectAsk(ask_id, ask_star) {
	$('#modalViewProfile #selected_ask_' + ask_id).show();
	profile_registerStarRating($('#modalViewProfile #selected_ask_' + ask_id), ask_star);
	var selected_cat = $('#modalViewProfile #selected_ask_' + ask_id).closest('ul.nav').prev();
	var current_level = selected_cat.data('level');
	current_level--;
	selected_cat.show();
	selected_cat.prevAll('#modalViewProfile .job-selected-cat').each(function() {
		if($(this).data('level') == current_level) {
			$(this).show();
			current_level--;
		}
	});
}

function profile_registerFilterJobs() {
	// filter
	$('.filter-select').on('change', function() {
		if($(this).attr('id') == 'filter_profile') $('#list_selected_jobs').html('');
		profile_filterJobs();
	});

	// match
	$('#filter_match').slider({
		formatter: function(value) {
			return value + '%';
		}
	});
	$("#filter_match").on("slide", function(slideEvt) {
		$("#filter_matchSliderVal").text(slideEvt.value);
	});
	$("#filter_match").on("slideStop", function(slideEvt) {
		$("#filter_matchSliderVal").text(slideEvt.value);
		// console.log(slideEvt.value);
		// do search
		profile_filterJobs();
	});

	// save filter
	$('.save-filter').on('click', function() {
		profile_saveFilter();
	});

	// save selected jobs
	$('.save-jobs').on('click', function() {
		profile_saveJobs();
	});

	// first load
	$("#filter_match").trigger("slideStop");
}

function profile_saveFilter() {
	var params = {};
	$('.filter-select').each(function() {
		if($(this).val() != '') {
			params[$(this).attr('id')] = $(this).val();
		}
	});
	params['filter_match'] = $('#filter_matchSliderVal').text();
	params['filter_id'] = $('#filter_id').val();
	params['schedule_report'] = $('[name=schedule_report]:checked').val();
 	$.ajax({
		url: site_url + 'filter/savefilter/',
		data: params,
		success: function(filter_id) {
			$('#filter_id').val(filter_id);
			alert('Saved current filter');
		}
	});
}

function profile_saveJobs() {
	var selected_jobs = '';
	$('.selected-job').each(function() {
		selected_jobs += $(this).data('jobid') + ';';
	});
 	$.ajax({
		url: site_url + 'filter/savejobs/',
		data: {selected_jobs: selected_jobs, profile_id: $('#filter_profile').val()},
		success: function(data) {
			alert('Saved selected jobs');
		}
	});
}

function profile_filterJobs() {
	var params = {};
	$('.filter-select').each(function() {
		if($(this).val() != '') {
			params[$(this).attr('id')] = $(this).val();
		}
	});
	params['filter_match'] = $('#filter_matchSliderVal').text();
 	$.ajax({
		url: site_url + 'filter/search/',
		data: params,
		success: function(data) {
			data = JSON.parse(data);
			var list_jobs_content = '';
			for(job of data.search_result) {
				if($('.selected-job[data-jobid=' + job.job_id + ']').length <= 0) {
					list_jobs_content += '<li><h5><a class="filter-job-name" data-jobid="' + job.job_id + '" data-match-point="' + job.match_point + '" title="' + job.job_name + '">' + job.job_name + '</a> (' +  job.match_point + '%) | <c class="select-job">Chọn</c></h5></li>';
				}
			}
			$('#list_jobs').html(list_jobs_content);
			profile_registerSelectJobs();
			profile_registerViewJobs();
			for(job of data.selected_jobs) {
				if($('.selected-job[data-jobid=' + job.job_id + ']').length <= 0) {
					$('a[data-jobid=' + job.job_id + ']').next().trigger('click');
				}
			}
		}
	});
}

function profile_registerSelectJobs() {
	$('.select-job').off('click');
	$('.select-job').on('click', function() {
		var $job_data = $(this).closest('li').find('a');
		// var selected_job_content = '<li><h5><c class="remove-job">X</c>&nbsp;|&nbsp;<a tabindex="0" role="button" data-trigger="focus" title="' + $job_data.text() + '" data-toggle="popover" data-placement="bottom" data-content="' + $job_data.data('content') + '">' + $job_data.text() + '</a></h5></li>';
		var selected_job_content = '<li><h5><c class="remove-job">X</c>&nbsp;|&nbsp;<a class="selected-job" data-jobid="' + $job_data.data('jobid') + '" data-match-point="' + $job_data.data('match-point') + '" title="' + $job_data.text() + '">' + $job_data.text() + '</a> (' +  $job_data.data('match-point') + '%)</h5></li>';
		$('#list_selected_jobs').append(selected_job_content);
		profile_registerViewJobs();
		// $('[data-toggle="popover"]').popover();
		profile_removeJobs();
		$(this).closest('li').remove();
	});
}

function profile_removeJobs() {
	$('.remove-job').off('click');
	$('.remove-job').on('click', function() {
		var $job_data = $(this).closest('li').find('a');
		// var job_content = '<li><h5><a tabindex="0" role="button" data-trigger="focus" title="' + $job_data.text() + '" data-toggle="popover" data-placement="bottom" data-content="' + $job_data.data('content') + '">' + $job_data.text() + '</a> | <c class="select-job">Chọn</c></h5></li>';
		var job_content = '<li><h5><a class="filter-job-name" data-jobid="' + $job_data.data('jobid') + '" data-match-point="' + $job_data.data('match-point') + '" title="' + $job_data.text() + '">' + $job_data.text() + '</a> (' +  $job_data.data('match-point') + '%) | <c class="select-job">Chọn</c></h5></li>';
		$('#list_jobs').append(job_content);
		$('[data-toggle="popover"]').popover();
		profile_registerSelectJobs();
		profile_registerViewJobs();
		$(this).closest('li').remove();
	});
}

function profile_registerViewJobs() {
	$('.filter-job-name').off('click').on('click', function() {
		$.ajax({
			url: site_url + 'filter/viewjob/' + $(this).data('jobid'),
			success: function(data) {
				$('#modalViewJob').modal().html(data).find('[data-toggle="popover"]').popover();
			}
		});
	});
	$('.selected-job').off('click').on('click', function() {
		$.ajax({
			url: site_url + 'filter/viewjob/' + $(this).data('jobid'),
			success: function(data) {
				$('#modalViewJob').modal().html(data).find('[data-toggle="popover"]').popover();
			}
		});
	});
}