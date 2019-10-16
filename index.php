<html lang="en">
<head>
  <title>CS401 Examples</title>
  <link href="style.css" type="text/css" rel="stylesheet">
  <meta charset="UTF-8">
</head>
<body>
<div class="flex-container">
<?php
  // $dirs = glob("*", GLOB_ONLYDIR);
  $dirs = array("html-css", "php", "sql", "javascript", "apis");
  foreach($dirs as $dir) {
?>
	<a class="flex-item" href="<?= $dir ?>"><?= $dir ?></a> 
<?php
  }
?>
</div>
</body>
</html>
