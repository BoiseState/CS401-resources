<!DOCTYPE html>
<html>
<head>
  <title>JQuery Form Validation</title>
  <!-- To use JQuery, one option is to include it from Google's content delivery network (CDN). -->
	<!-- There are other CDN possibilities. Another option is to download and install it manually. -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- JQuery validation plugin (http://plugins.jquery.com/validation/) included from Microsoft CDN -->
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
  <!-- Custom web font -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
  <link href='style.css' rel='stylesheet' type='text/css'>
</head>
<body>
  <!-- This is a modified version of example found at http://jqueryvalidation.org/documentation/ -->
  <form class="cmxform" id="commentForm" method="post" action="form_handler.php">
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
<script>
$(document).ready(function() {
  $("#commentForm").validate();
});
</script>
</body>
