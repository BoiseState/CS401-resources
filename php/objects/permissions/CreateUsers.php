<?php

require_once('Dao.php');

$dao = new Dao();

$users = array();

$users[] = new User('Fred Flintstone', 'fred@gmail.com', [User::MEMBER]);

$users[] = new User('Pebbles Flintstone', 'pebbles@gmail.com', [User::MEMBER]);

$users[] = new User('Barney Rubble', 'barney@gmail.com');

foreach($users as $user) {
  $dao->addUser($user);
}
?>
