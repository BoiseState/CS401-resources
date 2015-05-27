<?php
// delete.php
// handle deleting of posts, deleting from MySQL and redirecting back to the list
require_once "Dao.php";

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
header("Location:posts.php");
?>
