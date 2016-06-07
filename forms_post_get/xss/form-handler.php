<html>
	<head>
		<title>XSS Demo</title>
	</head>
	<body>
	<?php
	if($_SERVER['REQUEST_METHOD'] == "POST") {
			$firstName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
	?>
		<section id="results">
		<h1>Results</h1>
		<div>
			<p>First Name: "<?= $firstName; ?>"</p>
			<p>Last Name: "<?= $lastName; ?>"</p>
		</div>
		</section>
	<?php } else {
		header('Location: form.html');
	} ?>
	</body>
</html>
