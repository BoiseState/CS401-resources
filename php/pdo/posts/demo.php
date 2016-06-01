<html>
<head>
</head>
<body>
<?php
$dao = new PDO("mysql:dbname=marissa;host=localhost;", "marissa", "LetMeIn!");
# But what if something is wrong??
?>
<h1>Select all posts correctly</h1>
<?php
$rows = $dao->query("SELECT * FROM posts"); ?>
<pre>
<?php var_dump($rows);
foreach($rows as $row) {
  var_dump($row);
}
?>
</pre>
<h1>Select all posts incorrectly</h1>
<?php
$rows = $dao->query("SELECT * FROM TABLE posts");
var_dump($rows);
# Returns false if failed. So we could say,
if($rows) {
  foreach($rows as $row) {
    var_dump($row);
  }
}
# But it is better to use an exception.
# FIRST, we need to enable exceptions in PDO object. Uncomment the line below.
# $dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
  $rows = $dao->query("SELECT * FROM TABLE posts");
  foreach($rows as $row) {
    var_dump($row);
  }
} catch (PDOException $e) {
  echo "<p>Failed to retrieve posts.</p>";
  # DO NOT PRINT ERROR MESSAGE TO USER!!!! Why?
}
?>

<h1>Select all posts and print in table</h1>
<?php
$dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
  $rows = $dao->query("SELECT * FROM posts"); ?>
  <table>
  <?php foreach($rows as $row) { ?>
    <tr>
      <td><?= $row['message']; ?></td>
      <td><?= $row['posted']; ?></td>
    </tr>
  <?php } ?>
  </table>
<?php
} catch (PDOException $e) {
  echo "<p>Failed to retrieve posts.</p>";
  # DO NOT PRINT ERROR MESSAGE TO USER!!!! Why?
}
?>

<h1>Select all posts and users and print in table</h1>
<?php
try {
  $rows = $dao->query("SELECT u.first_name, u.last_name, p.message, p.posted FROM posts AS p JOIN users AS u ON p.user_id = u.id"); ?>
  <table>
  <?php foreach($rows as $row) { ?>
    <tr>
      <td><?= $row['first_name'] . " " . $row['last_name']; ?></td>
      <td><?= $row['message']; ?></td>
      <td><?= $row['posted']; ?></td>
    </tr>
  <?php } ?>
  </table>
<?php
} catch (PDOException $e) {
  echo "<p>Failed to retrieve posts.</p>";
  # DO NOT PRINT ERROR MESSAGE TO USER!!!! Why?
}
?>

<h1>Add new post</h1>
<?php
try {
  // First, find out snoopy's id so we can use it when inserting his post.
  $result = $dao->query("SELECT id FROM users WHERE username = 'snoopy'");
  $row = $result->fetch();
  $user_id = $row['id'];
  // Then, add the post using his id.
  $count = $dao->exec("INSERT INTO posts (user_id, message) VALUES ($user_id, 'Woof woof woof!...woof.')");
  $id = $dao->lastInsertId();
?>
  <p>Added <?= $count ?> new messages with id: <?= $id ?></p>
<?php
  $result = $dao->query("SELECT message FROM posts WHERE id = $id");
  $row = $result->fetch();
?>
  <p><?= $row['message'] ?></p>
<?php
} catch (PDOException $e) {
  echo "<p>Failed to add new post.</p>";
  // echo "<p>" . $e->getMessage() . "</p>";
  # DO NOT PRINT ERROR MESSAGE TO USER!!!! Why?
}
?>

<h1>Add a form to select posts by username VULNERABLE</h1>
<form name="messageFilter" action="" method="GET">
    <div>
      Filter by (username): <input type="text" name="username">
      <input type="submit" name="filterButton" value="Filter">
    </div>
</form>
<div><strong>SQL Injection Alert</strong>
<p>
Exposing Data.
<ul>
  <li>Try filtering as: <code>' or '1' = '1</code></li>
  <li>Try filtering as: <code>' UNION SELECT password, age, first_name, last_name FROM users WHERE username='snoopy</code></li>
