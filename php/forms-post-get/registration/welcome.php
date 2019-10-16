<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>CS401/516: Forms, Sanitation, and Validation</title>
	<link href="style.css" rel="stylesheet">
</head>
<body>
<section>
	<h1>Welcome <?= $_SESSION['user']; ?>!</h1>
</section>
</body>
</html>
