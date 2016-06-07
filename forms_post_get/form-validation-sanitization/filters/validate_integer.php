<html>
<head>
<title>PHP Example: Filter: Integer Validation</title>
</head>
<body>

<!-- Show the form -->
<form method="post" action="" >
  <div>
	Enter integer to validate: <input type="text" name="data">
  <input type="submit">
  </div>
</form>

<hr>
<h2>Validation Result:</h2>
<?php
$data = 0;
$result = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data = $_POST['data'];
  $result = "The entered data \"$data\" ";

  if(strlen($data) == 0) {
   $result .= "is a required field.";
  } else {
    # Determine if the variable data is an integer and output the result
    if(filter_var($data, FILTER_VALIDATE_INT) === false) {
      $result .= "is NOT a valid integer!";
    } else {
      $result .= "is a valid integer!";
    }
  }
	echo "$result";
}

?>

</body>
</html
