<?php
/**
 * Represents a user.
 * PHP classes are generally defined in their own php files and included
 * in client code files. (Similar to Java)
 */
class User {
  // Fields (can be public or private)
  // id, email, password
  private $id;
  private $email;
  private $password;

  // Magic Functions
  // __construct (must use $this->field)
  public function __construct($id = 0, $email = "", $password = "")
  {
    $this->id = $id;
    $this->email = $email;
    $this->password = $password;
  }
  //__toString
  public function __toString()
  {
    return "[id=$this->id, email=$this->email]";
  }

  // Methods (can be public or private)
  // validatePassword
  public function validatePassword($password)
  {
    if($this->password === $password)
    {
      return true;
    }
      return false;
  }
}
?>
