<?php
session_start();

/**
 * Prints preset for given key (if one exists).
 */
function preset($key) {
	if(isset($_SESSION['presets'][$key]) && !empty($_SESSION['presets'][$key])) { 
		echo 'value="' . $_SESSION['presets'][$key] . '" '; 
	}
}

/**
 * Prints error for given key (if one exists).
 */
function displayError($key) {
	if(isset($_SESSION['errors'][$key])) { ?>
		<span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['errors'][$key] ?></span>
	<?php }
}

/**
 * Clears error data from session when we are done so they don't show
 * up on refresh or if user submits correct info next time around.
 */
function clearErrors() {
	unset($_SESSION['errors']);	
	unset($_SESSION['presets']);	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CS401/516: Forms, Sanitation, and Validation</title>
	<link href="style.css" rel="stylesheet">
</head>
<body>
<section>
	<form method="POST" action="registration-handler.php" autocomplete="off">
		<fieldset>
		<legend>Registration</legend>
		<p>
			<label for="fullName">Your Name:</label>
			<input type="text" id="fullName" name="fullName" maxlength="50" <?php preset('fullName'); ?>>
			<?php displayError('fullName'); ?>
		</p>
		<p>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" <?php preset('email'); ?> >
			<?php displayError('email'); ?>
		</p>
		<p>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password">
			<?php displayError('password'); ?>
		</p>
		<p>
			<label for="password_match">Password again:</label>
			<input type="password" id="password_match" name="password_match">
			<?php displayError('password_match'); ?>
		</p>
		<input type="submit" value="Register">
		</fieldset>
	</form>
</section>
</body>
</html>
<?php clearErrors(); ?>
