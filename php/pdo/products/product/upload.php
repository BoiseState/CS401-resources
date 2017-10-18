<?php
	require_once "../Dao.php";

	try {
		$dao = new Dao();
	} catch(PDOException $e) {
		echo "<p>Failed to connect to database. Please try again later.</p>";
	}

	// save a product, including name, description, and an image path
	$name = (isset($_POST["name"])) ? $_POST["name"] : "";
	$description = (isset($_POST["description"])) ? $_POST["description"] : "";

	# NOTE: We are not VALIDATING/SANITIZING our input. You need to though! As it is now,
	# if no file is selected, bad things happen.

	$imagePath = "";
	if (count($_FILES) > 0) {
		if ($_FILES["file"]["error"] > 0) {
			throw new Exception("Error: " . $_FILES["file"]["error"]);
		} else {
			$basePath = getCwd() . "/"; # Must append slash here.
			$imagePath = "images/" . $_FILES["file"]["name"];
			if (!move_uploaded_file($_FILES["file"]["tmp_name"], $basePath . $imagePath)) {
				throw new Exception("File move failed");
			}
		}
	}

	$result = $dao->saveProduct($name, $description, $imagePath);
	if($result == false) {
		echo "<p>Failed to save product.</p>";
		die;
	}
	header("location:../products.php");
