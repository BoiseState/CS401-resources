<html>
<head>
<title>PHP Example: Filter: IP Address Validation</title>
</head>
<body>

<!-- Show the form -->
<form method="post" action="" >
  <div>
	Enter IP address to validate: <input type="text" name="data">
  <input type="submit">
  </div>
  <p><small>*Try entering <?= htmlspecialchars("<strong>127.0.0.1</strong>"); ?></small></p>
</form>

<?php
$data = "127.0.0.1";
$result = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$data = $_POST['data'];
  # First, make sure the user entered something.
  if(empty($data)) {
    $result .= "is a required field.";
  } else {
    # Determine if the variable data is an IP address and output the result
	  if(!filter_var($data, FILTER_VALIDATE_IP) === false) {
		  $result = "The data \"$data\" is a valid IP address!<br>";
	  } else {
		  $result = "The data \"$data\" is NOT a valid IP address!<br>";
    }
  }

  #!! NOTE: This does not sanitize the user input.
	echo "$result";
}

?>
</body>
</html
