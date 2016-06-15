<?php
session_start();
require_once "../../../php/pdo/comments/Dao.php";
$dao = new Dao();
$comments = $dao->getComments();
?>
<html>
	<head>
	 <link href="style.css" rel="stylesheet" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<form id="form" method="POST" action="ajax-handler.php">
			<fieldset>
			<legend>Leave a comment</legend>
			<p>
				<label for="email">Enter your email:</label>
				<input type="text" id="email"
				<?php if (isset($_SESSION["email"])) { ?>
					value="<?php echo $_SESSION['email']; ?>"
				<?php } ?>
				name="email"/>
			</p>
			<p>
				<label for="comment">Leave a comment:</label>
				<input type="text" id="comment"
				<?php if (isset($_SESSION["comment"])) { ?>
					value="<?php echo $_SESSION['comment']; ?>"
				<?php } ?>
				name="comment"/>
			<p>
			<p>
				<label for="age">Enter your age:</label>
				<input type="text" id="age"
				<?php if (isset($_SESSION['age'])) { ?>
					value="<?php echo $_SESSION['age']; ?>"
				<?php } ?>
				name="age"/>
				<span id="ageError" class="error"></span>
			<p>
			<p>
				<input id="submit" type="submit"/><small>(You must be 18 to post)</small>
			<p>
			</fieldset>
		</form>
		</div>

		<table id="comments">
			<thead>
				<tr><th>Comment</th><th>Created</th></tr>
			</thead>
			<tbody>
			<?php
			foreach ($comments as $comment) { ?>
			<tr>
				<td><?php echo $comment["comment"]; ?></td>
				<td><?php echo $comment["created"]; ?></td>
			</tr>
			<?php } ?>
			</tbody>
		</table>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
		<!-- JQuery validation plugin (http://plugins.jquery.com/validation/) included from Microsoft CDN -->
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
		<script src="js/ajax.js" type="text/javascript"></script>
	</body>
</html>
