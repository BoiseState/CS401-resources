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
<form name="messageFilter" action="" method="GET">
<div>
  Filter by (username): <input type="text" name="username">
  <input type="submit" name="filterButton" value="Filter">
</div>
</form>
<?php
if(isset($_GET['username']) && !empty($_GET['username']))
{
  $username = htmlspecialchars($_GET['username']);
  try {
    $results = $dao->getPostsByUsername($username);
    ?>
    <table>
    <?php
      foreach($results as $row) {?>
      <tr>
        <td><?= $row['first_name'] . " " . $row['last_name'] ?></td>
        <td><?= $row['message'] ?></td>
        <td><?= $row['posted'] ?></td>
      </tr>
      <?php
      }?>
    </table>
    <?php
  } catch (PDOException $e) {
    echo $e->getMessage();
    echo "<p>Failed to retrieve posts. Please come back later.</p>";
  }
}

$dao = NULL;
?>


