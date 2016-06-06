<?php
require_once('Dao.php');
# Find out who is "logged in". We would want to use a session for this.
if(isset($_POST['username'])) {
  $currentuser = htmlspecialchars($_POST['username']);
} else {
  $currentuser = 'snoopy';
}

try {
  $dao = new Dao();

  # If the username param is set, then filter posts by given username,
  # else just retrieve all posts from the database.
  if(isset($_GET['username'])) {
    $username = htmlspecialchars($_GET['username']);
    $posts = $dao->filterPostsByKey("username", $username);
  } else {
    $posts = $dao->getPostsJoinUserName();
  }
} catch (PDOException $e) {
  echo "<p>Failed to retrieve posts.</p>";
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
  <form id="message-filter" action="handler.php" method="GET">
    <fieldset>
      <legend>Filter Posts</legend>
        <label for="username">Filter by (username):</label>
        <input type="text" id="username" name="username" />
        <input type="submit" name="filterButton" value="Filter" />
        <?php if(isset($_GET['username'])) { // only display clear if filter is set ?>
          <input type="submit" name="clearButton" value="Clear Filter" />
        <?php } ?>
        <?php if(isset($_GET['error'])) { ?>
          <span class="error"><?= $_GET['error'] ?></span>
        <?php } ?>
    </fieldset>
  </form>

  <!-- Message Result Table -->
  <table>
    <thead>
      <tr><th>User</th><th>Username</th><th>Message</th><th>Posted</th><th>Actions</th></tr>
    </thead>
    <tbody>
      <?php foreach($posts as $post) { ?>
      <tr>
        <td><?= $post['first_name'] . " " . $post['last_name']; ?></td>
        <td><?= $post['username'] ?></td>
        <td><?= $post['message']; ?></td>
        <td><?= $post['posted']; ?></td>
        <td>
         <?php # only show options for current user.
         if($currentuser == $post['username']) { ?>
          <form name="postForm" action="handler.php" method="POST">
            <input type="hidden" name="id" value="<?= $post['id']; ?>">
            <span>
              <input type="submit" name="deleteButton" value="Delete">
              <input type="submit" name="modifyButton" value="Modify">
            </span>
          </form>
         <?php } ?>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</body>
</html>
