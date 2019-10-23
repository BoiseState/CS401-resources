<?php
require_once('includes/SessionManager.php');
require_once('includes/Auth.php');
require_once('includes/PhpHeader.php');

SessionManager::startSession();

// Make sure session is valid. If not, direct them to login page.
if (!Auth::hasAccess()) {
  PhpHeader::redirectError("login.php", ["status" => "You must log in"]);
}
?>
<html>
	<?php include_once('includes/header.php'); ?>
	<body>
		<p>ACCESS GRANTED</p>
		<a href="logout.php">Logout</a>
	</body>
</html>
