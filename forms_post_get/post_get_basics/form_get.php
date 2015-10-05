<html>
<head><title>PHP Example: Form Get (Submit + Receive)</title></head>
<body>

<form method="get" action="" >
  <div>
    <p>First Name: <input type="text" name="first_name"></p>
    <p>Last Name: <input type="text" name="last_name"></p>
	  <p>Favorite Class: <input type="text" name="favorite_class"></p>
    <p><input type="submit"></p>
  </div>
</form>

<?php

/** After a get, print the results for demonstration purposes
 * This will show errors on initial page load. */
if($_SERVER['REQUEST_METHOD'] == "GET")
{
  # Get value of first name input field
  $first_name = isset($_GET['first_name']) ? $_GET['first_name'] : "";
  # Get the value of the last name input field.
  $last_name = isset($_GET['last_name']) ? $_GET['last_name'] : "";
  # Get the value of the favorite os input field.
  $favorite_class = isset($_GET['favorite_class']) ? $_GET['favorite_class'] : "";
?>

<!-- Print received values -->
<div>
  <p>Received the following results:</p>
  <p>First Name: "<?= $first_name; ?>"</p>
  <p>Last Name: "<?= $last_name; ?>"</p>
  <p>Favorite Class: "<?= $favorite_class; ?>"</p>
</div>

<!-- Print results summary -->
<div>
<p>
  Guess what?! <?= $first_name . ' ' . $last_name; ?>'s favorite class is <?= $favorite_class; ?>!!!
</p>
</div>

<?php } ?>
</body>
</html>
