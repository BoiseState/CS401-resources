$(document).ready(function() {

	// Load all comments via ajax callback.
	$("#comments").ready( function() {
		$.ajax({
			type: "GET",
			url: "api/comment.php",
			data: {},
			dataType: "json",
			success: function(response) {
				console.log("GET response " + response);
				console.log(response);
				var tableBody = $("#comments tbody");
				if(response.status == "ERROR") {
					tableBody.prepend($("<tr><td>" + response.errorMessage + "</td><td></td></tr>"));
				} else {
					var comments = response.comments;
					for(var i = 0; i < comments.length; i++)
					{
						var comment = comments[i];
						var commentTd = "<td>" + comment.comment + "</td>";
						var createdTd = "<td>" + comment.created + "</td>";
						$("#comments tbody").prepend($("<tr>" + commentTd + createdTd + "</tr>"));
					}
				}
			},
			error: function () {
				$("#commentsError").text("Failed to load comments.");
			}
		}); // end ajax
	});

	// Validate and submit form data via ajax request. 
	$("#comment-form").validate({
		submitHandler: function() {
			var data = $("#comment-form").serialize();
			$.ajax({
				type: "POST",
				url: "api/comment.php",
				data: data,
				dataType: "json",
				success: function(response) {
					console.log(response);
					if(response.status == "ERROR") {
						$("#commentsError").text(response.errorMessage);
					}
					else if(response.status == "REQUEST_DENIED") {
						$("#ageError").text(response.errorMessage);
						$("#age").addClass("error");
					} else {
						var comment = $("#comment").val();

						// prepend the comment so it shows immediately with no page refresh.
						$("#comments tbody").prepend($("<tr><td>" + comment + "</td><td>Just now</td></tr>"));

						// clear previous form values.
						$("#comment-form").find("input").val("");

						// clear any previous errors.
						$("#ageError").text("");
						$("#age").removeClass("error");
					}
				},
				error: function () {
					$("#commentsError").text("Failed to save comment");
				}
			}); // end ajax
		}
	}); // end validate
});
