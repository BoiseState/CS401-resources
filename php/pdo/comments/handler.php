<?php
// handler.php
// handle comment posts, saving to MySQL and redirecting back to the list
require_once "Dao.php";

if (isset($_POST["commentButton"])) {
  # We want to clean up this comment before inserting into the database.
  # this isn't the best, what if it is empty
  $comment = htmlspecialchars($_POST["comment"]);
  # NOTE: This still allows us to save an empty comment. How would we avoid this?
  try {
    $dao = new Dao();
    $dao->saveComment($comment);
  } catch (Exception $e) {
    #var_dump($e); # Don't do this in production!! Gives hackers too much information!
                  # We would want to log the error.
    echo "<p>Failed to save your comment. Please try again later</p>.";
    die(); # Exit the program.
  }
}

# Redirect back to comment.php
header("Location: comment.php");
die();
?>
