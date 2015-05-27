<?php
// handler.php
// handle comment posts, saving to MySQL and redirecting back to the list
require_once "Dao.php";

if (isset($_POST["commentButton"])) {
  $comment = $_POST["comment"];

  try {
    $dao = new Dao();
    $dao->saveComment($comment);
  } catch (Exception $e) {
    #var_dump($e); # Don't do this in production!! Gives hackers too much information!
                  # We would want to log the error.
    echo "<p>Failed to save your comment. Please try again later</p>.";
    die; # Exit the program.
  }
}

# Redirect back to index.php
header("Location:index.php");
?>
