<html>
<head>
  <title>Cookie Example: Simple Value Change With Form</title>
</head>
<body>
<?php
$cookie_name = "username";
$cookie_value = "";

# Print current cookie status
if(!isset($_COOKIE[$cookie_name])) { ?>
  <p>Cookie named '<?= $cookie_name; ?>' is not set!
  Set the value of the cookie with the form below!</p>
<?php } else {
  $cookie_value = $_COOKIE[$cookie_name];
?>
  <p>Cookie '<?= $cookie_name; ?>' is set!</p>
  <p>Value is: <?= $cookie_value; ?></p>
<?php } ?>

  <form action="cookie_form_handler.php" method="post">
    <label for="cookie_value">Enter new value of cookie:</label>
    <input type="text" id="cookie_value" name="cookie_value" value="<?= $cookie_value; ?>"/>
	  <input type="submit" name="submit_modify" value="Change Cookie Value" />
  </form>

<?php # If the cookie is set, also give the option to delete it via deletion handler
if(isset($_COOKIE[$cookie_name])) { ?>
  <form action="cookie_form_handler.php" method="post">
    <input type="hidden" name="cookie_name" value="<?= $cookie_name; ?>"/>
    <input type="hidden" name="cookie_value" value=""/>
    <input type="submit" name="submit_delete" value="Delete Cookie" />
  </form>
<?php } ?>
</body>
</html>

<!--
Some questions:
	What other modifications to the cookie can be made?
	How might such modifications be useful and applicable?
	What are some limitations of using cookies?
-->
