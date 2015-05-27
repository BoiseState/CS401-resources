
<html>
<head>
<title>PHP Example: Filter: Integer Validation Within a Range</title>
</head>
<body>

<?php
$integer = 20;
$min = 1;
$max = 255;
$result = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	/** Assign range and integer values from post */
	if(isset($_POST['min'])) { $min = $_POST['min']; }
	if(isset($_POST['max'])) { $max = $_POST['max']; }
	$integer = $_POST['integer'];
	$result = "The entered integer \"$integer\" ";
	
	/* Determine if the integer is within the specified range and store the result */
	if(!filter_var($integer, FILTER_VALIDATE_INT, array("options" => 
		array("min_range"=>$min, "max_range"=>$max))) === false)
	{
		$result .= "is within the specified range [$min, $max]!<br>";
	}
	else
	{
		$result .= "is NOT within the specified range [$min, $max]!<br>";
	}
}
?>

<!-- Show the form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
	Given the range with minimum <input type="text" name="min" value="<?php echo $min; ?>"> 
	and maximum <input type="text" name="max" value="<?php echo $max; ?>">,
	enter integer to validate: <input type="text" name="integer">
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
