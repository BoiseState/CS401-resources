$(document).ready(function() {
	$("#form").submit(function() {
		var values = $("form").serialize();
		var comment = $("#comment").val();
		console.log(values);
		$.ajax({
			type: "POST",
			url: "handlerAjax.php",
			data: values,
			dataType: "json",
			success: function(response) {
				if(response.status == 'success') {
					$("#comments tbody").prepend("<tr><td>" +
						comment + "</td><td>Just now</td></tr>");
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
