<?php
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
		$results = $dao->addRow($email);
		header('Location: index.php');
	} catch (PDOException $e) {
		echo $e->getMessage(); // only print this during development. Don't print in production.
		echo "<p>Failed to add email. Please come back later.</p>";
		die();
	}
}
