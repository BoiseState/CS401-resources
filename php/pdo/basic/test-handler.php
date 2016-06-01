<?php
// If you don't know what session_start is, make sure you watch the videos
// on Forms (Error Handling and Presets).
session_start();
unset($_SESSION['error']); // clear any previous errors.

// Make sure to include your DAO object.
require_once('Dao.php');

if(isset($_POST['email']))
{
	// This is to demonstrate database access. You still need to add your
	// server-side validation and sanitization. Try passing <h1>HAHA</h1>
	// into the Add email field. Watch what happens.
	$email = $_POST['email'];
	try {
		$dao = new Dao();
		$found = $dao->getRow($email);
		if(empty($found)) { // result will be empty if user was not in DB.
			$results = $dao->addRow($email);
		} else {
			// user already exists, use a session to send an error message
			// back to the user.
			$_SESSION['error'] = "Email exists '$email'. Please choose another.";
		}
		header('Location: index.php');
	} catch (PDOException $e) {
		echo $e->getMessage(); // only print this during development. Don't print in production.
		echo "<p>Failed to add email. Please come back later.</p>";
		die();
	}
}
