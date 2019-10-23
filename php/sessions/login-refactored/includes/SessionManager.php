<?php
class SessionManager
{
  /**
   * Starts a new session if one isn't already started.
   */
  public static function startSession()
  {
    if(session_status() == PHP_SESSION_NONE) {
      session_start();
    }
  }

  /**
   * Adds the key value pair to the SESSION array.
   * @param String key
   * @param value
   */
  public static function setValue($key, $value)
  {
    $_SESSION[$key] = $value; 
  }

  /**
   * Prints preset for given SESSION key (if one exists).
   */
  public static function preset($key) {
    if(isset($_SESSION['presets'][$key]) && !empty($_SESSION['presets'][$key])) {
      echo 'value="' . $_SESSION['presets'][$key] . '" ';
    }
  }

  /**
   * Prints error for given SESSION key (if one exists).
   */
  public static function displayError($key) {
    if(isset($_SESSION['errors'][$key])) { ?>
      <span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['errors'][$key] ?></span>
    <?php }
  }

  /**
   * Clears error data from session when we are done so they don't show
   * up on refresh or if user submits correct info next time around.
   */
  public static function clearErrors() {
    unset($_SESSION['errors']);
    unset($_SESSION['presets']);
  }
}