</ul>
</p>
<p>
Modifying or Destroying Data.
<ul>
<li>Try filtering as: <code>'; DROP TABLE posts; --</code></li>
</ul>
</div>
<h2>BAD Output</h2>
<?php
$username = isset($_GET['username']) ? $_GET['username'] : "";
if($username)
{
  try {
    $rows = $dao->query("SELECT u.first_name, u.last_name, p.message, p.posted FROM posts AS p
                        JOIN users AS u ON p.user_id = u.id
                        WHERE username = '$username'"); ?>
    <table>
    <?php foreach($rows as $row) { ?>
      <tr>
        <td><?= $row['first_name'] . " " . $row['last_name']; ?></td>
        <td><?= $row['message']; ?></td>
        <td><?= $row['posted']; ?></td>
      </tr>
    <?php } ?>
    </table>
  <?php
  } catch (PDOException $e) {
    echo "<p>Failed to retrieve posts.</p>";
    # DO NOT PRINT ERROR MESSAGE TO USER!!!! Why?
  }
} else {
  echo "<p>Username is empty</p>";
}
?>

<h2>Sanitized Output</h2>
<?php
$username = isset($_GET['username']) ? $_GET['username'] : "";
if($username)
{
  try {
    $safeusername = $dao->quote($username);
    $rows = $dao->query("SELECT u.first_name, u.last_name, p.message, p.posted FROM posts AS p
                        JOIN users AS u ON p.user_id = u.id
                        WHERE username = $safeusername"); ?>
    <table>
    <?php foreach($rows as $row) { ?>
      <tr>
        <td><?= $row['first_name'] . " " . $row['last_name']; ?></td>
        <td><?= $row['message']; ?></td>
        <td><?= $row['posted']; ?></td>
      </tr>
    <?php } ?>
    </table>
  <?php
  } catch (PDOException $e) {
    echo "<p>Failed to retrieve posts.</p>";
    # DO NOT PRINT ERROR MESSAGE TO USER!!!! Why?
  }
} else {
  echo "<p>Username is empty</p>";
}
?>


<h2>Best to use Prepared Statements</h2>
<?php
$username = isset($_GET['username']) ? $_GET['username'] : "";
if($username)
{
  try {
    $stmt = $dao->prepare("SELECT u.first_name, u.last_name, p.message, p.posted FROM posts AS p
                        JOIN users AS u ON p.user_id = u.id
                        WHERE username = ?");
    $stmt->execute(array($username));

    # OR
    // $stmt = $dao->prepare("SELECT u.first_name, u.last_name, p.message, p.posted FROM posts AS p
    //                     JOIN users AS u ON p.user_id = u.id
    //                     WHERE email = :uname");
    // $stmt->bindParam(":uname", $username);
    // $stmt->execute();

    # DONT FORGET TO USE STMT IN YOUR FOREACH LOOP
    ?>
    <table>
    <?php foreach($stmt as $row) { ?>
      <tr>
        <td><?= $row['first_name'] . " " . $row['last_name']; ?></td>
        <td><?= $row['message']; ?></td>
        <td><?= $row['posted']; ?></td>
      </tr>
    <?php } ?>
    </table>
  <?php
  } catch (PDOException $e) {
    echo "<p>Failed to retrieve posts.</p>";
    # DO NOT PRINT ERROR MESSAGE TO USER!!!! Why?
  }
} else {
  echo "<p>Username is empty</p>";
}
?>

<h1>Other commands</h1>
<?php
try {
  $rows = $dao->query("SELECT username, first_name, last_name FROM users WHERE gender = 'F'"); ?>
  <p>Row Count: <?= $rows->rowCount(); ?></p>
  <p>Column Count: <?= $rows->columnCount(); ?></p>
  <?php $first = $rows->fetch(); ?>
  <p>First Result: [username: <?= $first['username']; ?>, first_name: <?= $first['first_name']; ?>, last_name: <?= $first['last_name']; ?>]</p>
<?php
} catch (PDOException $e) {
  echo "<p>Failed to retrieve posts.</p>";
  # DO NOT PRINT ERROR MESSAGE TO USER!!!! Why?
}
?>

<h1>Close the connection when you are done.</h1>
<?php
$dao = NULL; #close it.
?>

</body>
</html>
