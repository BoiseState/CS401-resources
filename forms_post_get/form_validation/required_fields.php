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
$First_Name = $Middle_Initial = $Last_Name = $Email = $URL = $Favorite_OS = $Favorite_PL = $Comments = "";

/** Define potential error variables */
$First_Name_Error = $Middle_Initial_Error = $Last_Name_Error = $Email_Error = $URL_Error = $Favorite_OS_Error = $Favorite_PL_Error = "";

/** Test the posted input field values */
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	/** Verify that the first name value is available and store it, otherwise set as error */
	if(empty($_POST['first_name']))
	{
		$First_Name_Error = "First name is a required field!";
	}
	else
	{
		$First_Name = cleanup_input($_POST['first_name']);
	}

	/** Store the middle initial value */
	$Middle_Initial = cleanup_input($_POST['middle_initial']);

	/** Verify that the last name value is available and store it, otherwise set as error */
	if(empty($_POST['last_name']))
	{
		$Last_Name_Error = "Last name is a required field!";
	}
	else
	{
		$Last_Name = cleanup_input($_POST['last_name']);
	}

	/** Verify that the email value is available and store it, otherwise set as error */
	if(empty($_POST['email']))
	{
		$Email_Error = "Email is a required field!";
	}
	else
	{
		$Email = cleanup_input($_POST['email']);
	}

	/** Store the website url value */
	$URL = cleanup_input($_POST['url']);

	/** Verify that the favorite os value is available and store it, otherwise set as error */
	if(empty($_POST['favorite_os']))
	{
		$Favorite_OS_Error = "Favorite operating system is a required field!";
	}
	else
	{
		$Favorite_OS = cleanup_input($_POST['favorite_os']);
	}

	/** Verify that the favorite os value is available and store it, otherwise set as error */
	if(empty($_POST['favorite_pl']))
	{
		$Favorite_PL_Error = "Favorite programming language is a required field!";
	}
	else
	{
		$Favorite_PL = cleanup_input($_POST['favorite_pl']);
	}

	/** Store the comments value */
	$Comments = cleanup_input($_POST['comments']);
}

?>

<!-- Print the form and insert error messages if necessary -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >

	<!-- First Name: Required -->
	First Name: <input type="text" name="first_name" value="<?php echo $First_Name; ?>">
	<span class="error">* <?php echo $First_Name_Error; ?> </span><br><br>

	<!-- Middle Initial: Optional -->
	Middle Initial: <input type="text" name="middle_initial" value="<?php echo $Middle_Initial; ?>"> </span><br><br>

	<!-- Last Name: Required -->
	Last Name: <input type="text" name="last_name" value="<?php echo $Last_Name; ?>">
	<span class="error">* <?php echo $Last_Name_Error; ?> </span><br><br>

	<!-- Email: Required -->
	Email: <input type="text" name="email" value="<?php echo $Email; ?>">
 	<span class="error">* <?php echo $Email_Error; ?> </span><br><br>

	<!-- Website URL: Optional -->
	Website: <input type="text" name="url" value="<?php echo $URL; ?>"><br><br>

	<!-- Favorite OS: Required, must select one -->
	Favorite Operating System:
	<input type="radio" name="favorite_os" value="Linux" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "Linux")) { echo "checked"; }?> > Linux
	<input type="radio" name="favorite_os" value="Windows" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "Windows")) { echo "checked"; } ?> > Windows
	<input type="radio" name="favorite_os" value="Mac_OS_X" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "Mac_OS_X")){ echo "checked"; } ?> > Mac OS X
	<input type="radio" name="favorite_os" value="Android" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "Android")) { echo "checked"; } ?> > Android
	<input type="radio" name="favorite_os" value="FreeBSD" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "FreeBSD")) { echo "checked"; } ?> > FreeBSD
	<input type="radio" name="favorite_os" value="Plan_9" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "Plan_9")) { echo "checked"; } ?> > Plan 9
	<input type="radio" name="favorite_os" value="IOS" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "IOS")) { echo "checked"; } ?> > IOS
	<input type="radio" name="favorite_os" value="Other" <?php if(isset($_POST['favorite_os']) && ($_POST['favorite_os'] == "Other")) { echo "checked"; } ?> > Other...
	<span class="error">* <?php echo $Favorite_OS_Error; ?> </span><br><br>

	<!-- Favorite PL: Required, must select one -->
	Favorite Programming Language:
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
	<span class="error">* <?php echo $Favorite_PL_Error; ?> </span><br><br>

	<!-- Comments(s): Optional -->
	Comment(s):<br> <textarea name="comments" rows="10" cols="30"><?php echo $Comments; ?></textarea><br><br>

	<input type="submit">
	<br><br>
	<span class="error">*</span>Indicates a required field.
</form>


<?php

/** After a post, print the results for demonstration purposes */
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	echo "Received the following results: <br>";
	echo "<p>First Name: \"$First_Name\" </p>";
	echo "<p>Middle Initial: \"$Middle_Initial\" </p>";
	echo "<p>Name: \"$Last_Name\" </p>";
	echo "<p>Email: \"$Email\" </p>";
	echo "<p>Website: \"$URL\" </p>";
	echo "<p>Favorite Operating System: \"$Favorite_OS\" </p>";
	echo "<p>Favorite Programming Language: \"$Favorite_PL\" </p>";
	echo "<p>Comment(s): \"$Comments\" </p>";
}

?>

</body>
</html>
