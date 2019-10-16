<?php
// If you don't know what session_start is, make sure you watch the videos
// on Forms (Error Handling and Presets).
session_start();

// clear errors from session so they are gone when page is refreshed.
if(isset($_SESSION['error'])) {
  $error = $_SESSION['error'];
  unset($_SESSION['error']);
}

// Establish connection to database and retrieve user list. 
require_once('Dao.php');
try {
  $dao = new Dao();
  if(isset($_GET['email'])) {
    // retrieve user with email sent via filter form input
    $email = htmlspecialchars($_GET['email']);
    $userList = $dao->getRow($email);
  } else {
    // no email filter set, so retrieve all users
    $userList = $dao->getAllRows();
  }
} catch (PDOException $e) {
  echo $e->getMessage(); // only print this during development. We want to log in production.
  die(); // stop the page from loading because something is not right.
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Basic PDO Demo</title>
</head>
<body>
  <!-- Filter by email -->
  <section>
    <!-- Filter form will just submit to itself. This is okay on a GET request -->
    <form method="GET">
      <p>
        <label>Filter by email: <input type="text" name="email"></label>
        <input type="submit" name="filterButton" value="Filter">
      </p>
    </form>
  </section>

  <!-- Add new email -->
  <section>
    <!-- Add form will submit to a separate handler. POST/Redirect/GET pattern. -->
    <form action="test-handler.php" method="POST">
      <p>
        <label>Add email:
        <input type="text" name="email">
        </label>
        <input type="submit" name="addButton" value="Add Email">
      </p>
      <?php if(isset($error)) { ?>
      <p class="error"><?= $error ?></p>
      <?php } ?>
    </form>
  </section>

  <!-- Filter results -->
  <section>
    <h1>Users</h1>
    <?php if(empty($userList)) { ?>
      <p>No results.</p>
    <?php } else { ?>
      <!-- table of user emails -->
      <table>
      <?php foreach($userList as $user) {?>
        <tr><td><?= $user['email'] ?></td></tr>
      <?php }?>
      </table>
    <?php } ?>
  </section>
</body>
</html>

