

<html>
<head>
<title>PHP Example: Filter: IP Address Validation</title>
</head>
<body>


<?php
$data = "127.0.0.1";
$result = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data = $_POST['data'];

	/* Determine if the variable data is an IP address and output the result */
	if(!filter_var($data, FILTER_VALIDATE_IP) === false)
	{
		$result = "The data \"$data\" is a valid IP address!<br>";
	}
	else
	{
		$result = "The data \"$data\" is NOT a valid IP address!<br>";
	}
	//echo "filter_var output: " . filter_var($data, FILTER_VALIDATE_INT) . "<br>";
}

?>

<!-- Show the form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
	Enter IP address to validate: <input type="text" name="data">
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
