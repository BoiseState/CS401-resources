<html>
<head>
<title>PHP Example: Filter: URL Santization and Validation</title>
</head>
<body>

<!-- Show the form -->
<form method="post" action="" >
  <div>
	Enter URL to sanitize and validate: <input type="text" name="data">
	<input type="submit">
  </div>
  <p><small>*Try entering <?= htmlspecialchars("<strong>http://www.google.com</strong>"); ?></small></p>
</form>

<hr>
<h2>Validation Result: </h2>

<?php
$data = "http://www.google.com";
$result = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data = $_POST['data'];
	$result = "The entered data \"$data\" ";

  # First, make sure the user entered something.
  if(empty($data)) {
    $result .= "is a required field.";
  } else {
    # It it's not empty, sanitize the data for HTML output.
    $data = htmlspecialchars($data);
	  $result .= " has been sanitized to become \"$data\", which ";

	  # Determine if the variable data is an IP address and output the result */
	  if(!filter_var($data, FILTER_VALIDATE_URL) === false) {
		  $result .= "is a valid URL!";
    } else {
		  $result .= "is NOT a valid URL!";
    }
  }
  # Print the validation results */
	echo "$result";
}
?>
</body>
</html
