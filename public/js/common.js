function confirmDelete(url) {
	if(confirm("Are you sure you want to delete?")) {
		window.location = url;
	}

	return false;
}