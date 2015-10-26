<html>
<head>
<title>PHP Example: Form Validation: Required Fields</title>
<style>
.error { color:red; }
</style>
</head>
<body>

<?php
require_once('./form_util.php');

/** Define variables and set to empty values */
$first_name = $middle_initial = $last_name = $email = $url = $favorite_os = $favorite_pl = $comments = "";

/** Define potential error variables */
$first_name_error = $middle_initial_error = $last_name_error = $email_error = $url_error = $favorite_os_error = $favorite_pl_error = "";

/** Test the posted input field values */
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	/** Verify that the first name value is available and store it, otherwise set as error */
	if(empty($_POST['first_name'])) {
		$first_name_error = "First name is a required field!";
	} else {
		$first_name = cleanup_input($_POST['first_name']);
	}

	/** Store the middle initial value */
	$middle_initial = cleanup_input($_POST['middle_initial']);

	/** Verify that the last name value is available and store it, otherwise set as error */
	if(empty($_POST['last_name'])) {
		$last_name_error = "Last name is a required field!";
	} else {
		$last_name = cleanup_input($_POST['last_name']);
	}

	/** Verify that the email value is available and store it, otherwise set as error */
	if(empty($_POST['email'])) {
		$email_error = "Email is a required field!";
	} else {
		$email = cleanup_input($_POST['email']);
  }

	/** Store the website url value */
	$url = cleanup_input($_POST['url']);

	/** Verify that the favorite os value is available and store it, otherwise set as error */
	if(empty($_POST['favorite_os'])) {
		$favorite_os_error = "Favorite operating system is a required field!";
	} else {
		$favorite_os = cleanup_input($_POST['favorite_os']);
	}

	/** Verify that the favorite os value is available and store it, otherwise set as error */
	if(empty($_POST['favorite_pl'])) {
		$favorite_pl_error = "Favorite programming language is a required field!";
	} else {
		$favorite_pl = cleanup_input($_POST['favorite_pl']);
	}

	/** Store the comments value */
	$comments = cleanup_input($_POST['comments']);
}
?>

