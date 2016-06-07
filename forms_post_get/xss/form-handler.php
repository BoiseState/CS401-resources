<html>
	<head>
		<title>XSS Demo</title>
	</head>
<body>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
?>
	<!-- Print received values -->
	<div>
		<p>Received the following results:</p>
		<p>First Name: "<?= $firstName; ?>"</p>
		<p>Last Name: "<?= $lastName; ?>"</p>
	</div>
<?php
} else {
	header('Location: form.html');
} ?>

</body>
</html>
