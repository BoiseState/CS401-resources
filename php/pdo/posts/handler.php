<?php
require_once "Dao.php";

$queryParams = "";

# Handle filter from index.php
if(isset($_GET['filterButton']))
{
  if(empty($_GET['username']))
  {
    $queryParams = "?error=Username can't be empty.";
    # WE WILL HANDLE THIS BETTER WHEN WE TALK ABOUT SESSION VARIABLES.
  }
  else
  {
    $username = filter_var($_GET['username'], FILTER_SANITIZE_STRING);
    try
    {
      $dao = new Dao();
      if($dao->userExists($username)) {
        $queryParams="?username=" . $username;
      } else {
        $queryParams = "?error=Username does not exist.";
        # WE WILL HANDLE THIS BETTER WHEN WE TALK ABOUT SESSION VARIABLES.
      }
    } catch (Exception $e) {
      echo "<p>Failed to check for user. Please try again later.</p>.";
      # Need to add logging so we know what went wrong.
      die; # Exit the program.
    }
  }
}


if(isset($_GET['clearFilter'])) {
  // do nothing. We just need to redirect back to posts.php without any params.
}

# Handle delete from posts.php
if (isset($_POST["deleteButton"])) {
  $id = $_POST["id"];

  # May want to verify that they really want to delete it.
  try {
    $dao = new Dao();
    $dao->deletePostById($id);
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
  # May want to verify that they really want to delete it.
  try {
    $dao = new Dao();
    $dao->updatePost($id, $message);
  } catch (Exception $e) {
    echo "<p>Failed to update the post. Please try again later</p>.";
    # Need to add logging so we know what went wrong.
    die; # Exit the program.
  }
}
# Redirect back to delete.php
header("Location:posts.php" . $queryParams);
?>
