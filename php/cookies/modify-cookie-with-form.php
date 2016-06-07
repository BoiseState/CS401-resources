<html>
<head>
	<title>Cookie Example: Simple Value Change With Form</title>
</head>
<body>
<?php
$cookieName = "username";
$cookieValue = "";

# Print current cookie status
if(!isset($_COOKIE[$cookieName])) { ?>
	<p>Cookie named '<?= $cookieName; ?>' is not set!
	Set the value of the cookie with the form below!</p>
<?php } else {
	$cookieValue = $_COOKIE[$cookieName];
?>
	<p>Cookie '<?= $cookieName; ?>' is set!</p>
	<p>Value is: <?= $cookieValue; ?></p>
<?php } ?>

	<form action="cookie-form-handler.php" method="post">
		<label for="cookieValue">Enter new value of cookie:</label>
		<input type="text" id="cookieValue" name="cookieValue" value="<?= $cookieValue; ?>"/>
		<input type="submit" name="submitModify" value="Change Cookie Value" />
	</form>

<?php # If the cookie is set, also give the option to delete it via deletion handler
if(isset($_COOKIE[$cookieName])) { ?>
	<form action="cookie-form-handler.php" method="post">
		<input type="hidden" name="cookieName" value="<?= $cookieName; ?>"/>
		<input type="hidden" name="cookieValue" value=""/>
		<input type="submit" name="submitDelete" value="Delete Cookie" />
	</form>
<?php } ?>
</body>
</html>

<!--
Some questions:
	What other modifications to the cookie can be made?
	How might such modifications be useful and applicable?
	What are some limitations of using cookies?
-->
