<?php
// Establish connection to database and retrieve comments. 
require_once('Dao.php');
try {
  $dao = new Dao();
  $comments = $dao->getComments();
} catch (PDOException $e) {
  echo $e->getMessage(); // only print this during development. We want to log in production.
  die(); // stop the page from loading because something is not right.
}
?>
<html>
  <head>
    <title>List of Comments</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

    <!-- Post new comment form -->
    <form name="commentForm" action="handler.php" method="POST">
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
