<?php
require_once("includes/Dao.php");
require_once('includes/Auth.php');
require_once('includes/SessionManager.php');
require_once('includes/FormUtil.php');
require_once('includes/PhpHeader.php');

SessionManager::startSession();

// We only want to validate if they reached this page via a post.
if($_POST)
{
	$email = $_POST['email'];
	$password = $_POST['password'];

	$errors = array();

	if(!FormUtil::validateLength($email, 1, 50)) {
		$errors['email'] = "Email must be between 1 and 50 characters." ;
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = "Must be a valid email address.";
	}

	if(strlen(trim($password)) <= 0 ) {
		$errors['password'] = "Password is required.";
	}

	// If input is valid, check values against user info in database.
	if(empty($errors)) {
		// Would be great to write a User class with a "login" method if you
		// wanted to use a more advanced design. This is "simplified" (but
		// in some ways more complicated I suppose) to show you how the
		// process works.
		$dao = new Dao();
		// IMPORTANT! The current implementation of validateUser() in this
		// example always returns true.
		if($dao->validateUser($email, $password)) {
      Auth::login($email);
      PhpHeader::redirectSuccess("granted.php");
		} else {
			$errors['status'] = "Invalid username or password";
		}
	} else {
		$errors['status'] = "Invalid input";
	}

	# If we get this far, something went wrong.
  PhpHeader::redirectError("login.php", $errors, array('email' => htmlspecialchars($email)));
} else {
	# tried to access this page incorrectly. Just redirect them back to the
	# main login page.
  PhpHeader::redirectError("login.php", $errors);
}
?>
