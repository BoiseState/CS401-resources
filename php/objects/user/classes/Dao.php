<?php
require_once "User.php";

class Dao
{
  // file containing serialized User objects
  private $usersFile = "users.txt";

  // serializes and adds user to file if they don't already exist.
  public function addUser($user)
  {
    if($this->getUser($user->getEmail())) {
      throw new Exception("User exists: " . $user->getEmail());
    } else {
      $u = serialize($user) . "\n";
      file_put_contents($this->usersFile, $u, FILE_APPEND | LOCK_EX);
    }
  }

  // reads user from file. returns false if user doesn't exist.
  public function getUser($email)
  {
    $users = file($this->usersFile);
    if($users)
    {
      foreach ($users as $user) {
        // recreate User object
        $user = unserialize($user);
        if ($email == trim($user->getEmail())) {
          // user email found, return the object
          return $user;
        }
      }
      return false;
    }
    return false;
  }

}