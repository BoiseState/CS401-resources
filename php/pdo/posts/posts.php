<?php
require_once('Dao.php');
# The error handling will be handled better on redirect using sessions.
$error = isset($_GET['error']) ? $_GET['error'] : "";
try
{
  $dao = new Dao();

  # If the username param is set, then filter posts by given username,
  # else just retrieve all posts from the database.
  if(isset($_GET['username']))
  {
    $username = filter_var($_GET['username'], FILTER_SANITIZE_STRING);
    $posts = $dao->filterPostsByKey("username", $username);
  }
  else {
    $posts = $dao->getPostsJoinUserName();
  }

} catch (PDOException $e) {
  echo "<p>Failed to retrieve posts.</p>";
  # DO NOT PRINT EXCEPTION ERROR MESSAGE TO USER!!!! Why?
  die;
}
?>
<html>
<head>
  <title>List Posts</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Posts</h1>

  <!-- Message Filter Form -->
  <form name="messageFilter" action="handler.php" method="GET">
    <fieldset>
      <legend>Filter Posts</legend>
      <label for="username">Filter by (username):</label>
      <input type="text" id="username" name="username" />
      <input type="submit" name="filterButton" value="Filter" />
      <?php if(isset($_GET['username'])) { // only display clear if filter is set ?>
        <input type="submit" name="clearFilter" value="Clear Filter" />
      <?php } ?>
      <span class="error"><?= $error ?></span>
    </fieldset>
  </form>

  <!-- Message Result Table -->
  <table>
    <thead>
      <tr><th>User</th><th>Message</th><th>Posted</th><th>Actions</th></tr>
    </thead>
    <tbody>
      <?php foreach($posts as $post) { ?>
      <tr>
        <td><?= $post['first_name'] . " " . $post['last_name']; ?></td>
        <td><?= $post['message']; ?></td>
        <td><?= $post['posted']; ?></td>
        <td>
          <form name="postForm" action="handler.php" method="POST">
            <input type="hidden" name="id" value="<?= $post['id']; ?>">
            <span>
              <input type="submit" name="deleteButton" value="Delete">
              <input type="submit" name="modifyButton" value="Modify">
            </span>
          </form>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</body>
</html>
