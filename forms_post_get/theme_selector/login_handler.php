<?php
  $username = $_POST['username'];
  $password = $_POST['password'];
  $view = $_POST['view'];

  switch($view) {
    case "cosmic":
      $style = "cosmic.css";
      $message = "Live long and prosper.";
      break;
    case "fantastical":
      $style = "fantastical";
      $message = "Not all those who wander are lost. Enjoy your journey!";
      break;
   default:
      $style = "style.css";
      $message = "Have a great day!";  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Welcome Page</title>
  <link href="css/<?= $style ?>" rel="stylesheet" type="text/css" />
</head>
<body>
  <h1>Welcome <?= $username ?>!</h1>
  <p><?= $message ?></p>
</body>
</html>
