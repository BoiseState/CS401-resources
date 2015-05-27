<?php
  // index.php
  // This page has a comment form for posting, and a list of comments from MySQL
  require_once "Dao.php";
  $dao = new Dao();
?>

<html>
  <head>
    <title>List of Products</title>
    <link rel="stylesheet" type="text/css" href="comment.css">
  </head>
  <body>
    <form name="commentForm" action="handler.php" method="POST">
      <div>
        Leave a comment: <input type="text" name="comment">
      </div>
      <div>
        <input type="submit" name="commentButton" value="Submit">
      </div>
      <input type="hidden" name="form" value="comment">
    </form>
    <?php
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
