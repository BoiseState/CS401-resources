$(document).ready(function() {
	$("#form").submit(function() {
		var values = $("form").serialize(); // takes all form values and serializes
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
					$("#age").toggleClass("error");
				}
				else {
					// prepend the comment so it shows immediately with no
					// page refresh.
					$("#comments tbody").prepend("<tr><td>" +
						comment + "</td><td>Just now</td></tr>");

					// clear previous form values.
					$("#comment").val("");
					$("#email").val("");
					$("#age").val("");

					// clear any previous errors.
					$("#ageError").text("");
					$("#age").toggleClass("error");
				}
			},
			error: function () {
				alert("FAILURE");
			}
		});
		return false;
	});
});
