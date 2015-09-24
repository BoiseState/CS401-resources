<?php
function print_user_table_included($filename = "users.txt")
{
  $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  $header = array_shift($lines);
  $values = explode("|", $header); ?>
  <table>
    <tr><th><?= $values[0] ?></th><th><?= $values[1] ?></th></tr>
    <?php foreach($lines as $line) {
      list($user, $alias) = explode("|", $line); ?>
      <tr><td><?= $user ?></td><td><?= $alias ?></td></tr>
    <?php } ?>
  </table>
<?php } ?>
