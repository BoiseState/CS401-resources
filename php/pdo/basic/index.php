<?php
// If you don't know what session_start is, make sure you watch the videos
// on Forms (Error Handling and Presets).
session_start();
if(isset($_SESSION['error'])) {
	$error = $_SESSION['error'];
	unset($_SESSION['error']); // clear so gone when page is refreshed.
}

require_once('Dao.php');
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<section>
		<!-- Filter form will just submit to itself. This is okay on a GET request -->
		<form method="GET">
			<p>
				<label>Filter by email:
				<input type="text" name="email" required>
				</label>
				<input type="submit" name="filterButton" value="Filter">
			</p>
		</form>
	</section>
	<section>
		<!-- Add form will submit to a separate handler. POST/Redirect/GET pattern. -->
		<form action="test-handler.php" method="POST">
			<p>
				<label>Add email:
				<input type="text" name="email" required>
				</label>
				<input type="submit" name="addButton" value="Add Email">
			</p>
			<?php
			if(isset($error)) { ?>
				<p class="error"><?= $error ?></p>
			<?php } ?>
		</form>
	</section>
	<section>
		<h1>Search Results</h1>
		<?php
		// filter results if email parameter is present in URL, otherwise, display
		// all results.
		if(isset($_GET['email']))
		{
			$email = htmlspecialchars($_GET['email']);
			try {
				$dao = new Dao();
				$results = $dao->getRow($email);
				printResultTable($results);
			} catch (PDOException $e) {
				echo $e->getMessage(); // only print this during development. Don't print in production.
				echo "<p>Failed to filter data. Please come back later.</p>";
			}
		} else {
			try {
				$dao = new Dao();
				$results = $dao->getAllRows();
				printResultTable($results);
			} catch (PDOException $e) {
				echo $e->getMessage(); // only print this during development. Don't print in production.
				echo "<p>Failed to retrieve data. Please come back later.</p>";
			}
		}
	
		function printResultTable($rows) {
			if(!empty($rows)) { ?>
				<table>
				<?php foreach($rows as $row) {?>
					<tr><td><?= $row['email'] ?></td></tr>
				<?php }?>
				</table>
			<?php } else { ?>
				<p>No results.</p>
			<?php }
		}
		?>
	</section>
</body>
</html>

