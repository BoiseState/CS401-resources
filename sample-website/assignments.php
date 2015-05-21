<?php
$thisPage = 'Assignments';
?>
<?php require_once('phpincludes/header.php'); ?>
<?php require_once('phpincludes/nav.php'); ?>
<?php require_once('phpincludes/print-helpers.php'); ?>

  <div class="content">
  <?php
    printAssignmentTable(); # calling function defined in print-helpers.php
  ?>
  </div>

<?php require_once('phpincludes/footer.php'); ?>
