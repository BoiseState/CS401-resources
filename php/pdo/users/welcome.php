<?php
session_start();
$user = $_SESSION['user'] ?: 'User';
?>
<?php require_once('includes/header.php'); ?>
	<section id="content">
		<section id="welcome">
			<h1>Welcome <?= $user ?></h1>
		</section>
	</section>
<?php require_once('includes/footer.php'); ?>
