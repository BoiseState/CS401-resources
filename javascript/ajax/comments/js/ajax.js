$(document).ready(function() {
	$("#form").submit(function() {
		var values = $("form").serialize(); // takes all form values and serializes:w
		var comment = $("#comment").val();
		console.log(values);
		$.ajax({
			type: "POST",
			url: "handler_ajax.php",
			data: values,
			dataType: "json",
			success: function(response) {
				console.log(response); // THERE IS A BUG HERE!
				console.log(response.status);
				if(response.status == "error") {
					$("#ageError").text(response.errorMessage);
				}
				else {
					$("#comments tbody").prepend("<tr><td>" +
						comment + "</td><td>Just now</td></tr>");
					$("#comment").val("");
					$("#email").val("");
					$("#age").val("");
				}
			},
			error: function () {
				alert("FAILURE");
			}
		});
		return false;
	});
});
