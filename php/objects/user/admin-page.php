<?php
  include('classes/Role.php');
  include('classes/Dao.php');

  // User's login email. Would change based on who is logged in.
  //$email = "snoopy@gmail.com";
  $email = "cinderella@gmail.com";

  // Create Data Access Object instance.
  $dao = new Dao();

  // Check if user exists and user has correct permission.
  try {
    $user = $dao->getUser($email);
    if($user->hasPermission(Role::ADMIN)) {
      echo $user->printUserInfo() . " has permission!";
    } else {
      echo $user->printUserInfo() . " does not have permission";
      die; // don't load the page.
    }
  } catch(Exception $e) {
    echo $e->getMessage();
    die;
  }
?>
<html>
<head></head>
<body>
  <!-- Page content for admin only -->
  <h1>This is for your eyes only!</h1>
</body>
</html>