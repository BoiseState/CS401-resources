<html>
<head>
<title>PHP Example: Filter: Email Address Santization and Validation</title>
</head>
<body>

<!-- Show the form -->
<form method="post" action="" >
  <div>
  Enter email address to sanitize and validate: <input type="text" name="data">
  <input type="submit">
  </div>
  <p><small>*Try entering <?= htmlspecialchars("<h1>you@gmail.com</h1>"); ?></small></p>
</form>

<hr>
<h2>Validation Result: </h2>

<?php
$data = "goof.ball@example.com";
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

	  # Determine if the variable data is an email address and output the result
	  if(!filter_var($data, FILTER_VALIDATE_EMAIL) === false) {
		  $result .= "is a valid email address!";
	  } else {
		  $result .= "is NOT a valid email address!";
	  }
  }

  # Print the validation results
  echo "$result";
}
?>
</body>
</html
