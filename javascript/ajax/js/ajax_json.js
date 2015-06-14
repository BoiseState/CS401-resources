$(document).ready(function() {
	// Action listener for producing name hint
	$('#name').keyup(function(e) {
		var code = e.which;
		if(code != 16) { // ignore shift
			showHint($(this).val());
		}
	});

	// Form submission using Ajax.
	$("#form").submit(function() {
		var values = $("form").serialize();
		var comment = $("#comment").val();
		console.log(values);
		$.ajax({
			type: "POST",
			url: "handler_ajax.php",
			data: values,
			dataType: "json",
			success: function(response) {
				if(response.status == 'success') {
					$("#comments").find("tbody").prepend(
							"<tr><td>" + comment + "</td><td>Just now</td></tr>");
					$("#comment").val("");
					$("#email").val("");
					$("#age").val("");
				} else {
					$('form').append("<span>" + response.errorMessage + "</span>");
					$("#comment").val(response.comment);
					$("#email").val(response.email);
					$("#age").val(response.age);
				}
			},
			error: function (request, status, errorThrown) {
				alert("FAILURE");
			}
		});
		return false;
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
			url: "form_hint.php",
			data: {'q' : str },
			dataType: "json",
			success: function(response) {
				$("#nameHint").text(response.hints); // could make a dropdown.
			},
			error: function (request, status, errorThrown) {
				$("#nameHint").text("");
			}
		});
	}
}

