<html>
<head><title>PHP Example: Form Validation - Cleaning An Input String</title></head>
<body>

<?php

function strip_contiguous_slashes($string)
{
    $string=implode("",explode("\\",$string));
    return stripslashes(trim($string));
}

function cleanup_input($string)
{
	$string = trim($string);			// Strip unnecessary characters (extra space, newline, tab)
	// $string = stripslashes($string); 		// Strip backslashes (\)
	$string = strip_contiguous_slashes($string); 	// Strip multiple contiguous backslashes (\\\\...)
	$string = htmlspecialchars($string); 		// Convert special characters to HTML entities
	return $string;
}
?>

<form method="post" action="" >
  <div>
    <p>Enter a messy string with extra spaces, newlines, and/or backslashes:</p>
	  <textarea name="stringthing" rows="10" cols="30"></textarea>
    <p><input type="submit"></p>
  </div>
</form>

<?php
$messy_stringthing = $cleaned_stringthing = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	/** Get value of first name input field and print */
	$messy_stringthing = $_POST['stringthing'];
	$cleaned_stringthing = cleanup_input($messy_stringthing);
?>

  <p>The original messy string was: <pre><?= '"' . $messy_stringthing . '"'; ?></pre></p>
  <p>The new cleaned string is now: <pre><?= '"' . $cleaned_stringthing . '"'; ?></pre></p>

<?php
}
?>


</body>
</html>
