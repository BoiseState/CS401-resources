<html>
<head>
<title>PHP Example: Filter: Integer Validation Within a Range</title>
</head>
<body>
<?php
$min = 1;
$max = 255;
?>

<!-- Show the form -->
<form method="post" action="" >
  <div>
	Given the range with minimum <input type="text" name="min" value="<?= $min; ?>">
	and maximum <input type="text" name="max" value="<?= $max; ?>">,
	enter integer to validate: <input type="text" name="integer">
  <input type="submit">
  </div>
</form>

<hr>
<h2>Validation Result:</h2>

<?php
$integer = 20;
$result = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	/** Assign range and integer values from post */
	if(isset($_POST['min'])) { $min = $_POST['min']; }
	if(isset($_POST['max'])) { $max = $_POST['max']; }
	$integer = $_POST['integer'];
	$result = "The entered integer \"$integer\" ";

  if(strlen($integer) == 0) {
   $result .= "is a required field.";
  } else {
	  # Determine if the integer is within the specified range and store the result
	  if(!filter_var($integer, FILTER_VALIDATE_INT, array("options" =>
		  array("min_range"=>$min, "max_range"=>$max))) === false) {
		  $result .= "is within the specified range [$min, $max]!";
	  } else {
		  $result .= "is NOT within the specified range [$min, $max]!";
    }
  }
  # Print the validation results
	echo "$result";
}
?>
</body>
</html
