<html>
<head>
<title>PHP Example: Form Validation: Required Fields With Regular Expressions</title>
<!-- This is bad. You should put your styles in css files. -->
<style>
.error { color:red; }
</style>
</head>
<body>

<?php
require_once('./form_util.php');

/** Define variables and set to empty values */
$first_name = $middle_initial = $last_name = $email = $url = $favorite_os = $favorite_pl = $comments = "";
$first_name_error = $middle_initial_error = $last_name_error = $email_error = $url_error = $favorite_os_error = $favorite_pl_error = "";

/** Test the posted input field values */
if($_SERVER['REQUEST_METHOD'] == "POST")
{
	/** Verify that the first name value is available and store it, otherwise set as error */
	if(empty($_POST['first_name'])) {
		$first_name_error = "First name is a required field!";
	} else {
		$first_name = cleanup_input($_POST['first_name']);
		if(!validate_name($first_name)) {
			$first_name_error = "First name can only be composed of letters and white space!";
		}
	}

	/** Store the middle initial value */
	$middle_initial = cleanup_input($_POST['middle_initial']);
	if((strlen($middle_initial) > 0) && !validate_middle_initial($middle_initial)) {
		$middle_initial_error = "Middle initial can only be composed of a single letter!";
	}

	/** Verify that the last name value is available and store it, otherwise set as error */
	if(empty($_POST['last_name'])) {
		$last_name_error = "Last name is a required field!";
  } else {
		$last_name = cleanup_input($_POST['last_name']);
		if(!validate_name($last_name)) {
			$last_name_error = "Last name can only be composed of letters and white space!";
		}
	}

	/** Verify that the email value is available and store it, otherwise set as error */
	if(empty($_POST['email'])) {
		$email_error = "email is a required field!";
	}	else {
		$email = cleanup_input($_POST['email']);
		if(!validate_email($email)) {
			$email_error = "Invalid email format!";
		}
	}

	/** Store the middle initial value */
	$url = $_POST['url'];
	if((strlen($url) > 0) && !validate_url($url)) {
		$url_error = "The website url address syntax is not valid!";
	}

	/** Verify that the favorite os value is available and store it, otherwise set as error */
	if(empty($_POST['favorite_os'])) {
		$favorite_os_error = "Favorite operating system is a required field!";
	} else {
		$favorite_os = $_POST['favorite_os'];
	}

	/** Verify that the favorite os value is available and store it, otherwise set as error */
	if(empty($_POST['favorite_pl'])) {
		$favorite_pl_error = "Favorite programming language is a required field!";
	} else {
		$favorite_pl = $_POST['favorite_pl'];
	}

	/** Store the comments value */
	$comments = cleanup_input($_POST['comments']);
}
?>

<!-- Print the form and insert error messages if necessary -->
<form method="post" action="" >

  <!-- First Name: Required, must only contain letters and whitespace. -->
  <div class="control-group">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" value="<?= $first_name; ?>">
	  <span class="error" id="errorFirstName">* <?= $first_name_error; ?> </span>
  </div>

	<!-- Middle Initial: Optional, may only contain one letter. -->
  <div class="control-group">
    <label for="middle_initial">Middle Initial:</label>
	  <input type="text" id="middle_initial" name="middle_initial" value="<?= $middle_initial; ?>">
    <span class="error"> <?= $middle_initial_error; ?> </span>
  </div>

	<!-- Last Name: Required, must only contain letters and whitespace. -->
  <div class="control-group">
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" value="<?= $last_name; ?>">
    <span class="error">* <?= $last_name_error; ?> </span>
  </div>

  <!-- email: Required, must contain a valid email address (with @ and .) -->
  <div class="control-group">
    <label for="email">Email:</label>
	  <input type="text" id="email" name="email" value="<?= $email; ?>">
    <span class="error">* <?= $email_error; ?> </span>
  </div>

	<!-- Website url: Optional, must contain a valid url address -->
  <div class="control-group">
    <label for="url">Website:</label>
	  <input type="text" id= "url" name="url" value="<?= $url; ?>">
 	  <span class="error"> <?= $url_error; ?> </span>
  </div>

	<!-- Favorite OS: Required, must select one -->
  <div class="control-group">
    <label>Favorite Operating System:</label>
    <?php
    $os_options = array(
      "Linux" => "Linux",
      "Windows" => "Windows",
      "Maco_OS_X" => "Mac OS X",
      "Android" => "Android",
      "FreeBSD" => "FreeBSD",
      "Plan_9" => "Plan 9",
      "IOS" => "IOS",
      "Other" => "Other...");

    # Get preset from post array. So we can check previously checked option.
    $preset_os = isset($_POST['favorite_os']) ? $_POST['favorite_os'] : "";
    foreach($os_options as $option => $label) {
      $checked = ($preset_os == $option) ? "checked" : "";
      ?>
      <label><input type="radio" name="favorite_os" value="<?= $option; ?>" <?= $checked; ?>><?=$label?></label>
      <?php
    }?>
	  <span class="error">* <?= $favorite_os_error; ?> </span><br><br>
  </div>

  <!-- Favorite PL: Required, must select one -->
  <div class="control-group">
	  <label for="favorite_pl">Favorite Programming Language:</label>
    <select name="favorite_pl" id="favorite_pl">
      <option selected disabled hidden value=''></option>
      <?php
      $pl_options = array(
        "python" => "Python",
        "java" => "Java",
        "c_plus_plus" => "C++",
        "c_sharp" => "C#",
        "ruby" => "Ruby",
        "javascript" => "JavaScript",
        "c" => "C",
        "php" => "PHP",
        "perl" => "Perl",
        "fortran" => "Fortran",
        "basic" => "Basic",
        "lisp" => "Lisp",
        "other" => "Other..."
      );

      # Get preset from post array. So we can check previously selected option.
      $preset_pl = isset($_POST['favorite_pl']) ? $_POST['favorite_pl'] : "";
      foreach($pl_options as $option => $label) {
        $selected = ($preset_pl == $option) ? "selected" : "";
        ?>
          <option value="<?= $option; ?>" <?= $selected; ?>><?= $label; ?></option>
        <?php
      }?>
    </select>
	  <span class="error">* <?= $favorite_pl_error; ?> </span>
  </div>

  <!-- comments(s): Optional -->
  <div class="control-group">
    <label for="comments">Comment(s):</label>
	  <textarea name="comments" rows="10" cols="30"><?= $comments; ?></textarea>
  </div>

  <div class="control-group">
    <input type="submit" id="submitButton" name="submitButton">
  </div>
	<span class="error">*</span>Indicates a required field.
</form>


<?php
/** After a post, print the results for demonstration purposes. */
if($_SERVER['REQUEST_METHOD'] == "POST")
{ ?>
  <div>
  <p>Received the following results:</p>
  <p>First Name: <?= $first_name ?></p>
  <p>Middle Initial: <?= $middle_initial ?></p>
  <p>Last Name: <?= $last_name ?></p>
  <p>email: <?= $email ?></p>
  <p>Website: <?= $url ?></p>
  <p>Favorite Operating System: <?= $favorite_os ?></p>
  <p>Favorite Programming Language: <?= $favorite_pl ?></p>
  <p>Comment(s): <?= $comments ?></p>
  </div>
<?php
}
?>

</body>
</html>
