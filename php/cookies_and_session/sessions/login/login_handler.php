<?php
session_start();

if($_POST)
{
  # Validate form input first. (Note: This could (and probably should)
  # be broken into functions).
  $validEmail = true;
  $validPassword = true;

  # Check email (required field)
  if(empty($_POST["email"]))
  {
    $validEmail = false;
    $_SESSION["error_email"] = "Email cannot be empty.";
  }
  else
  {
    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false)
    {
      $validEmail = false;
      $_SESSION["error_email"] = "Please enter a valid email.";
    }
  }

  # Check password (required field)
  if(empty($_POST["password"]))
  {
    $validPasword = false;
    $_SESSION["error_password"] = "Password cannot be empty.";
  }

  # If validation fails, then don't go any further.
  if(!$validEmail || !$validPassword)
  {
      $status = "Invalid input";
      $_SESSION["status"] = $status;
      $_SESSION["email_preset"] = $_POST["email"]; # so user doesn't have to re-enter value.
      $_SESSION["access_granted"] = false;

      header("Location: login.php");
      die; # Make sure this script terminates.
  }

  # If input is valid, check values against user info in database.
  # For simplification, let's pretend I got these login credentials from an SQL table.
  if ("snoopy@example.com" == $_POST["email"] && "snoopypass" == $_POST["password"])
  {
    $_SESSION["access_granted"] = true;
    header("Location: granted.php");
  }
  else
  {
    $status = "Invalid username or password";
    $_SESSION["status"] = $status;
    $_SESSION["email_preset"] = $_POST["email"];
    $_SESSION["access_granted"] = false;
    header("Location: login.php");
  }
}
else
{
  # tried to access this page incorrectly. Just redirect them back to the main login page.
  $_SESSION["access_granted"] = false;
  header("Location: login.php");
}
