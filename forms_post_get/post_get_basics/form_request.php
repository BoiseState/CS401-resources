<html>
<head><title>PHP Example: Form Request (Submit + Receive)</title></head>
<body>

<form method="post" action="" >
  <div>
    <p>First Name: <input type="text" name="first_name"> </p>
    <p>Last Name: <input type="text" name="last_name"> </p>
    <p>Favorite Operating System: <input type="text" name="favorite_os"> </p>
    <p><input type="submit"></p>
  </div>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	/** Get value of first name input field and print */
	$first_name = $_REQUEST['first_name'];
  if(empty($first_name)) {
    $first_name = "null"; # just so we can tell in the output.
  }

  /** Get value of last name input field and print */
	$last_name = $_REQUEST['last_name'];
	if(empty($last_name)) {
		$last_name = "null";
	}

	/** Get value of favorite operating system input field and print */
	$favorite_os = $_REQUEST['favorite_os'];
	if(empty($favorite_os)) {
		$favorite_os = "null";
	}
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
