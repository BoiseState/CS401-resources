<h1>All Posts</h1>
<?php
try {
    # CHANGE THIS TO USE Dao.
    $dao = new PDO("mysql:dbname=marissa;host=localhost;", "marissa", "mysqlpass");
    $rows = $dao->query("SELECT p.id, u.name, p.message, p.posted FROM posts AS p
        JOIN users AS u ON p.user_id = u.id");
    ?>
    <table>
    <?php foreach($rows as $row) { ?>
      <tr>
        <td><?= $row['name']; ?></td>
        <td><?= $row['message']; ?></td>
        <td><?= $row['posted']; ?></td>
        <td>
          <form name="postForm" action="handler.php" method="POST">
            <input type="hidden" name="id" value="<?= $row['id']; ?>">
            <input type="submit" name="deleteButton" value="Delete">
            <input type="submit" name="modifyButton" value="Modify">
          </form>
      </tr>
    <?php } ?>
    </table>
  <?php
  } catch (PDOException $e) {
    echo "<p>Failed to retrieve posts.</p>";
    # DO NOT PRINT ERROR MESSAGE TO USER!!!! Why?
  }
?>
