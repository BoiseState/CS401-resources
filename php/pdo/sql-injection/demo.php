<?php
require_once('Dao.php');
$dao = new Dao();

function printUsers($rows) {
	if($rows) { ?>
		<table>
		<tr>
			<th>Email</th><th>Name</th>
		</tr>
		<?php foreach($rows as $row) { ?>
		<tr>
			<td><?= $row['email']; ?></td>
			<td><?= $row['name']; ?></td>
		</tr>
		<?php } ?>
		</table>
	<?php } else { ?>
		<p>No rows.</p>
	<?php }
}
?>
<html>
	<head>
		<title>SQL Injection Demo</title>
		<link href="style.css" rel="stylesheet">
	</head>
	<body>
	<h1>SQL Injection</h1>
	<section>
	<h1>All users (no user input, public data)</h1>
	<?php
	try {
		$rows = $dao->getUsers();
		printUsers($rows);
	} catch (PDOException $e) {
		echo "<p>Failed to retrieve posts.</p>";
		echo $e->getMessage();
	}
	?>
	</section>

	<section>
	<form id="search-form" method="GET">
			<p>
				<label for="email">Search by email:</label>
				<input type="text" name="email" id="email" required>
			</p>
			<input type="submit" name="search" value="Search">
	</form>
	</section>

	<section>
	<h1>Attacks</h1>
	<h2>Exposing Data</h2>
		<ul>
		  <li>Try searching as: <code>' or '1' = '1</code></li>
		  <li>Try searching as: <code>' UNION SELECT password, level FROM users; --</code></li>
		</ul>
	<h2>Modifying or Destroying Data</h2>
		<ul>
			<li>Try searching as: <code>'; DROP TABLE posts; --</code></li>
			<li>Try searching as: <code>'; DROP DATABASE webdev; --</code></li>
		</ul>
	</section>

	<section>
	<h1>Non Sanitized Input</h1>
	<?php
	if(isset($_GET['email'])) {
		$email = $_GET['email'];
		try {
			$rows = $dao->getUserByEmailBAD($email);
			printUsers($rows);
		} catch (PDOException $e) {
			echo "<p>Failed to retrieve posts.</p>";
			echo $e->getMessage();
		}
	}
	?>
	</section>

	<section>
	<h1>Sanitized Input</h1>
	<?php
	if(isset($_GET['email'])) {
		$email = $_GET['email'];
		try {
			$rows = $dao->getUserByEmailBETTER($email);
			printUsers($rows);
		} catch (PDOException $e) {
			echo "<p>Failed to retrieve posts.</p>";
			echo $e->getMessage();
		}
	}
	?>
	</section>

	<section>
	<h1>Prepared Statements</h1>
	<?php
	if(isset($_GET['email'])) {
		$email = $_GET['email'];
		try {
			$rows = $dao->getUserByEmail($email);
			printUsers($rows);
		} catch (PDOException $e) {
			echo "<p>Failed to retrieve posts.</p>";
			echo $e->getMessage();
		}
	}
	?>
	</section>
	</body>
</html>