<!-- Print the form and insert error messages if necessary -->
<form method="post" action="" >
  <div>
  	<!-- First Name: Required -->
	  <label>First Name: </label><input type="text" name="first_name" value="<?= $first_name; ?>">
	  <span class="error">* <?= $first_name_error; ?> </span>
  </div>
  <div>
    <!-- Middle Initial: Optional -->
    <label>Middle Initial: </label><input type="text" name="middle_initial" value="<?= $middle_initial; ?>">
	  <span class="error"><?= $middle_initial_error; ?> </span>
  </div>
  <div>
	  <!-- Last Name: Required -->
	  <label>Last Name: </label><input type="text" name="last_name" value="<?= $last_name; ?>">
	  <span class="error">* <?= $last_name_error; ?> </span>
  </div>
  <div>
	  <!-- Email: Required -->
	  <label>Email: </label><input type="text" name="email" value="<?= $email; ?>">
 	  <span class="error">* <?= $email_error; ?> </span>
  </div>
  <div>
	  <!-- Website URL: Optional -->
	  <label>Website: </label><input type="text" name="url" value="<?= $url; ?>">
 	  <span class="error"> <?= $url_error; ?> </span>
  </div>
  <div>
	<!-- Favorite OS: Required, must select one -->
    <label>Favorite Operating System: </label>
    <input type="radio" name="favorite_os" value="Linux" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "Linux")) { echo "checked"; }?> > Linux
    <input type="radio" name="favorite_os" value="Windows" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "Windows")) { echo "checked"; } ?> > Windows
    <input type="radio" name="favorite_os" value="Mac_OS_X" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "Mac_OS_X")){ echo "checked"; } ?> > Mac OS X
    <input type="radio" name="favorite_os" value="Android" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "Android")) { echo "checked"; } ?> > Android
    <input type="radio" name="favorite_os" value="FreeBSD" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "FreeBSD")) { echo "checked"; } ?> > FreeBSD
    <input type="radio" name="favorite_os" value="Plan_9" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "Plan_9")) { echo "checked"; } ?> > Plan 9
    <input type="radio" name="favorite_os" value="IOS" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "IOS")) { echo "checked"; } ?> > IOS
    <input type="radio" name="favorite_os" value="Other" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "Other")) { echo "checked"; } ?> > Other...
    <span class="error">* <?= $favorite_os_error; ?> </span>
  </div>
  <div>
	<!-- Favorite PL: Required, must select one -->
	<label>Favorite Programming Language: </label>
	<select name="favorite_pl">
		<option selected disabled hidden value=''></option>
		<option value="python" <?php if(isset($_POST['favorite_pl']) && ($_POST['favorite_pl'] == "python")) { echo "selected"; } ?> > Python </option>
		<option value="java" <?php if(isset($_POST['favorite_pl']) && ($_POST['favorite_pl'] == "java"))   { echo "selected"; } ?> > Java </option>
		<option value="C_plus_plus" <?php if(isset($_POST['favorite_pl']) && ($_POST['favorite_pl'] == "C_plus_plus")) { echo "selected"; } ?> > C++ </option>
		<option value="C_sharp" <?php if(isset($_POST['favorite_pl']) && ($_POST['favorite_pl'] == "C_sharp")) { echo "selected"; } ?> > C# </option>
		<option value="ruby" <?php if(isset($_POST['favorite_pl']) && ($_POST['favorite_pl'] == "ruby")) { echo "selected"; } ?> > Ruby </option>
		<option value="javascript" <?php if(isset($_POST['favorite_pl']) && ($_POST['favorite_pl'] == "javascript")) { echo "selected"; } ?> > JavaScript </option>
		<option value="C" <?php if(isset($_POST['favorite_pl']) && ($_POST['favorite_pl'] == "C")) { echo "selected"; } ?> > C </option>
		<option value="php" <?php if(isset($_POST['favorite_pl']) && ($_POST['favorite_pl'] == "php")) { echo "selected"; } ?> > PHP </option>
		<option value="perl"<?php if(isset($_POST['favorite_pl']) && ($_POST['favorite_pl'] == "perl")) { echo "selected"; } ?> > Perl </option>
		<option value="fortran" <?php if(isset($_POST['favorite_pl']) && ($_POST['favorite_pl'] == "fortran")) { echo "selected"; } ?> > Fortran </option>
		<option value="basic" <?php if(isset($_POST['favorite_pl']) && ($_POST['favorite_pl'] == "basic")) { echo "selected"; } ?> > Basic </option>
		<option value="lisp" <?php if(isset($_POST['favorite_pl']) && ($_POST['favorite_pl'] == "lisp")) { echo "selected"; } ?> > Lisp </option>
		<option value="other" <?php if(isset($_POST['favorite_pl']) && ($_POST['favorite_pl'] == "other")) { echo "selected"; } ?> > Other...</option>
	</select>
	<span class="error">* <?= $favorite_pl_error; ?> </span>
  </div>
  <div>
	  <!-- Comments(s): Optional -->
    <label>Comment(s): </label><br>
    <textarea name="comments" rows="10" cols="30"><?= $comments; ?></textarea>
  </div>
  <div>
	  <input type="submit">
  </div>
  <span class="error">*</span>Indicates a required field.
</form>


<?php

/** After a post, print the results for demonstration purposes */
if($_SERVER['REQUEST_METHOD'] == "POST")
{
?>
  <h2>Received the following results:</h2>
  <p>First Name: <?= $first_name; ?> </p>
  <p>Middle Initial: <?= $middle_initial; ?> </p>
  <p>Name: <?= $last_name; ?> </p>
  <p>Email: <?= $email; ?> </p>
  <p>Website: <?= $url; ?> </p>
  <p>Favorite Operating System: <?= $favorite_os; ?> </p>
  <p>Favorite Programming Language: <?= $favorite_pl; ?> </p>
  <p>Comment(s): <?= $comments; ?> </p>
<?php
}
?>

</body>
</html>
