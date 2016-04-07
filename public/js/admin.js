function setting_registerEvents() {
	$('#sub_value').on('change', function() {
		$('.sub_value_list').hide();
		$('#' + $(this).val() + '_list').show();
	}).val('location');
}