<?php

class Dao {

	function validateUser($email, $password) {
		// Should NOT just blindly return true.
		// Retrieve user and password digest from database,
		// password_verify the digest against the entered digest.
		return true;
	}
}
