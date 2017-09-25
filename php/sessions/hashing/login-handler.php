<?php
require_once("includes/Dao.php");
require_once('includes/session-helper.php');

session_start();

// We only want to validate if they reached this page via a post.
if($_POST)
{
	$email = $_POST['email'];
	$password = $_POST['password'];

	$errors = array();

	function valid_length($field, $min, $max) {
		$trimmed = trim($field);
		return (strlen($trimmed) >= $min && strlen($trimmed) <= $max);
	}

	if(!valid_length($email, 1, 50)) {
		$errors['email'] = "Email is required.";
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = "Must be a valid email address.";
	}

	if(strlen(trim($password)) <= 0 ) {
		$errors['password'] = "Password is required.";
	}

	// If input is valid, check values against user info in database.
	if(empty($errors)) {
	
		// Creates a digest that you would store as the password in your users table.
		$digest = password_hash($password, PASSWORD_DEFAULT);

		// Make sure it doesn't return false. Can fail for various reasons.
		if($digest) {
			echo("<p>Generated digest: $digest</p>");
		} else {
			echo("<p>Failed :(</p>");
		}

		// Verify that the password matches the digest
		if(password_verify($password, $digest)) {
			echo("<p>Digest matched. Password verified.</p>");
		} else {
			echo("<p>No match. You shall not pass.</p>");
		}
		die;

		// Would be great to write a User class with a "login" method if you
		// wanted to use a more advanced design. This is "simplified" (but
		// in some ways more complicated I suppose) to show you how the
		// process works.
		// $dao = new Dao();
		// IMPORTANT! The current implementation of validateUser() in this
		// example always returns true.
		// if($dao->validateUser($email, $password)) {
			// loginUser($email);
			// header("Location: granted.php");
		// } else {
			// $errors['status'] = "Invalid username or password";
		// }
	} else {
		$errors['status'] = "Invalid input";
	}

	# If we get this far, something went wrong.
	$_SESSION['errors'] = $errors;
	$_SESSION['presets'] = array('email' => htmlspecialchars($email));
	header("Location: login.php");
	die; # Make sure this script terminates.
} else {
	# tried to access this page incorrectly. Just redirect them back to the
	# main login page.
	header("Location: login.php");
	die;
}
?>
