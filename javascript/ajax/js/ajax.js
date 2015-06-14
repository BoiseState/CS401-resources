$(document).ready(function() {
	$("#form").submit(function() {
		var values = $("form").serialize();
		var comment = $("#comment").val();
		console.log(values);
		$.ajax({
			type: "POST",
			url: "handlerAjax.php",
			data: values,
			success: function() {
				$("#comments tbody").prepend("<tr><td>" +
						comment + "</td><td>Just now</td></tr>");
				$("#comment").val("");
				$("#email").val("");
				$("#age").val("");
			},
			error: function () {
				alert("FAILURE");
			}
		});
		return false;
	});
});
