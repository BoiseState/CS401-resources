<?php
if(isset($_POST)) {
  if(isset($_POST['submitButton'])) {
    echo "Success!";
    # JUST FOR SIMPLE DEMO. We would want to use sessions to pass information
    # back to form instead of url params.
    header("Location: form-validation.php?success=" . htmlspecialchars($_POST['name']) );
  }
}
?>
