<?php
  include_once('User.php');

  $user = new User();
  var_dump($user);
  //echo "$user\n"; // uses __toString method

  // $user1 = new User(123, "snoopy@gmail.com", "thisi5s3cur3");
  // $user2 = new User(456, "cinderella@gmail.com", "pumpkin", "Cinderella");

  // if($user1->validatePassword("thisi5s3cur3")) {
  //   echo "Passwords match. Welcome!";
  // } else {
  //   echo "Invalid password. Please try again.";
  // }
?>
