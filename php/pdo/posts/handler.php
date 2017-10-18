<?php
require_once "Dao.php";

// Get userId from session so we can use it to validate their identity.
session_start();
$userId = $_SESSION['userId'];

# Used to send messages back to posts.php. You should use sessions though.
$queryParams = "";

# Handle filter from index.php
if(isset($_GET['filterButton'])) {
	if(empty($_GET['username'])) {
		$queryParams = "?error=Username can't be empty.";
	} else {
		$username = trim($_GET['username']);
		try {
			$dao = new Dao();
			if($dao->userExists($username)) {
				$queryParams="?username=" . htmlspecialchars($username);
			} else {
				$queryParams = "?error=Username does not exist.";
			}
		} catch (Exception $e) {
			echo "<p>Failed to check for user. Please try again later.</p>.";
			# Need to add logging so we know what went wrong.
			die; # Exit the program.
		}
	}
}


if(isset($_GET['clearButton'])) {
	// do nothing. We just need to redirect back to posts.php without any params.
}

# Handle delete from posts.php
if (isset($_POST["deleteButton"])) {
	$id = $_POST["id"];

	# May want to verify that they really want to delete it.
	try {
		$dao = new Dao();
		# Make sure that this post is actually owned by the user who is logged in before deleting.
		if(!$dao->deleteUserPostById($userId, $id)) {
			$queryParams="?error=Failed to delete post";
		}
	} catch (Exception $e) {
		echo "<p>Failed to delete the post. Please try again later</p>.";
		# Need to add logging so we know what went wrong.
		die; # Exit the program.
	}
}

# Handle modify from posts.php
if (isset($_POST["modifyButton"])) {
	$id = $_POST["id"];
	$message = "This post has been modified";
	# May want to verify that they really want to modify it.
	try {
		$dao = new Dao();
		# Make sure that this post is actually owned by the user who is logged in before deleting.
		$dao->updateUserPost($userId, $id, $message);
	} catch (Exception $e) {
		echo "<p>Failed to update the post. Please try again later</p>.";
		# Need to add logging so we know what went wrong.
		die; # Exit the program.
	}
}


# Handle modify from posts.php
if (isset($_POST["postButton"])) {
	$username = $_POST["username"];
	$message = $_POST["message"];
	try {
		$dao = new Dao();
		$dao->addPost($username, $message);
	} catch (Exception $e) {
		echo "<p>Failed to add post. Please try again later</p>.";
echo $e->getMessage();
		# Need to add logging so we know what went wrong.
		die; # Exit the program.
	}
}


# Redirect back to delete.php
header("Location:posts.php" . $queryParams);
?>
