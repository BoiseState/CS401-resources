<html>
<head><title>PHP Example: Form Post (Handler)</title></head>
<body>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  if(isset($_POST['favClassSubmitButton']))
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
<?php
  }
  else { ?>
    <p>Incorrect form submitted here.</p>
  <?php
  }
}
?>

</body>
</html>
