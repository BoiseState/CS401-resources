<?php
include_once('Role.php');
/**
 * Represents a user.
 * PHP classes are generally defined in their own php files and included
 * in client code files. (Similar to Java)
 */
class User
{
  // Fields (can be public or private)
  // id, email, password
  private $id;
  private $name;
  private $email;
  private $password;
  private $permissions;

  // Magic Functions
  // __construct (must use $this->field)
  public function __construct($id, $name, $email = "", $password = "", $permissions = array())
  {
    $this->id = $id;
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $this->permissions = $permissions;
  }
  //__toString
  public function __toString()
  {
    return "[id=$this->id, name=$this->name, email=$this->email]";
  }

  public function printUserInfo()
  {
    return "$this->name ($this->email)";
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function addRoles($roles)
  {
    $this->permissions = array_merge($this->permissions, $roles);
  }

  public function deleteRoles($roles)
  {
    $this->permissions = array_merge($this->permissions, $roles);
  }

  public function hasPermission($role)
  {
    return in_array($role, $this->permissions);
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

// Don't close php block in class files.
