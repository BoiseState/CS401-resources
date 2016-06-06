<?php
session_start();

# make sure access_granted session is set and is true
# if access not granted, update status and direct back to log in page.
if (!isset($_SESSION["access_granted"]) || (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"]))
{
  $_SESSION["status"] = "You need to log in first";
  header("Location:login.php"); # redirect to login.php
  die;
}
?>

<html>
  <?php include_once('header.php'); ?>
  <body>
    <p>ACCESS GRANTED</p>
    <a href="logout.php">Logout</a>
  </body>
</html>
