$(function() {
	// submit feedback
	$('.btn-feedback').on('click', function() {
		var feedback_content = $('#feedback_content').val();
		$.ajax({
			method: "POST",
			url: site_url + 'feedback/create',
			data: {feedback_content: feedback_content},
			success: function() {
				$('#feedback_content').val('');
				$('#feedback_modal').modal('hide');
			}
		});
	});
});

function confirmDelete(url) {
	if(confirm("Are you sure you want to delete?")) {
		window.location = url;
	}

	return false;
}