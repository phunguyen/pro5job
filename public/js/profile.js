function profile_registerEvents() {
	profile_registerSelectCat();
	profile_registerSelectAsk();
	profile_registerRemoveSelectedAsk();
	profile_registerAskRequire();
	profile_registerAddAsk();
	profile_registerProfileActions();

	// display first ASK Category
	$('.profile-cat:first').trigger('click');
}

function profile_registerAskRequire() {
	$('.profile-ask-require').on('click', function() {
		if($(this).data('require') == 1) {
			$(this).data('require', 0);
			$(this).css('color', 'gray').css('text-decoration', 'line-through');
		} else {
			$(this).data('require', 1);
			$(this).css('color', '#ff0000').css('text-decoration', 'none');
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
	$('.profile-ask .glyphicon').on('click', function() {console.log('aaa');
		var ask_id = $(this).closest('.profile-ask').data('ask-id');
		var ask_require = $(this).closest('.profile-ask').find('.profile-ask-require').data('require');
		$('#selected_ask_' + ask_id).show();
		if(ask_require == 1) {
			$('#selected_ask_' + ask_id).find('.selected-ask-require').css('text-decoration', 'none').css('color', '#ff0000');
		} else {
			$('#selected_ask_' + ask_id).find('.selected-ask-require').css('text-decoration', 'line-through').css('color', 'gray');
		}
		var ask_star = $(this).data('rating');
		profile_updateSelectedAsksField(ask_id, ask_require, ask_star, 'add');
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
		profile_updateSelectedAsksField(ask_id, '', '', 'remove');
		$(this).closest('.selected-ask').hide();
	});
}

function profile_updateSelectedAsksField(ask_id, ask_require, ask_star, mode) {
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

function profile_displaySelectedAsk(ask_id, require, rating) {
	if(require == 0) $('#ask_' + ask_id).find('.profile-ask-require').trigger('click');
	$('#ask_' + ask_id).find('span[data-rating=' + rating + ']').trigger('click');
}

function profile_registerAddAsk() {
	$('.btn-add-ask').on('click', function() {
		var new_ask_name = $('#new_ask_name').val();
		var new_ask_desc = $('#new_ask_desc').val();
		var selected_cat_id = $('#selected_cat_id').val();
		var dataJson = {'ask_name' : new_ask_name, 'ask_desc' : new_ask_desc, 'selected_cat_id' : selected_cat_id};
		$.ajax({
			url : site_url + 'profile/add_ask',
			data : dataJson,
			success : function(new_ask_id) {
				var newAsk = '<li class="profile-ask" data-ask-id="' + new_ask_id + '" id="ask_' + new_ask_id + '"><h5><c class="profile-ask-require" data-require="1">Bắt buộc</c> | <font color="#ffd700" class="star-rating"><span class="glyphicon glyphicon-star-empty" data-rating="1"></span> <span class="glyphicon glyphicon-star-empty" data-rating="2"></span> <span class="glyphicon glyphicon-star-empty" data-rating="3"></span> <span class="glyphicon glyphicon-star-empty" data-rating="4"></span> <span class="glyphicon glyphicon-star-empty" data-rating="5"></span></font> | <a title="" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="' + new_ask_desc + '" data-original-title="' + new_ask_name + '">' + new_ask_name + '</a></h5></li>';
				var newSelectedAsk = '<li id="selected_ask_' + new_ask_id + '" style="display: none;" class="selected-ask" data-ask-id="' + new_ask_id + '"><h5><a class="remove-selected-ask">X</a> |<c class="selected-ask-require"> Bắt buộc</c> | <font color="#ffd700"><span class="star-rating"><span class="glyphicon glyphicon-star-empty" data-rating="1"></span> <span class="glyphicon glyphicon-star-empty" data-rating="2"></span> <span class="glyphicon glyphicon-star-empty" data-rating="3"></span> <span class="glyphicon glyphicon-star-empty" data-rating="4"></span> <span class="glyphicon glyphicon-star-empty" data-rating="5"></span><input type="hidden" name="whatever" class="rating-value" value="3"></span></font> | <a title="' + new_ask_name + '" tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="' + new_ask_desc + '">' + new_ask_name + '</a></h5></li>';
				$('.profile-cat-asks[data-cat-id=' + selected_cat_id + ']').find('ul').append(newAsk).find('[data-toggle="popover"]').popover();
				$('#selected_cat_' + selected_cat_id).next('ul').find('ul').append(newSelectedAsk).find('[data-toggle="popover"]').popover();
				$('#new_ask_name').val('');
				$('#new_ask_desc').val('');
				$('.profile-ask .glyphicon').off('click');
				profile_registerSelectAsk();
				$('.profile-ask-require').off('click');
				profile_registerAskRequire();
				$('.remove-selected-ask').off('click');
				profile_registerRemoveSelectedAsk();
			}
		});
	});
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