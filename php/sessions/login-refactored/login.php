<?php
require_once('includes/Auth.php');
require_once('includes/SessionManager.php');
require_once('includes/PhpHeader.php');
require_once('includes/FormUtil.php');

SessionManager::startSession();

// If user is already logged in, redirect them to the landing page.
if(Auth::hasAccess()) {
  PhpHeader::redirectSuccess("granted.php");
}
?>
<html>
	<?php include_once('includes/header.php'); ?>
	<body>
		<h1>Login to my Secret System</h3>
		<div id="status">
			<?php FormUtil::displayError('status'); ?>
		</div>
	</body>
	<form action="login-handler.php" method="POST">
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" id="email"  <?php FormUtil::preset('email'); ?>>
			<?php FormUtil::displayError('email'); ?>
			</span>
		</p>
		<p>
			<label for="password">Password</label>
			<input type="password" name="password" id="password" value="">
			<?php FormUtil::displayError('password'); ?>
		</p>
		<p>
			<input type="submit" name="submit" id="login" value="Login">
		</p>
	</form>
</html>
<?php FormUtil::clearErrors(); ?>
