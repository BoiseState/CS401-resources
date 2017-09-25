<?php
require_once('includes/session-helper.php');

session_start();

// Make sure session is valid. If not, direct them to login page.
if (!validateSession()) {
	$_SESSION["status"] = "You need to log in first";
	header("Location: login.php");
	die;
}
?>
<html>
	<?php include_once('includes/header.php'); ?>
	<body>
		<p>ACCESS GRANTED</p>
		<a href="logout.php">Logout</a>

	</body>
</html>
