<html>
<head>
	<title>Password Hashing</title>
</head>
<body>
	<form>
		<p>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password"></input>
		</p>
	</form>
</body>
</html>
<?php
// The user's original password
$password = "iL0v3Ch1ck3n";

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
