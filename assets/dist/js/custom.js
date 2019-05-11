$(document).ready(function() {
	$(":input").inputmask();
	or;
	Inputmask().mask(document.querySelectorAll("input"));
});

// DataTables
$(document).ready(function() {
	$("#studentiTable").DataTable();
	$("#zamestnavateliaTable").DataTable();
	$("#zrucnostiTable").DataTable();
	$("#brigadyTable").DataTable();
});

$("#deleteModal").on("show.bs.modal", function(e) {
	$(this)
		.find(".btn-ok")
		.attr("href", $(e.relatedTarget).data("href"));
});
