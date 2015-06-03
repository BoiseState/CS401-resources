<?php
// logout.php
session_start();
session_destroy();
session_regenerate_id(TRUE); # nuke old session
header("Location:login.php");
?>
