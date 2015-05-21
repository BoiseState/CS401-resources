<html>
<head><title>PHP Example: URL Get (Send and Receive)</title> </head>
<body>

<a href="<?= $_SERVER['PHP_SELF']; ?>?first_name=Alan&last_name=Turing&favorite_os=Slackware">
  Click here to test $GET
</a>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{
	# Get value of first name input field and print
	$first_name = isset($_REQUEST['first_name']) ? $_REQUEST['first_name'] : "";

  # Get value of Last name input field and print
	$last_name = isset($_REQUEST['last_name']) ? $_REQUEST['last_name'] : "";

	# Get value of favorite operating system input field and print
	$favorite_os = isset($_REQUEST['favorite_os']) ? $_REQUEST['favorite_os'] : "";
?>
<!-- Print received values -->
<div>
  <p>Received the following results:</p>
  <p>First Name: "<?= $first_name; ?>"</p>
  <p>Last Name: "<?= $last_name; ?>"</p>
  <p>Favorite Operating System: "<?= $favorite_os; ?>"</p>
</div>

<!-- Print results summary -->
<div>
<p>
  Guess what?! <?= $first_name . ' ' . $last_name; ?>'s favorite operating system is <?= $favorite_os; ?>!!!
</p>
</div>
<?php } ?>

</body>
</html>
