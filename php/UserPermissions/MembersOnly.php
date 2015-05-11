<?php
// this page requires a user with the MEMBER permission to view
require_once "Dao.php";

$dao = new Dao();
try {
  // get the user object from the data store
  $user = $dao->getUser("theeye@mordor.net");
  if ($user->hasPermission(User::MEMBER)) {
    echo "User has the permission";
  } else {
    echo "User does NOT have the permission";
  }

} catch (Exception $e) {
  echo $e->getMessage();
}

?>

<html>
  <head></head>
  <body>
    <!-- page content for members only-->
  </body>
</html>
