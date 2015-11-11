$(document).ready(function(){

	// The focus event occurs when an element gets selected by a mouse (or by tab-navigating to it)
	// This function will execute when the focus event occurs
    $("input").focus(function() {
		clearError($(this));
		$(this).toggleClass('focus');
	});

	// The blur event occurs when the element loses focus
    $("input").blur(function() {
		validateField($(this));
		$(this).toggleClass('focus');
	});

	// This submit event occurs when the submit input type is clicked in the form. You
	// still want to submit your form to your php handler, but if you want to prevent it
	// from submitting if invalid fields, you can use preventDefault() function.
	$("form").submit(function(e){
		var menuname = $("#menuname");
		if(validateField(menuname)) {
			addMenuItem(menuname.val());
			e.preventDefault();
		} else {
			e.preventDefault();
		}
	});

	function addMenuItem(name) {
		var item = $('<li><a href="" class="menu">' + name + '</a>' +
					 '<ul style="display:none;"><li>Item 1</li><li>Item 2</li></ul></li>');
		$("ul.menu").append(item);
	}

	function validateField(field) {
		var errors = [];
		errors["menuname"] = "Menu name is required";

		var name = field.attr("name");
		var value = field.val();
		if(value === "") {
			setError(field, errors[name]);
			return false;
		} else {
			return true;
		}
	}

	function setError(field, error) {
		field.next().text(error);
		field.addClass("error");
	}

	function clearError(field) {
		field.next().text("");
		field.removeClass("error");
	}
});


