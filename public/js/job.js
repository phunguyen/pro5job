function job_registerEvents() {
	job_registerSelectCat();
	job_registerSelectAsk();
	job_registerRemoveSelectedAsk();

	//
	$('.job-cat:first').trigger('click');
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
	$('.job-ask').on('click', function() {
		var ask_id = $(this).closest('.job-ask').data('ask-id');
		$('#selected_ask_' + ask_id).show();
		job_updateSelectedAsksField(ask_id, 'add');

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
		job_updateSelectedAsksField(ask_id, 'remove');
		$(this).closest('.selected-ask').hide();
	});
}

function job_updateSelectedAsksField(ask_id, mode) {
	ask_id = ask_id.toString();
	var selected_asks = $('#selected_asks').val();
	var aSelectedAsks = selected_asks.split(';');
	var pos = aSelectedAsks.indexOf(ask_id);
	if(mode == 'remove') {
		if(pos > -1) {
			aSelectedAsks.splice(pos, 1);
		}
	} else {
		if(pos < 0) {
			aSelectedAsks.push(ask_id);
		}
	}
	$('#selected_asks').val(aSelectedAsks.join(';'));
}

function job_editJob() {
	window.location = site_url + 'job/edit/' + $('#list_jobs').val();
}