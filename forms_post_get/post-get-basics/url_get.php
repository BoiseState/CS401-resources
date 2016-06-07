<html>
<head><title>PHP Example: URL Get (Send and Receive)</title> </head>
<body>

<a href="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>?first_name=Jane&last_name=Doe&favorite_class=Web+Development">
  Click here to test GET
</a>

<?php
if(!empty($_REQUEST)) // We only want to display results if $_REQUEST array has something in it.
{
	/** Get value of first name input field and print */
  $first_name = isset($_REQUEST['first_name']) ? $_REQUEST['first_name'] : "(null)";
  if(empty($first_name)) {
    $first_name = "(empty)";
  }
  // setting to string value of "null" or "empty" so we can tell the difference in the output.

  /** Get value of last name input field and print */
  $last_name = isset($_REQUEST['last_name']) ? $_REQUEST['last_name'] : "(null)";
  if(empty($last_name)) {
    $last_name = "(empty)";
  }

  /** Get value of favorite class input field and print */
  $favorite_class = isset($_REQUEST['favorite_class']) ? $_REQUEST['favorite_class'] : "(null)";
  if(empty($favorite_class)) {
    $favorite_class = "(empty)";
  }
?>
<!-- Print received values (only if we received anything) -->
<div>
  <p>Received the following results:</p>
  <p>First Name: "<?= $first_name; ?>"</p>
  <p>Last Name: "<?= $last_name; ?>"</p>
  <p>Favorite Class: "<?= $favorite_class; ?>"</p>
  <!-- Print results summary -->
  <p>Guess what?! <?= $first_name . ' ' . $last_name; ?>'s favorite class is <?= $favorite_class; ?>!!!</p>
</div>
<?php } ?>
</body>
</html>
