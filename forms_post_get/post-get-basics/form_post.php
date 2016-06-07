<html>
<head><title>PHP Example: Form Post (Submit + Receive)</title></head>
<body>

<form method="post" action="" >
  <div>
	  <p>First Name: <input type="text" name="first_name"> </p>
    <p>Last Name: <input type="text" name="last_name"> </p>
    <p>Favorite Class: <input type="text" name="favorite_class"> </p>
    <input type="hidden" name="timestamp" value="<?= date("Y-m-d h:i:sa"); ?>">
    <p><input type="submit" name="submitButton"></p>
  </div>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	/** Get value of first name input field and print */
	$first_name = $_POST['first_name'];
  if(empty($first_name)) {
    $first_name = "null"; # just so we can tell in the output.
  }

  /** Get value of last name input field and print */
	$last_name = $_POST['last_name'];
	if(empty($last_name)) {
		$last_name = "null";
	}

	/** Get value of favorite class input field and print */
	$favorite_class = $_POST['favorite_class'];
	if(empty($favorite_class)) {
		$favorite_class = "null";
  }

  $timestamp = $_POST['timestamp'];
?>
<!-- Print received values -->
<div>
  <p>Received the following results:</p>
  <p>First Name: "<?= $first_name; ?>"</p>
  <p>Last Name: "<?= $last_name; ?>"</p>
  <p>Favorite Class: "<?= $favorite_class; ?>"</p>
  <p>Time: "<?= $timestamp; ?>"</p>
</div>

<!-- Print results summary -->
<div>
<p>
  Guess what?! <?= $first_name . ' ' . $last_name; ?>'s favorite is class <?= $favorite_class; ?>!!!
</p>
</div>

<?php } # close if post ?>

</body>
</html>
