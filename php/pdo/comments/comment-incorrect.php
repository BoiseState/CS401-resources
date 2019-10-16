<?php
// Establish connection to database and retrieve comments. 
require_once('Dao.php');

// Retrieve all comments from the database (model) to display on page
try {
  $dao = new Dao();
  $comments = $dao->getComments();
} catch (PDOException $e) {
  echo $e->getMessage(); // only print this during development. We want to log in production.
  die(); // stop the page from loading because something is not right.
}

// If we reached this page via comment form submission we need to save the user comment
// to our database. NOTE: This is the incorrect way to do this. Doesn't use post-redirect-get
// model. 
if(isset($_POST["commentButton"]))
{
  // We need to clean up this comment before inserting into the database.
  // NOTE: This still allows us to save an empty comment. How would we avoid this?
  $comment = htmlspecialchars($_POST["comment"]);

  try {
    $dao->saveComment($comment);
  } catch (Exception $e) {
    var_dump($e); // Don't do this in production!! Gives hackers too much information! 
                  // We would want to log the error.
    echo "<p>Failed to save your comment. Please try again later</p>.";
    die();
  }
}
?>
<html>
  <head>
    <title>List of Comments</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

    <!-- Post new comment form -->
    <form name="commentForm" action="" method="POST">
      <div>
        <label for="comment">Leave a comment:</label>
        <input type="text" id="comment" name="comment">
      </div>
      <div>
        <input type="submit" name="commentButton" value="Submit">
      </div>
    </form>

    <!-- Display all comments table --> 
    <table>
    <?php foreach ($comments as $comment) { ?>
      <tr>
        <td><?= $comment["comment"]; ?></td>
        <td><?= $comment["created"]; ?></td>
      </tr>
    <?php } ?>
    </table>

  </body>
</html>
