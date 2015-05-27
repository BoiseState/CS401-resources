<?php
// $result = $dao->exec("INSERT INTO posts (user_id, message) VALUES (1, 'Woof woof woof!...woof.')");
//
// $id = $dao->lastInsertId();
//
// $inserted = $dao->query("SELECT * FROM posts WHERE id = '$id'");
// while($row = $inserted->fetch())
// {
//   echo "<p> You inserted: " . $row['message'] ."</p>";
// }
//
// $dao->exec("DELETE FROM posts WHERE id = '$id'");
//
//
//
//
?>
<?php require_once('Dao.php'); ?>
  <form name="messageFilter" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET">
  <div>
    Filter by (username): <input type="text" name="username">
    <input type="submit" name="filterButton" value="Filter">
  </div>
  </form>
<?php
# SET UP CONNECTION
try
{
  $dao = new Dao();
} catch(PDOException $e) {
  echo "<p>Please try again later.</p>";
  die();
}

# GET USERNAME TO FILTER BY

# DO QUERY
try {

  // $cleanusername = $dao->quote($username);
  // echo "$cleanusername";
  // $result = $dao->query("SELECT u.name, p.message, p.posted
  //   FROM posts AS p JOIN users AS u ON p.user_id = u.id
  //   WHERE u.username = '$cleanusername'");

$results = $dao->getPostsByUsername($_GET['username']);
?>
<table>
<?php
  foreach($results as $row) {?>
  <tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['message'] ?></td>
    <td><?= $row['posted'] ?></td>
  </tr>
  <?php
  }?>
</table>
<?php
} catch (PDOException $e)
{
  echo "<p>Failed to retrieve posts. Please come back later.</p>";
}

$dao = NULL;
?>


