<?php

class Lockbox {

  private $key = false;
  static private $available = true;
  static private $locked = false;

  public function __construct () {
    // no-op
  }

  public function getKey () {
    if (self::$available) {
      $this->key = true;
      self::$available = false;
      echo "I now have the key!\n";
    } else {
      echo "Sombody else already has the key!\n";
    }
  }

  public function unlock () {
    if ($this->key) {
      self::$locked = false;
      echo "I unlocked it!\n";
    } else {
      echo "I can't inlock it, I don't have the key!\n";
    }
  }

  public function lock () {
    if ($this->key) {
      self::$locked = true;
      echo "I locked it!\n";
    } else {
      echo "I can't unlock it, I need the key!\n";
    }
  }

} // end Lockbox

// sample usage
$alice = new Lockbox();
$bob = new Lockbox();

$alice->getKey(); // I now have the key!
$bob->getKey(); // Sombody else already has the key!
$bob->lock(); // I can't lock it, I need the key!
$alice->lock(); // I locked it!
$bob->unlock(); // I can't unlock it. I don't have the key!
$alice->unlock(); // I unlocked it!

?>
