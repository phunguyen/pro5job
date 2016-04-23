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