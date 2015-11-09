/**
 * This is the JavaScript companion to "required_fields3.php",
 * which contains the function for the form's event handler.
 */

window.onload = function() {
	/**
	 * Function: Validate Form
	 * Description: Makes sure that all of the required fields exist, and furthermore makes sure
	 * that each value complies with the specified format. If errors are found, a report is generated
	 * and displayed via the alert pop-up.
	 */
	document.getElementById("coolform").onsubmit = function(e)
	{
		var error_message = "";
		var form_ok = true;

		/* This is one method to access the form's posted values */
		var name = document.forms["coolform"]["name"].value;
		var email = document.forms["coolform"]["email"].value;
		var url = document.forms["coolform"]["url"].value;
		var number = document.forms["coolform"]["number"].value;

		/* Validate Name Field */
		if(name == null || name == "") {
			error_message += "Name is a required field!\n";
			form_ok = false;
		} else if(validate_name(name) === false) {
			error_message += "Name is invalid! (It may only contain letters and white space!)\n";
			form_ok = false;
		}

		/* Validate Email Field */
		if(email == null || email == "") {
			error_message += "Email is a required field!\n";
			form_ok = false;
		} else if(!validate_email(email)) {
			error_message += "Email is invalid!\n";
			form_ok = false;
		}

		/* Validate Website URL Field */
		if(url == null || url == "") {
			error_message += "Website URL is a required field!\n";
			form_ok = false;
		} else if(validate_url(url) === false) {
			error_message += "Website URL is invalid!\n";
			form_ok = false;
		}

		/* Validate Integer Field */
		if(number == null) {
			error_message += "Favorite integer in [0, 255] is a required field!\n";
			form_ok = false;
		} else if(!validate_integer_range(number)) {
			error_message += "Favorite integer is invalid!\n";
			form_ok = false;
		}

		/* If input error found, print via alert box */
		if(!form_ok) {
			e.preventDefault(); // Prevents form from submitting to server.
			window.alert("Form Input Error(s): \n" + error_message);
		}
		else {
			window.alert("Form input is valid!");
		}
	}
}

/**
 * Function: Validate Name
 * Description: Uses a regular expression to make sure the name only contains letters
 * and whitespace.
 */
function validate_name(name)
{
	var regex_pattern = new RegExp(/^[a-zA-Z\s]*$/);
	return regex_pattern.test(name);
}

/**
 * Function: Validate Email
 * Description: Uses a regular expression to make sure the email is legit.
 */
function validate_email(email)
{
	var regex_pattern = new RegExp(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/);
	return regex_pattern.test(email);
}

/**
 * Function: Validate URL
 * Description: Uses a regular expression to make sure the website's URL is legit.
 */
function validate_url(url)
{
	var regex_pattern = new RegExp(/^(?:(?:https?|ftp):\/\/)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]+-?)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/[^\s]*)?$/i);

	return regex_pattern.test(url);
}

/**
 * Function: Validate Integer Range
 * Description: Makes sure that the number is a finite integer within a specified range.
 */
function validate_integer_range(number)
{
	return !isNaN(parseInt(number)) && isFinite(number) && (number >= 0) && (number <= 255);

}





