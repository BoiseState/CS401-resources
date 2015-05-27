<?php
class Dao {

  private function getConnection()
  {
    return new PDO("mysql:dbname=marissa;host=localhost;", "marissa", "password");
  }
}

?>
