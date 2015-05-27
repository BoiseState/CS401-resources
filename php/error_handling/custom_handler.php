
<html>
<head>
<title>PHP Example: Error Handling: Define a Custom Handler</title>
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
	echo "<span class=\"error\"><b>Error</b> [$error_number]: $error_message! <br>";
	echo "Terminating execution of script... </span>";
	die();
}

/* Set error handler */
set_error_handler("custom_error_function");

/* Trigger an error by trying to print a variable that doesn't exist */
echo $i_dont_exist
?>

</body>
</html
