<?php
  require_once "Dao.php";
  $dao = new Dao();
?>
<html>
  <head>
    <title>List of Comments</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <form name="commentForm" action="" method="POST">
      <div>
        <label for="comment">Leave a comment:</label>
        <input type="text" id="comment" name="comment">
      </div>
      <div>
        <input type="submit" name="commentButton" value="Submit">
      </div>
    </form>
    <?php
    if (isset($_POST["commentButton"])) {
      # We still want to clean up this comment before inserting into the database.
      $comment = htmlspecialchars($_POST["comment"]);
      # NOTE: This still allows us to save an empty comment. How would we avoid this?
      try {
        $dao->saveComment($comment);
      } catch (Exception $e) {
        #var_dump($e); # Don't do this in production!! Gives hackers too much information! We would want to log the error.
        echo "<p>Failed to save your comment. Please try again later</p>.";
      }
    }
    $comments = $dao->getComments();
    if ($comments) { ?>
    <table>
    <?php foreach ($comments as $comment) { ?>
      <tr>
        <td><?= $comment["comment"]; ?></td>
        <td><?= $comment["created"]; ?></td>
      </tr>
    <?php } ?>
    </table>
    <?php } ?>
  </body>
</html>
