$(document).ready(function() {
	// Action listener for producing name hint
	$('#name').keyup(function(e) { // listen for key up events in name field.
		var code = e.which;
		if(code != 16) { // ignore shift key
			showHint($(this).val());
		}
	});
});

// Uses Ajax to get hint for current string value and displays the
// hint in the nameHint span.
function showHint(str) {
		if (str.length == 0) {
				$("#nameHint").text("");
				return;
		} else {
			$.ajax({
				type: "GET",
				url: "form-hint.php",
				data: {'q' : str },
				dataType: "json",
				success: function(response) {// response is json.
					$("#nameHint").text(response.hints); // could make a dropdown.
				},
				error: function (request, status, errorThrown) {
					$("#nameHint").text("");
				}
			});
		}
}
