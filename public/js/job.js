function job_registerEvents() {
	job_registerSelectCat();
	job_registerSelectAsk();
	job_registerRemoveSelectedAsk();
	job_registerAskRequire();
	job_registerAddAsk();
	job_registerJobActions();

	// display first ASK Category
	$('.job-cat:first').trigger('click');
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
	if(mode == 'remove') {
		if(pos > -1) {
			aSelectedAsks.splice(pos, 1);
			aSelectedAsksRequire.splice(pos, 1);
			aSelectedAsksRating.splice(pos, 1);
		}
	} else {
		if(pos < 0) {
			aSelectedAsks.push(ask_id);
			aSelectedAsksRequire.push(ask_require);
			aSelectedAsksRating.push(ask_star);
		}
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
		var newAsk = '<li class="job-ask" data-ask-id="8" id="ask_8"><h5><c class="job-ask-require" data-require="1">Bắt buộc</c> | <font color="#ffd700" class="star-rating"><span class="glyphicon glyphicon-star-empty" data-rating="1"></span> <span class="glyphicon glyphicon-star-empty" data-rating="2"></span> <span class="glyphicon glyphicon-star-empty" data-rating="3"></span> <span class="glyphicon glyphicon-star-empty" data-rating="4"></span> <span class="glyphicon glyphicon-star-empty" data-rating="5"></span></font> | <a title="" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="l' + new_ask_desc + '" data-original-title="' + new_ask_name + '">' + new_ask_name + '</a></h5></li>';
		var dataJson = {'ask_name' : new_ask_name, 'ask_desc' : new_ask_desc, 'selected_cat_id' : selected_cat_id};
		$.ajax({
			url : site_url + 'job/add_ask',
			data : dataJson,
			success : function() {
				$('.job-cat-asks[data-cat-id=' + selected_cat_id + ']').find('ul').append(newAsk).find('[data-toggle="popover"]').popover();
				$('#new_ask_name').val('');
				$('#new_ask_desc').val('');
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