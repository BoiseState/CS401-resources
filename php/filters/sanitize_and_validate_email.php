

<html>
<head>
<title>PHP Example: Filter: Email Address Santization and Validation</title>
</head>
<body>

<?php
$data = "goof.ball@example.com";
$result = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data = $_POST['data'];
  $result = "The entered data \"$data\"";

	$data = filter_var($data, FILTER_SANITIZE_STRING);
	$data = filter_var($data, FILTER_SANITIZE_EMAIL);
	$result .= " has been sanitized to become \"$data\", which ";

	/* Determine if the variable data is an IP address and output the result */
	if(!filter_var($data, FILTER_VALIDATE_EMAIL) === false)
	{
		$result .= "is a valid email address!<br>";
	}
	else
	{
		$result .= "is NOT a valid email address!<br>";
	}
}
?>

<!-- Show the form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
	Enter email address to sanitize and validate: <input type="text" name="data">
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
