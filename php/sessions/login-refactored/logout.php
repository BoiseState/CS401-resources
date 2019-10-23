<?php
require_once('includes/SessionManager.php');
require_once('includes/Auth.php');
require_once('includes/PhpHeader.php');

SessionManager::startSession();

// if access not granted, update status and direct back to log in page.
if (!Auth::hasAccess()) {
  PhpHeader::redirectError("login.php", ["status" => "You must log in"]);
}

Auth::logout();
PhpHeader::redirectSuccess("login.php");
?>
