<?php
function printAssignmentTable($filename = 'resources/assignments.txt')
{
  if(!file_exists($filename))
  { ?>
    <p>No assignments posted</p>
  <?php
    } else {
    ?>
    <table>
      <tr><th>Assignment</th><th>Due Date</th></tr>
    <?php
      $lines = file($filename);
      foreach($lines as $line) {
        list($name, $path, $duedate) = explode("|", $line); ?>
        <tr><td><a href="<?= $path; ?>"><?= $name; ?></a></td><td><?= $duedate; ?></td></tr>
    <?php } ?>
    </table>
  <?php }
}
?>
