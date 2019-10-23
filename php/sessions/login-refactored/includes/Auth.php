<?php
require_once('includes/SessionManager.php');
require_once('includes/PhpHeader.php');

class Auth 
{
  /**
   * Regenerates the session id and sets the login flag to true.
   */
  public static function login($email) {
    session_regenerate_id(true);
    $_SESSION["access_granted"] = true;
  }

  /**
   * Destroys the session.
   */
  public static function logout() {
    // Unset all of the session variables.
    session_unset();

    // make sure a new id is used on next login
    session_regenerate_id(true);

    // Destroy the session data on the server 
    session_destroy();
  }

  /**
   * Validates that the user has a valid session with access granted.
   */
  public static function hasAccess() {
    if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"] === true) {
      //can also verify USER_AGENT and IP are the same.
      return true;
    } else {
      return false;
    }
  }
}
