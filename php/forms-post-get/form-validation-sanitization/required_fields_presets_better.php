<?php
require_once('./form_util.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  /* Sanitize all data up front so we don't forget anything. */
  $sanitized = array();
  foreach($_POST as $key => $value) {
    $sanitized[$key] = cleanup_input($value);
  }

	/* Verify that the first name value is available and valid, otherwise set error (required field) */
	if(empty($sanitized['firstName'])) {
		$firstNameError = "First name is a required field!";
	} else {
		if(!validate_name($sanitized['firstName'])) {
			$firstNameError = "First name can only be composed of letters and white space!";
		}
	}

	/* Store the middle initial value (optional field) */
  if(!empty($sanitized['middleInitial']) && !validate_middle_initial($sanitized['middleInitial'])) {
    $middleInitialError = "Middle initial can only be composed of a single letter!";
  }

	/* Verify that the last name value is available and store it, otherwise set as error (required field) */
	if(empty($sanitized['lastName'])) {
		$lastNameError = "Last name is a required field!";
  } else {
		if(!validate_name($sanitized['lastName'])) {
			$lastNameError = "Last name can only be composed of letters and white space!";
		}
	}

	/* Verify that the email value is available and store it, otherwise set as error (required field) */
	if(empty($sanitized['email'])) {
		$emailError = "email is a required field!";
	}	else {
		if(!validate_email($sanitized['email'])) {
			$emailError = "Invalid email format!";
		}
	}

	/* Store the url value (optional field) */
	if(!empty($sanitized['url']) && !validate_url($sanitized['url'])) {
		$urlError = "The website url address syntax is not valid!";
	}

	/* Verify that the favorite os value is available and store it, otherwise set as error (required field) */
	if(empty($sanitized['favOS'])) {
		$favOSError = "Favorite operating system is a required field!";
	} else {
		$favOS = $sanitized['favOS'];
	}

	/** Verify that the favorite os value is available and store it, otherwise set as error (required field) */
	if(empty($sanitized['favLang'])) {
		$favLangError = "Favorite programming language is a required field!";
	} else {
		$favLang = $sanitized['favLang'];
	}
}
?>




<html>
<head>
<title>PHP Example: Form Validation: Required Fields With Regular Expressions</title>
<!-- This is bad. You should put your styles in css files. -->
<style>
.error { color:red; }
</style>
</head>
<body>

<!-- Print the form and insert error messages if necessary -->
<form method="post" action="" > <!-- no action because we are just returning to this page -->

  <!-- First Name: Required, must only contain letters and whitespace. -->
  <div class="form-group">
    <label for="firstName">First Name:</label>
    <input type="text" id="firstName" name="firstName" value="<?= isset($sanitized['firstName'])? $sanitized['firstName'] : ""; ?>">
	  <span class="error" id="errorFirstName">* <?= isset($firstNameError) ? $firstNameError : ""; ?> </span>
  </div>

	<!-- Middle Initial: Optional, may only contain one letter. -->
  <div class="form-group">
    <label for="middleInitial">Middle Initial:</label>
	  <input type="text" id="middleInitial" name="middleInitial" value="<?= isset($sanitized['middleInitial'])? $sanitized['middleInitial'] : ""; ?>">
    <span class="error"> <?= isset($middleInitialError) ? $middleInitialError : ""; ?> </span>
  </div>

	<!-- Last Name: Required, must only contain letters and whitespace. -->
  <div class="form-group">
    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" value="<?= isset($sanitized['lastName'])? $sanitized['lastName'] : ""; ?>">
    <span class="error">* <?= isset($lastNameError) ? $lastNameError : ""; ?> </span>
  </div>

  <!-- email: Required, must contain a valid email address (with @ and .) -->
  <div class="form-group">
    <label for="email">Email:</label>
	  <input type="text" id="email" name="email" value="<?= isset($sanitized['email'])? $sanitized['email'] : ""; ?>">
    <span class="error">* <?= isset($emailError) ? $emailError : ""; ?> </span>
  </div>

	<!-- Website url: Optional, must contain a valid url address -->
  <div class="form-group">
    <label for="url">Website:</label>
	  <input type="text" id= "url" name="url" value="<?= isset($sanitized['url'])? $sanitized['url'] : ""; ?>">
 	  <span class="error"> <?= isset($urlError) ? $urlError : ""; ?> </span>
  </div>

	<!-- Favorite OS: Required, must select one -->
  <div class="form-group">
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
    $preset_os = isset($sanitized['favOS']) ? $sanitized['favOS'] : "";
    foreach($os_options as $option => $label) {
      $checked = ($preset_os == $option) ? "checked" : "";
    ?>
      <label><input type="radio" name="favOS" value="<?= $option; ?>" <?= $checked; ?>><?=$label?></label>
    <?php
    }?>
	  <span class="error">* <?= isset($favOSError) ? $favOSError : ""; ?> </span><br><br>
  </div>

  <!-- Favorite PL: Required, must select one -->
  <div class="form-group">
	  <label for="favLang">Favorite Programming Language:</label>
    <select name="favLang" id="favLang">
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
      $preset_pl = isset($sanitized['favLang']) ? $sanitized['favLang'] : "";
      foreach($pl_options as $option => $label) {
        $selected = ($preset_pl == $option) ? "selected" : "";
        ?>
          <option value="<?= $option; ?>" <?= $selected; ?>><?= $label; ?></option>
        <?php
      }?>
    </select>
	  <span class="error">* <?= isset($favLangError) ? $favLangError : ""; ?> </span>
  </div>

  <!-- comments(s): Optional -->
  <div class="form-group">
    <label for="comments">Comment(s):</label>
	  <textarea name="comments" rows="10" cols="30"><?= isset($sanitized['comments']) ? $sanitized['comments'] : ""; ?></textarea>
  </div>

  <div class="form-group">
    <input type="submit" id="submitButton" name="submitButton">
  </div>
	<span class="error">*</span>Indicates a required field.
</form>


<?php
/** After a post, print the results for demonstration purposes. */
if($_SERVER['REQUEST_METHOD'] == "POST")
{ 
var_dump($sanitized);
?>
  <div>
  <p>Received the following results:</p>
  <p>First Name: <?= $sanitized['firstName'] ?></p>
  <p>Middle Initial: <?= $sanitized['middleInitial'] ?></p>
  <p>Last Name: <?= $sanitized['lastName'] ?></p>
  <p>email: <?= $sanitized['email'] ?></p>
  <p>Website: <?= $sanitized['url'] ?></p>
  <p>Favorite Operating System: <?= isset($sanitized['favOS']) ? $sanitized['favOS'] : "" ?></p>
  <p>Favorite Programming Language: <?= isset($sanitized['favLang']) ? $sanitized['favLang'] : "" ?></p>
  <p>Comment(s): <?= $sanitized['comments'] ?></p>
  </div>
<?php
}
?>
</body>
</html>
