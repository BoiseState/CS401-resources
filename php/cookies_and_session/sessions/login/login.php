<?php
# start a new session.
session_start();

# var_dump($_SESSION);

# Check if user is already logged in. If they are, redirect them to the
# correct location.
if(isset($_SESSION['access_granted']) && $_SESSION['access_granted']) {
  header("Location: granted.php");
  die;
}

# We will get here if login was not successful. Get the preset value to
# auto-populate previously entered form values.
$email = isset($_SESSION['email_preset']) ? $_SESSION['email_preset'] : "";

# Check if there are any errors stored in the session.
$errorEmail = $errorPassword = "";
if (isset($_SESSION['error_email']))
{
  $errorEmail = $_SESSION['error_email'];
  unset($_SESSION['error_email']);
}
if(isset($_SESSION['error_password']))
{
  $errorPassword = $_SESSION['error_password'];
  unset($_SESSION['error_password']);
}

# Get the status variable (if any).
$status = "";
if(isset($_SESSION['status']))
{
  $status = $_SESSION['status'];
  unset($_SESSION['status']);
}
?>

<html>
  <?php include_once('header.php'); ?>
  <body>
    <h1>Login to my Secret System</h3>
    <div id="status"><?= $status; ?></div>
  </body>
  <form action="login_handler.php" method="POST">
    <div>
      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="<?= $email; ?>"/>
      <span class="error" id="errorEmail">
      <?= $errorEmail; ?>
      </span>
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" name="password" id="password" value=""/>
      <span class="error" id="errorPassword">
        <?= $errorPassword; ?>
      </span>
    </div>
    <div>
      <input type="submit" name="submit" id="login" value="Login"/>
    </div>
  </form>
</html>
