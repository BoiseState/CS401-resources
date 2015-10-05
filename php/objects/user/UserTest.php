<?php
  include_once('User.php');

  $user = new User();
  $user1 = new User(123, "snoopy@gmail.com", "thisi5s3cur3");
  // $user2 = new User(456, "cinderella@gmail.com", "pumpkin", "Cinderella");
?>
<html>
<head></head>
<body>
  <pre>
<?php
  //var_dump($user);
  //var_dump($user1);
  echo "$user\n"; // uses __toString method

  if($user1->validatePassword("thisi5s3cur3")) {
    echo "Passwords match. Welcome!";
  } else {
    echo "Invalid password. Please try again.";
  }
?>
</pre>
</body>
</html>
