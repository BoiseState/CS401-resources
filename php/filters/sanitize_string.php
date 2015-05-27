

<html>
<head>
<title>PHP Example: Filter: Sanitize a String</title>

<style>
.error { color:red; }
</style>

</head>
<body>


<?php
	$messy_string = "<h1>I'm the first messy string!</h1>";
	echo "Messy string: $messy_string <br>";
	
	/* Use filter_var() to remove all HTML tags from the messy string */
	$clean_string = filter_var($messy_string, FILTER_SANITIZE_STRING);
	echo "Clean string: $clean_string";
	echo "<br><br><br><br>";
	
	$messy_string2 = "<span class=\"error\">I'm the second messy string!</span>";
	echo "Messy string: $messy_string2 <br>";
	
	/* Use filter_var() to remove all HTML tags from the messy string */
	$clean_string2 = filter_var($messy_string2, FILTER_SANITIZE_STRING);
	echo "Clean string: $clean_string2";
	
?>

</table>


</body>
</html
