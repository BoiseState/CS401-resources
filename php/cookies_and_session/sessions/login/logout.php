<?php
session_start();
# make sure access_granted session is set and is true
# if access not granted, update status and direct back to log in page.
if (!isset($_SESSION["access_granted"]) || (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"]))
{
  $_SESSION["status"] = "You must log in.";
  header("Location: login.php");
  die;
}


session_destroy();
session_regenerate_id(TRUE); # nuke old session
header("Location: login.php");
?>
