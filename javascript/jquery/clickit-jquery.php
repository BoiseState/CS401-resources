<?php
$page = "Click It!";
?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"
        defer></script>
<script src="js/clickit.js" defer></script>
<body>
  <?php include('includes/nav.php');?>
  <header>
    <h1>Blog</h1>
  </header>
  <main>
  <form method="POST" >
    <input type="text"></input>
    <button>Click Me!</button>
  </form>
  </main>
  <?php include('includes/footer.php'); ?>
</body>
</html>
