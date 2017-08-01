function job_registerEvents() {
	job_registerSelectCat();
	job_registerSelectAsk();
	job_registerRemoveSelectedAsk();
	job_registerAskRequire();
	job_registerAddAsk();
	job_registerJobActions();

	// date fields
	$('.date-field').datepicker({format: "yyyy-mm-dd", autoclose: true, todayHighlight: true});

	// display first ASK Category
	$('.job-cat:first').trigger('click');

	// view job
	$('.view-job').on('click', function() {
		var job_id = $('#list_jobs').val();
		$.ajax({
			url: site_url + 'job/view/' + job_id,
			success: function(data) {
				$('#modalViewProfile').modal().html(data).find('[data-toggle="popover"]').popover();
			}
		});
	});
}

function job_registerAskRequire() {
	$('.job-ask-require').on('click', function() {
		if($(this).data('require') == 1) {
			$(this).data('require', 0);
			$(this).css('color', 'gray').css('text-decoration', 'line-through');
		} else {
			$(this).data('require', 1);
			$(this).css('color', '#ff0000').css('text-decoration', 'none');
		}
	});
}

function job_registerStarRating($objParent, curRating) {
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

function job_registerSelectCat() {
	$('.job-cat').on('click', function() {
		var cat_id = $(this).data('cat-id');
		$('#selected_cat_id').val(cat_id);
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
	$('.job-ask .glyphicon').on('click', function() {
		var ask_id = $(this).closest('.job-ask').data('ask-id');
		var ask_require = $(this).closest('.job-ask').find('.job-ask-require').data('require');
		$('#selected_ask_' + ask_id).show();
		if(ask_require == 1) {
			$('#selected_ask_' + ask_id).find('.selected-ask-require').css('text-decoration', 'none').css('color', '#ff0000');
		} else {
			$('#selected_ask_' + ask_id).find('.selected-ask-require').css('text-decoration', 'line-through').css('color', 'gray');
		}
		var ask_star = $(this).data('rating');
		job_updateSelectedAsksField(ask_id, ask_require, ask_star, 'add');
		job_registerStarRating($('#selected_ask_' + ask_id), ask_star);

		var cat_id = $(this).closest('.job-cat-asks').data('cat-id');
		var selected_cat = $('#selected_cat_' + cat_id);
		var current_level = selected_cat.data('level');
		current_level--;
		selected_cat.show();
		selected_cat.prevAll('.job-selected-cat').each(function() {
			if($(this).data('level') == current_level) {
				$(this).show();
				current_level--;
			}
		});
	});
}

function job_registerRemoveSelectedAsk() {
	$('.remove-selected-ask').on('click', function() {
		var ask_id = $(this).closest('.selected-ask').data('ask-id');
		job_updateSelectedAsksField(ask_id, '', '', 'remove');
		$(this).closest('.selected-ask').hide();
	});
}

function job_updateSelectedAsksField(ask_id, ask_require, ask_star, mode) {
	ask_id = ask_id.toString();
	var selected_asks = $('#selected_asks').val();
	var aSelectedAsks = selected_asks.split(';');
	var selected_asks_require = $('#selected_asks_require').val();
	var aSelectedAsksRequire = selected_asks_require.split(';');
	var selected_asks_rating = $('#selected_asks_rating').val();
	var aSelectedAsksRating = selected_asks_rating.split(';');
	var pos = aSelectedAsks.indexOf(ask_id);
	if(pos > -1) {
		aSelectedAsks.splice(pos, 1);
		aSelectedAsksRequire.splice(pos, 1);
		aSelectedAsksRating.splice(pos, 1);
	}
	if(mode != 'remove') {
		aSelectedAsks.push(ask_id);
		aSelectedAsksRequire.push(ask_require);
		aSelectedAsksRating.push(ask_star);
	}
	$('#selected_asks').val(aSelectedAsks.join(';'));
	$('#selected_asks_require').val(aSelectedAsksRequire.join(';'));
	$('#selected_asks_rating').val(aSelectedAsksRating.join(';'));
}

function job_displaySelectedAsk(ask_id, require, rating) {
	if(require == 0) $('#ask_' + ask_id).find('.job-ask-require').trigger('click');
	$('#ask_' + ask_id).find('span[data-rating=' + rating + ']').trigger('click');
}

function job_registerAddAsk() {
	$('.btn-add-ask').on('click', function() {
		var new_ask_name = $('#new_ask_name').val();
		var new_ask_desc = $('#new_ask_desc').val();
		var selected_cat_id = $('#selected_cat_id').val();
		var dataJson = {'ask_name' : new_ask_name, 'ask_desc' : new_ask_desc, 'selected_cat_id' : selected_cat_id};
		$.ajax({
			url : site_url + 'job/add_ask',
			data : dataJson,
			success : function(new_ask_id) {
				var newAsk = '<li class="job-ask" data-ask-id="' + new_ask_id + '" id="ask_' + new_ask_id + '"><h5><c class="job-ask-require" data-require="1">Bắt buộc</c> | <font color="#ffd700" class="star-rating"><span class="glyphicon glyphicon-star-empty" data-rating="1"></span> <span class="glyphicon glyphicon-star-empty" data-rating="2"></span> <span class="glyphicon glyphicon-star-empty" data-rating="3"></span> <span class="glyphicon glyphicon-star-empty" data-rating="4"></span> <span class="glyphicon glyphicon-star-empty" data-rating="5"></span></font> | <a title="" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="' + new_ask_desc + '" data-original-title="' + new_ask_name + '">' + new_ask_name + '</a></h5></li>';
				var newSelectedAsk = '<li id="selected_ask_' + new_ask_id + '" style="display: none;" class="selected-ask" data-ask-id="' + new_ask_id + '"><h5><a class="remove-selected-ask">X</a> |<c class="selected-ask-require"> Bắt buộc</c> | <font color="#ffd700"><span class="star-rating"><span class="glyphicon glyphicon-star-empty" data-rating="1"></span> <span class="glyphicon glyphicon-star-empty" data-rating="2"></span> <span class="glyphicon glyphicon-star-empty" data-rating="3"></span> <span class="glyphicon glyphicon-star-empty" data-rating="4"></span> <span class="glyphicon glyphicon-star-empty" data-rating="5"></span><input type="hidden" name="whatever" class="rating-value" value="3"></span></font> | <a title="' + new_ask_name + '" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="' + new_ask_desc + '">' + new_ask_name + '</a></h5></li>';
				$('.job-cat-asks[data-cat-id=' + selected_cat_id + ']').find('ul').append(newAsk).find('[data-toggle="popover"]').popover();
				$('#selected_cat_' + selected_cat_id).next('ul').find('ul').append(newSelectedAsk).find('[data-toggle="popover"]').popover();
				$('#new_ask_name').val('');
				$('#new_ask_desc').val('');
				$('.job-ask .glyphicon').off('click');
				job_registerSelectAsk();
				$('.job-ask-require').off('click');
				job_registerAskRequire();
				$('.remove-selected-ask').off('click');
				job_registerRemoveSelectedAsk();
			}
		});
	});
}

function job_registerJobActions() {
	$('.delete-job').on('click', function() {
		window.location = site_url + 'job/delete/' + $('#list_jobs').val();
	});
	$('.edit-job').on('click', function() {
		window.location = site_url + 'job/edit/' + $('#list_jobs').val();
	});
	$('.new-job').on('click', function() {
		window.location = site_url + 'job';
	});
}

function job_viewSelectAsk(ask_id, ask_star, ask_require) {
	$('#modalViewJob #selected_ask_' + ask_id).show();
	if(ask_require == 1) {
		$('#modalViewJob #selected_ask_' + ask_id).find('.selected-ask-require').css('text-decoration', 'none').css('color', '#ff0000');
	} else {
		$('#modalViewJob #selected_ask_' + ask_id).find('.selected-ask-require').css('text-decoration', 'line-through').css('color', 'gray');
	}
	job_registerStarRating($('#modalViewJob #selected_ask_' + ask_id), ask_star);
	var selected_cat = $('#modalViewJob #selected_ask_' + ask_id).closest('ul.nav').prev();
	var current_level = selected_cat.data('level');
	current_level--;
	selected_cat.show();
	selected_cat.prevAll('#modalViewJob .job-selected-cat').each(function() {
		if($(this).data('level') == current_level) {
			$(this).show();
			current_level--;
		}
	});
}

function job_registerFilterProfiles() {
	// filter
	$('.filter-select').on('change', function() {
		if($(this).attr('id') == 'filter_job') $('#list_selected_jobs').html('');
		job_filterProfiles();
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
		job_filterProfiles();
	});

	// save filter
	$('.save-filter').on('click', function() {
		job_saveFilter();
	});

	// save selected jobs
	$('.save-profiles').on('click', function() {
		job_saveProfiles();
	});

	// first load
	$("#filter_match").trigger("slideStop");
}

function job_saveFilter() {
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

function job_saveProfiles() {
	var selected_profiles = '';
	$('.selected-profile').each(function() {
		selected_profiles += $(this).data('profileid') + ';';
	});
 	$.ajax({
		url: site_url + 'filter/saveprofiles/',
		data: {selected_profiles: selected_profiles, job_id: $('#filter_job').val()},
		success: function(data) {
			alert('Saved selected profiles');
		}
	});
}

function job_filterProfiles() {
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
			var list_profiles_content = '';
			for(profile of data.search_result) {
				if($('.selected-profile[data-profileid=' + profile.profile_id + ']').length <= 0) {
					list_profiles_content += '<li><h5><a class="filter-profile-name" data-profileid="' + profile.profile_id + '" data-match-point="' + profile.match_point + '" title="' + profile.profile_name + '">' + profile.profile_name + '</a> (' +  profile.match_point + '%) | <c class="select-profile">Chọn</c></h5></li>';
				}
			}
			$('#list_profiles').html(list_profiles_content);
			job_registerSelectProfiles();
			job_registerViewProfiles();
			for(profile of data.selected_profiles) {
				if($('.selected-profile[data-profileid=' + profile.profile_id + ']').length <= 0) {
					$('a[data-profileid=' + profile.profile_id + ']').next().trigger('click');
				}
			}
		}
	});
}

function job_registerSelectProfiles() {
	$('.select-profile').off('click');
	$('.select-profile').on('click', function() {
		var $profile_data = $(this).closest('li').find('a');
		// var selected_profile_content = '<li><h5><c class="remove-profile">X</c>&nbsp;|&nbsp;<a tabindex="0" role="button" data-trigger="focus" title="' + $profile_data.text() + '" data-toggle="popover" data-placement="bottom" data-content="' + $profile_data.data('content') + '">' + $profile_data.text() + '</a></h5></li>';
		var selected_profile_content = '<li><h5><c class="remove-profile">X</c>&nbsp;|&nbsp;<a class="selected-profile" data-profileid="' + $profile_data.data('profileid') + '" data-match-point="' + $profile_data.data('match-point') + '" title="' + $profile_data.text() + '">' + $profile_data.text() + '</a> (' +  $profile_data.data('match-point') + '%)</h5></li>';
		$('#list_selected_profiles').append(selected_profile_content);
		job_registerViewProfiles();
		// $('[data-toggle="popover"]').popover();
		job_removeProfiles();
		$(this).closest('li').remove();
	});
}

function job_removeProfiles() {
	$('.remove-profile').off('click');
	$('.remove-profile').on('click', function() {
		var $profile_data = $(this).closest('li').find('a');
		// var profile_content = '<li><h5><a tabindex="0" role="button" data-trigger="focus" title="' + $profile_data.text() + '" data-toggle="popover" data-placement="bottom" data-content="' + $profile_data.data('content') + '">' + $profile_data.text() + '</a> | <c class="select-profile">Chọn</c></h5></li>';
		var profile_content = '<li><h5><a class="filter-profile-name" data-profileid="' + $profile_data.data('profileid') + '" data-match-point="' + $profile_data.data('match-point') + '" title="' + $profile_data.text() + '">' + $profile_data.text() + '</a> (' +  $profile_data.data('match-point') + '%) | <c class="select-profile">Chọn</c></h5></li>';
		$('#list_profiles').append(profile_content);
		$('[data-toggle="popover"]').popover();
		job_registerSelectProfiles();
		job_registerViewProfiles();
		$(this).closest('li').remove();
	});
}

function job_registerViewProfiles() {
	$('.filter-profile .filter-profile-name').off('click').on('click', function() {
		$.ajax({
			url: site_url + 'filter/viewprofile/' + $(this).data('profileid'),
			success: function(data) {
				$('#modalViewProfile').modal().html(data).find('[data-toggle="popover"]').popover();
			}
		});
	});
	$('.filter-profile .selected-profile').off('click').on('click', function() {
		$.ajax({
			url: site_url + 'filter/viewprofile/' + $(this).data('profileid'),
			success: function(data) {
				$('#modalViewProfile').modal().html(data).find('[data-toggle="popover"]').popover();
			}
		});
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