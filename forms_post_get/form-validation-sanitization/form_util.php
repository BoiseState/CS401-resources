
<?php

function strip_contiguous_slashes($string)
{
    $string = implode("", explode("\\", $string));
    return stripslashes(trim($string));
}

function cleanup_input($string)
{
	$string = trim($string);			// Strip unnecessary characters (extra space, newline, tab)
	//$string = stripslashes($string); 		// Strip backslashes (\)
	$string = strip_contiguous_slashes($string); 	// Strip multiple contiguous backslashes (\\\\...)
	$string = htmlspecialchars($string); 		// Convert special characters to HTML entities
	return $string;
}

/**
	Function: Validate Name
	Description: Determines if only letters and white space are
	used in the name and returns a boolean value.
*/
function validate_name($name)
{
	$regex_pattern = '/^[a-zA-Z ]*$/';
	return preg_match($regex_pattern, $name);
}

/**
	Function: Validate Middle Initial
	Description: Determines if only a single letter is used in the
	initial and returns a boolean value.
*/
function validate_middle_initial($middle_initial)
{
	$regex_pattern = '/^[a-zA-Z]$/';
	return preg_match($regex_pattern, $middle_initial);
}


/**
	Function: Validate Email
	Description: Determines if the email address is well-formed and
	returns a boolean value.
*/
function validate_email($email)
{
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
	Function: Validate (Website) URL
	Description: Determines if the URL address syntax is valid and
	returns a boolean value.
	Note: Regex pattern retrieved from https://mathiasbynens.be/demo/url-regex.
*/
function validate_url($url)
{
	//$regex_pattern = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
	/** Note: With this regex, the URL must begin with 'http' or 'https' (not just 'www') */
	$regex_pattern = '_^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3})'.
			 '{3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])'.
			 '(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}'.
			 '(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}'.
			 '-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a'.
			 '-z\x{00a1}-\x{ffff}]{2,})))(?::\d{2,5})?(?:/[^\s]*)?$_iuS';
	return preg_match($regex_pattern, $url);
}

?>
