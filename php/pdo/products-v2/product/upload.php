<?php
  require_once ("../Dao.php");

  try {
    $dao = new Dao();

	// save a product, including name, description, and image data
	$name = (isset($_POST["name"])) ? htmlspecialchars($_POST["name"]) : "";
	$description = (isset($_POST["description"])) ? htmlspecialchars($_POST["description"]) : "";

	# NOTE: We are not VALIDATING/SANITIZING our input. You need to though! As it is now,
	# if no file is selected, bad things happen.

	$imagePath = "";
	$result = false;
	if (count($_FILES) > 0) {
		if ($_FILES["file"]["error"] > 0) {
		    echo "<p>File upload failed.</p>";
			die;
		} else {
			// store image data in database
			$image = file_get_contents($_FILES["file"]["tmp_name"]);
			$result = $dao->saveProduct($name, $description, $image);
		}
	}
	if($result == false) {
		echo "<p>Failed to save product.</p>";
		die;
	}
	header("location:../products.php");
	die;
  } catch(PDOException $e) {
    echo "<p>Failed to connect to database. Please try again later.</p>";
  }
