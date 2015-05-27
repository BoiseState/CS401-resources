

<html>
<head>
<title>PHP Example: Filter: Regular Expression Validation</title>

</head>
<body>


<?php
$data = "";
$regex_pattern = "/^B(.*)/";
$result = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	/** Assign range and integer values from post */
	if(isset($_POST['regex_pattern'])) { $regex_pattern = $_POST['regex_pattern']; }
	$data = $_POST['data'];
	$result = "The entered string \"$data\" ";
	
	/* Determine if the variable data is a (Perl-compatible) regular 
	expression and output the result */
	if(!filter_var($data, FILTER_VALIDATE_REGEXP, array("options" => array("regexp"=>$regex_pattern))) === false)
	{
		$result .= "matches the regular expression \"$regex_pattern\"!<br>";
	}
	else
	{
		$result .= "does NOT matche the regular expression \"$regex_pattern\"!<br>";
	}
}
?>

<!-- Show the form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
	Given the Perl-compatible regular expression <input type="text" name="min" value="<?php echo $regex_pattern; ?>">,
	enter string to validate: <input type="text" name="data">
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
