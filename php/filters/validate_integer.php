

<html>
<head>
<title>PHP Example: Filter: Integer Validation</title>

</head>
<body>

<?php
$data = 0;
$result = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data = $_POST['data'];

	/* Determine if the variable data is an integer and output the result */
	/* Note: We also have to handle the special case if the data = 0 */
	if((filter_var($data, FILTER_VALIDATE_INT) === 0) || !filter_var($data, FILTER_VALIDATE_INT) === false)
	{
		$result = "The data \"$data\" is a valid integer!<br>";
	}
	else
	{
		$result = "The data \"$data\" is NOT a valid integer!<br>";
	}
	//echo "filter_var output: " . filter_var($data, FILTER_VALIDATE_INT) . "<br>";
}

?>

<!-- Show the form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
	Enter integer to validate: <input type="text" name="data">
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
