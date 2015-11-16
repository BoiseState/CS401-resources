<?php
require_once("Dao.php");
#start the session. if session is already in progress, has no effect.
session_start();

# We only want to validate if they reached this page via a post.
if($_POST)
{
  $email = $_POST['email'];
  $password = $_POST['password'];

  # Validate form input first. (Note: This could (and probably should)
  # be broken into functions).
  $validEmail = false;
  $validPassword = false;

  # Check email (required field)
  if(empty($email)) {
    $_SESSION["error_email"] = "Email cannot be empty.";
  } else if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $_SESSION["error_email"] = "Please enter a valid email.";
  } else {
    $validEmail = true;
  }

  # Check password (required field)
  if(empty($password)) {
    $_SESSION["error_password"] = "Password cannot be empty.";
  } else {
    $validPassword = true;
  }

  # If input is valid, check values against user info in database.
  if($validEmail && $validPassword) {
    # For simplification, let's pretend I got these login credentials
    # from an SQL table.
    $dao = new Dao();
    if($dao->validateUser($email, $password)) {
      $_SESSION["access_granted"] = true;
      header("Location: granted.php");
      die;
    } else {
      $status = "Invalid username or password";
    }
  } else {
    $status = "Invalid input";
  }

  # If we get this far, something went wrong.
  $_SESSION["status"] = $status;
  $_SESSION["email_preset"] = $email; # so user doesn't have to re-enter value.
  $_SESSION["access_granted"] = false;
  header("Location: login.php");
  die; # Make sure this script terminates.
} else {
  # tried to access this page incorrectly. Just redirect them back to the
  # main login page.
  $_SESSION["access_granted"] = false;
  header("Location: login.php");
  die;
}
?>
