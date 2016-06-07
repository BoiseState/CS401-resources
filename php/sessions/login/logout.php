<?php
require_once('includes/session-helper.php');

session_start();

// if access not granted, update status and direct back to log in page.
if (!validateSession()) {
	$_SESSION["status"] = "You must log in.";
	header("Location: login.php");
	die;
}


session_destroy();
session_regenerate_id(true); # nuke old session
header("Location: login.php");
?>
