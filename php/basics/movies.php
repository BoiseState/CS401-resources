<html>
<head>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<?php
  //include('movie-table.php');
  //include_once('movie-table.php'); # RECOMMENDED
  //require('movie-table.php');
  require_once('movie-table.php'); # RECOMMENDED
?>
<h1>Favorite Movies</h1>
<?php
  printTable(); # Call function defined in movie-table.php.
?>

</body>
</html>
