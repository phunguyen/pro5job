function setting_registerEvents() {
	$('#sub_value').on('change', function() {
		$('.sub_value_list').hide();
		$('#' + $(this).val() + '_list').show();
	}).val('location');

	$('.edit-value').on('click', function() {
		var id = $(this).closest('td').data('id');
		var sub_value_list = $(this).closest('.sub_value_list');
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