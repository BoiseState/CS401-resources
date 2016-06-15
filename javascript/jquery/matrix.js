$(document).ready(function() {
	//Simple mouseenter handler that accesses the elements via table element IDs
	// $('td').on('mouseenter', function() {
		// alert("You entered the matrix at element " + $(this).text() + "!");
	// });

	// Or could use hover
	$("td").hover(function(){
		$(this).toggleClass("redpill");
		$(this).hide("slow", function() {
			$(this).show("slow");
		});
	});

	$("#title").draggable();
	$("#matrix").draggable();
	$("#matrix-list").sortable();
});

