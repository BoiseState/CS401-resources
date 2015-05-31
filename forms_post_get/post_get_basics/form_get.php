<html>
<head><title>PHP Example: Form Get (Submit + Receive)</title></head>
<body>

<form method="get" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
  <div>
    <p>First Name: <input type="text" name="first_name"></p>
    <p>Last Name: <input type="text" name="last_name"></p>
	  <p>Favorite Operating System: <input type="text" name="favorite_os"></p>
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
  $favorite_os = isset($_GET['favorite_os']) ? $_GET['favorite_os'] : "";
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
