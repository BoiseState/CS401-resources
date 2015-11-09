<html>
<head>
	<title>PHP + JavaScript Example: Form Validation With Required Fields </title>
	<script src="required_fields3.js" type="text/javascript"></script>
	<style> .error { color:red; } </style>
</head>
<body>

<?php
/** Define variables and set to empty values */
$Name = $Email = $URL = $Number = $Comments = "";
$Name_Error = $Email_Error = $URL_Error = $Number_Error = "";

/** If post requested, assign the posted input field values */
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$URL = $_POST['url'];
	$Number = $_POST['number'];
}
?>

<h1>The Invincible Form Validator With PHP and JavaScript</h1>

<!-- Print the form, in which all fields are required and will be validated -->
<form name="coolform" id="coolform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

	<!-- Name: Required, must only contain letters and whitespace. -->
	<p>Name: <input type="text" name="name" id="name" value="<?php echo $Name; ?>" />
	<span class="error">*</span></p>

	<!-- Email: Required, must contain a valid email address (with @ and .) -->
	<p>Email: <input type="text" name="email" id="email" value="<?php echo $Email; ?>" />
 	<span class="error">*</span></p>

	<!-- Website URL: Required, must contain a valid URL address -->
	<p>Website: <input type="text" name="url" id="url" value="<?php echo $URL; ?>" />
 	<span class="error">*</span></p>

	<!-- Favorite Integer: Required, must be an integer in the specified range -->
	<p>Favorite integer in the range [0, 255]: <input type="text" name="number" id="number" value="<?php echo $Number; ?>" />
	<span class="error">*</span></p>

	<p><input type="submit" name="submit" value="Submit"></p>

	<p><span class="error">*</span>Indicates a required field.</p>
</form>

<?php
/** After a post, print the results for demonstration purposes */
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	echo "<p>Received the following results: </p>";
	echo "<p>&nbsp;Name: \"$Name\" </p>";
	echo "<p>&nbsp;Email: \"$Email\" </p>";
	echo "<p>&nbsp;Website: \"$URL\" </p>";
	echo "<p>&nbsp;Favorite Integer: \"$Number\"</p>";
}
?>

<!-- If the user's web browser is not JavaScript-enabled, then print a warning -->
<noscript>
<p class="error">Warning: This page requires JavaScript! Please visit this page with a JavaScript-enabled web browser. </p>
</noscript>

</body>
</html>
