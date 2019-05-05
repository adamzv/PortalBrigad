$(document).ready(function() {
	$(":input").inputmask();
	or;
	Inputmask().mask(document.querySelectorAll("input"));
});

$(document).ready(function() {
	$("#studentiTable").DataTable();
	console.log("funguje");
});

$("#deleteModal").on("show.bs.modal", function(e) {
	$(this)
		.find(".btn-ok")
		.attr("href", $(e.relatedTarget).data("href"));
});
