$(document).ready(function() {
	$(":input").inputmask();
	or;
	Inputmask().mask(document.querySelectorAll("input"));
});

// DataTables
$(document).ready(function() {
	$("#studentiTable").DataTable();
});
$(document).ready(function() {
	$("#zamestnavateliaTable").DataTable();
});

$("#deleteModal").on("show.bs.modal", function(e) {
	$(this)
		.find(".btn-ok")
		.attr("href", $(e.relatedTarget).data("href"));
});
