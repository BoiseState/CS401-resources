<?php
require_once('Dao.php');
try
{
  $dao = new Dao();
} catch(PDOException $e) {
  echo "<p>Please try again later.</p>";
  die();
}
?>
<form name="messageFilter" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET">
<div>
  Filter by (username): <input type="text" name="username">
  <input type="submit" name="filterButton" value="Filter">
</div>
</form>
<?php
try {
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


