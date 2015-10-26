
<html>
<head>
<title>PHP Example: Filter: URL Santization and Validation</title>
</head>
<body>

<?php
$data = "http://www.google.com";
$result = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data = $_POST['data'];
	$result = "The entered data \"$data\"";
	$data = filter_var($data, FILTER_SANITIZE_URL);
	$result .= " has been sanitized to become \"$data\", which ";
	
	/* Determine if the variable data is an IP address and output the result */
	if(!filter_var($data, FILTER_VALIDATE_URL) === false)
	{
		$result .= "is a valid URL!<br>";
	}
	else
	{
		$result .= "is NOT a valid URL!<br>";
	}
}
?>

<!-- Show the form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
	Enter URL to sanitize and validate: <input type="text" name="data">
	<input type="submit">
</form>

<?php
/* Print the validation results */
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	echo "<br><br>Validation Result: $result";
}
?>

</body>
</html
