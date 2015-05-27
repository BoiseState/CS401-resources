
<html>
<head>
<title>PHP Example: Error Handling: Trigger a Custom Handler</title>
<style> .error { color:red; } </style>
</head>
<body>

<?php
/**
	Function: Custom Error Function
	Description: Serves as a simple error handling function. When triggered,
	it prints the error and then halts the script.
*/
function custom_error_function($error_number, $error_message)
{
	echo "<span class=\"error\"><b>Error</b> [$error_number]: $error_message <br>";
	echo "Terminating execution of script... </span>";
	die();
}

/**
	Function: My Is Integer
	Description: Determines if the given data string is an integer. Returns a boolean.
*/
function my_is_integer($data)
{
	return preg_match("/^-?[1-9][0-9]*$/D", $data);
	// return(ctype_digit(strval($data))); // only works for nonnegative integers
}

/* Set error handler */
set_error_handler("custom_error_function");

/* Initialize variables */
$integer = 0;
$result = "";
$found_error = false;

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$integer = $_POST['integer'];
	
	/* Search for errors to construct the error message */
	if(my_is_integer($integer) == false)
	{
		$result = "The entered number \"$integer\" is invalid because it is not an integer!<br>";
		$found_error = true;
	}
	if($integer < 0)
	{
		$result .= "The entered number \"$integer\" is invalid because the smallest it can be is 0!<br>";
		$found_error = true;
	}
	if(($integer % 2) != 0)
	{
		$result .= "The entered number \"$integer\" is invalid because it must be even!<br>";
		$found_error = true;
	}

	/** If error found, trigger it. Otherwise, prompt for another attempt */
	if($found_error) { trigger_error($result, E_USER_WARNING); }
	else
	{
		$result = "The entered number \"$integer\" is valid, so no error found! Try again!<br>";
		echo $result;
	}
}
?>

<!-- Show the form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
	Enter a nonnegative even integer: <input type="text" name="integer">
	<input type="submit">
</form>

</body>
</html
