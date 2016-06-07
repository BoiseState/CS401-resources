<html>
<head>
<title>PHP Example: Filter: Regular Expression Validation</title>
</head>
<body>

<?php
$data = "";
$regex_pattern = "/^B(.*)/";
$result = "";
?>

<!-- Show the form -->
<form method="post" action="" >
  Given the Perl-compatible regular expression
  <input type="text" name="regex_pattern" value="<?= $regex_pattern; ?>">,
	enter string to validate: <input type="text" name="data">
	<input type="submit">
</form>

<hr>
<h2>Validation Result:</h2>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	/** Assign range and integer values from post */
  if(isset($_POST['regex_pattern'])) {
    $regex_pattern = $_POST['regex_pattern'];
  }
	$data = $_POST['data'];
	$result = "The entered string \"$data\" ";

	# Determine if the variable data is a (Perl-compatible) regular
	# expression and output the result
  if(!filter_var($data, FILTER_VALIDATE_REGEXP, array("options" =>
    array("regexp"=>$regex_pattern))) === false) {
		$result .= "matches the regular expression \"$regex_pattern\"!";
	}	else {
		$result .= "does NOT match the regular expression \"$regex_pattern\"!";
	}
  echo "$result";
}
?>
</body>
</html
