<?php
class User {

  const GUEST = "GUEST";
  const MEMBER = "MEMBER";
  const ADMIN = "ADMIN";

  private $name;
  private $email;
  private $permissions;

  public function __construct ($name, $email, $permissions = array()) {
    $this->name = $name;
    $this->email = $email;
    $this->permissions = $permissions;
  }

  public function getEmail() {
    return $this->email;
  }

  public function hasPermission ($permission){
    // return true if permission is found
    return in_array($permission, $this->permissions);
  }

} // end User

?>
