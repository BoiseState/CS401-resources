<?php
/**
 * Wrappers around header function to simplify calls.
 */
class PhpHeader
{
  public static function redirectError($location, $errors, $presets = NULL)
  {
    $_SESSION['errors'] = $errors;
    if($presets) {
      $_SESSION['presets'] = $presets;
    }
    header("Location: $location");
    die;
  } 

  public static function redirectSuccess($location, $user = NULL) {
    if($user) {
      $_SESSION['user'] = $user;
    }
    header("Location: $location");
    die;
  }
}
