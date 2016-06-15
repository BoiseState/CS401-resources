$(document).ready(function() {
	$("#comment-form").validate({
		submitHandler: function() {
			submitForm();
		}
	});

	function submitForm() {
		var data = $("#comment-form").serialize();
		console.log(data);
		var request = $.ajax({
			type: "POST",
			url: "ajax-handler.php",
			data: data,
			dataType: "json"
		});

		request.done(function(response) {
			console.log(response.status);
			if(response.status == "error") {
				$("#ageError").text(response.errorMessage);
				$("#age").addClass("error");
			} else {
				var comment = $("#comment").val();
				// prepend the comment so it shows immediately with no page refresh.
				$("#comments tbody").prepend($("<tr><td>" +
					comment + "</td><td>Just now</td></tr>"));

				// clear previous form values.
				$("#comment-form").find("input").val("");

				// clear any previous errors.
				$("#ageError").text("");
				$("#age").removeClass("error");
			}
		});
		request.fail(function () {
			alert("FAILURE");
		});
		return false;
	}
});
