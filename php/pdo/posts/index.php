<?php 
setcookie('stolen', '', time()-3600); // for session hijack demo

// Establish connection to database and retrieve list of users. 
require_once('Dao.php');
try {
  $dao = new Dao();
  $users = $dao->getUsernameList(); 
} catch (PDOException $e) {
  echo $e->getMessage(); // only print this during development. We want to log in production.
  die(); // stop the page from loading because something is not right.
}
?>
<html>
<head>
  <title>PDO Demo</title>
</head>
<body>
  <h1>Login</h1>
  <p>This is not a real demo of logging in. This is just to select a specific
  user. DON'T use this as an example for logging in.</p>

  <!-- Login form -->
  <form id="username-form" action="posts.php" method="POST">
    <fieldset>
      <label for="username">Fake login username:</label>
      <input type="text" id="username" name="username" required>
      <label for="realname">Your real name:</label>
      <input type="text" id="realname" name="realname" required>
      <input type="submit" name="loginButton" value="Login">
    </fieldset>
  </form>

  <!-- List of existing users -->
  <p>Existing users are</p>
  <ul>
    <?php foreach($users as $user) { ?>
      <li><?= $user['username'] ?></li>
    <?php } ?>
  </ul>
</body>
</html>

