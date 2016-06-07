<?php
require_once('includes/session-helper.php');

session_start();

// Check if user is already logged in. If they are, redirect them to the correct location.
if(validateSession()) {
	header("Location: granted.php");
	die;
}
?>
<html>
	<?php include_once('includes/header.php'); ?>
	<body>
		<h1>Login to my Secret System</h3>
		<div id="status">
			<?php displayError('status'); ?>
		</div>
	</body>
	<form action="login-handler.php" method="POST">
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" id="email"  <?php preset('email'); ?>>
			<?php displayError('email'); ?>
			</span>
		</p>
		<p>
			<label for="password">Password</label>
			<input type="password" name="password" id="password" value="">
			<?php displayError('password'); ?>
		</p>
		<p>
			<input type="submit" name="submit" id="login" value="Login">
		</p>
	</form>
</html>
<?php clearErrors(); ?>
