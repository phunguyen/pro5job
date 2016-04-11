function setting_registerEvents() {
	$('#sub_value').on('change', function() {
		$('.sub_value_list').hide();
		$('#' + $(this).val() + '_list').show();
	}).val('location');

	setting_registerAdd();
	setting_registerEdit();
	setting_registerSave();
	setting_registerDelete();
}

function setting_registerAdd() {
	$('.btn-add').on('click', function() {
		var sub_value_list = $(this).closest('.sub_value_list');
		var name = $(this).closest('.row').find('.name').val();
		var type = $('#sub_value').val();
		$(this).closest('.row').find('.name').val('');
		$.ajax({
			url: site_url + 'setting/create',
			data: {'type': type, 'name': name},
			success: function(id) {
				var new_value = '<tr><td data-id="' + id + '"><a href="#" class="edit-value">Sửa </a>| <a href="#" class="delete-value">Xóa</a></td><td id="sub_value_' + id +'">' + name + '</td></tr>';
				sub_value_list.find('tbody').append(new_value);
				$('.edit-value').off('click');
				setting_registerEdit();
				$('.delete-value').off('click');
				setting_registerDelete();
			}
		});
	});
}

function setting_registerEdit() {
	$('.edit-value').on('click', function() {
		var id = $(this).closest('td').data('id');
		var sub_value_list = $(this).closest('.sub_value_list');
		$('#sub_value_id').val(id);
		$.ajax({
			url: site_url + 'setting/edit/' + id,
			success: function(name) {
				sub_value_list.find('.name').val(name);
				sub_value_list.find('.btn-add').hide();
				sub_value_list.find('.btn-edit').show();
			}
		});
	});
}

function setting_registerSave() {
	$('.btn-edit').on('click', function() {
		var id = $('#sub_value_id').val();
		var name = $(this).closest('.row').find('.name').val();
		$(this).closest('.row').find('.name').val('');
		$(this).hide().prev().show();
		$.ajax({
			url: site_url + 'setting/edit/' + id,
			data: {'id': id, 'name': name},
			success: function() {
				$('#sub_value_' + id).html(name);
			}
		});
	});
}

function setting_registerDelete() {
	$('.delete-value').on('click', function() {
		var id = $(this).closest('td').data('id');
		$(this).closest('tr').remove();
		$.ajax({
			url: site_url + 'setting/delete/' + id,
			success: function() {
			}
		});
	});
}