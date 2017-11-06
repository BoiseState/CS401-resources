<!-- This example doesn't use SESSION/presets/server validation. You need to. -->
<html>
	<head>
	 <link href="style.css" rel="stylesheet" type="text/css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<form action="comment/index.php" id="comment-form" method="POST">
			<fieldset>
			<legend>Leave a comment</legend>
			<p>
				<label for="email">Enter your email:</label>
				<input type="text" id="email" name="email" required>
			</p>
			<p>
				<label for="comment">Leave a comment:</label>
				<input type="text" id="comment" name="comment" required>
			<p>
			<p>
				<label for="age">Enter your age:</label>
				<input type="text" id="age" name="age" required>
				<span id="ageError" class="error"></span>
			<p>
			<p>
				<input id="submit" type="submit"/> <small>(You must be 18 to post)</small>
			<p>
			</fieldset>
		</form>
		</div>

		<div id="commentsError" class="error"></div>
		<table id="comments">
			<thead>
				<tr><th>Comment</th><th>Created</th></tr>
			</thead>
			<tbody>
			</tbody>
		</table>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
		<!-- JQuery validation plugin (http://plugins.jquery.com/validation/) included from Microsoft CDN -->
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
		<script src="js/ajax.js" type="text/javascript"></script>
	</body>
</html>
