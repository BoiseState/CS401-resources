<?php
session_start();

/**
 * Prints preset for given key (if one exists).
 */
function preset($key) {
	if(isset($_SESSION['presets'][$key]) && !empty($_SESSION['presets'][$key])) { 
		echo 'value="' . $_SESSION['presets'][$key] . '" '; 
	}
	unset($_SESSION['presets'][$key]);	
}

/**
 * Prints error for given key (if one exists).
 */
function displayError($key) {
	if(isset($_SESSION['errors'][$key])) { ?>
		<span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['errors'][$key] ?></span>
	<?php }
	unset($_SESSION['errors'][$key]);	
}
?>

<?php require_once('includes/header.php'); ?>
	<section id="content">
		<aside>
			<h2>Favorite Animal</h2>
			<img src="images/bunny.jpg" alt="A cute bunny" title="A cute bunny" />
		</aside>
		<section id="home">
			<h1>Welcome to my home page!</h1>
			<p>This is a demonstration of a simple website using HTML, CSS, and
			PHP. Eventually, it will also use JavaScript.</p>
		</section>
		<section id="registration">
			<form id="registration-form" action="registration-handler.php" method="POST" autocomplete="off">
				<fieldset>
				<legend>Registration</legend>
				<p>
					<label for="name">Your Name:</label>
					<input type="text" id="name" name="name" maxlength="50" value="Marissa" <?php preset('name'); ?>>
					<?php displayError('name'); ?>
				</p>
				<p>
					<label for="email">Email:</label>
					<input type="email" id="email" name="email" value="marissa@mail.com" <?php preset('email'); ?> >
					<?php displayError('email'); ?>
				</p>
				<p>
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" value="password123">
					<?php displayError('password'); ?>
				</p>
				<p>
					<label for="password_match">Password again:</label>
					<input type="password" id="password_match" name="password_match" value="password123">
					<?php displayError('password_match'); ?>
				</p>
				<input type="submit" value="Register">
				<?php displayError('exception'); ?>
				</fieldset>
			</form>
		</section>
	</section>
<?php require_once('includes/footer.php'); ?>
