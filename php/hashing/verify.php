<?php
require_once('password_compat/lib/password.php');

$password = "iL0v3Ch1ck3n";

// Creates a digest that you would store as the password in your users table.
$digest = password_hash($password, PASSWORD_DEFAULT);

// Make sure it doesn't return false. Can fail for various reasons.
if($digest) {
	echo("<p>Generated digest: $digest</p>");
	echo("<p>Storing in database...</p>");
} else {
	echo("<p>Failed...Not storing it.</p>");
}

// Pull the digest back out of the database when user tries to login and compare
// it to the password they entered.
if(password_verify($password, $digest)) {
	echo("<p>Digest matched. Password verified.</p>");
} else {
	echo("<p>No match. You shall not pass.</p>");
}
