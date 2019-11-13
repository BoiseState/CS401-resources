<!--
This is a modified version of example found at http://jqueryvalidation.org/documentation/
-->
<!DOCTYPE html>
<html>
<head>
	<title>JQuery Form Validation</title>
	<link href='css/style.css' rel='stylesheet' type='text/css'>

  <!-- Include jQuery core from jQuery CDN (Content Delivery Network) -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
          integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
          crossorigin="anonymous"
          defer></script>

	<!-- JQuery validation plugin (http://plugins.jquery.com/validation/) included from Microsoft CDN -->
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js" defer></script>

	<!-- Include our JavaScript source -->
	<script src="js/form-validate.js" defer></script>
</head>
<body>
  <!-- Note: HTML validation disabled so we can use our custom error handling -->
	<form class="cmxform" id="commentForm" method="post" action="form-handler.php" novalidate>
	<fieldset>
		<legend>Please provide your name, email address (won't be published) and a comment</legend>
		<p>
			<label for="cname">Name (required, at least 2 characters):</label>
			<input id="cname" name="name" minlength="2" type="text" required>
		</p>
		<p>
			<label for="cemail">E-Mail (required):</label>
			<input id="cemail" type="email" name="email" required>
		</p>
		<p>
			<label for="curl">URL (optional):</label>
			<input id="curl" type="url" name="url">
		</p>
		<p>
			<label for="ccomment">Your comment (required, max 500 characters):</label></br>
			<textarea id="ccomment" name="comment" cols="80" rows="5" maxlength="500" required></textarea>
		</p>
		<p>
			<input class="submit" type="submit" name="submitButton" value="Submit">
			<?php if(isset($_GET['success']) && $_GET['success'] == true) { ?>
				<span class="success">Form submitted successfully!</span>
			<?php } ?>
		</p>
	</fieldset>
	</form>
</body>
