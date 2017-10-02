<?php
  include_once('User.php');
  include_once('Dao.php');

  $users = array(
    new User(10, "Test"),
    new User(123, "Snoopy", "snoopy@gmail.com", "thisi5s3cur3", array("MEMBER")),
    new User(456, "Cinderella", "cinderella@gmail.com", "pumpkin", array("ADMIN", "MEMBER"))
  );

  $dao = new Dao();

  foreach($users as $user) {
    try {
      $dao->addUser($user);
      echo "Added user: " . $user;
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }

?>

