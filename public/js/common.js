function confirmDelete(url) {
	if(confirm("Do you want to delete this?")) {
		window.location = url;
	}

	return false;
}