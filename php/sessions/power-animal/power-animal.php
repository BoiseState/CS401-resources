<?php
$animals = array("bee", "llama", "octopus", "rabbit", "squirrel", "yak");
session_start();
if (isset($_REQUEST["erase"])) {
  session_destroy();   # user submitted form back to erase data
  session_regenerate_id(TRUE);
  session_start();     # nuke old session and start a new session
}

# check whether the user has ever visited the page before in this session
if (!isset($_SESSION["poweranimal"]) || !isset($_SESSION["views"])) {
  # new user; set up session data, choose random power animal
  $_SESSION["poweranimal"] = $animals[rand(0, count($animals) - 1)];
  $_SESSION["views"] = 1;
} else {
  $_SESSION["views"]++;   # returning user
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
	<title>Power Animal Finder - Find your power animal!</title>
  </head>

  <body>
    <h1>Power Animal Finder</h1>

    <?php if ($_SESSION["views"] == 1) { ?>
      <p>Welcome to our site, new visitor!</p>
    <?php } else { ?>
      <p>Welcome back! This is your visit #<?= $_SESSION["views"] ?>.
    <?php } ?>

    <p>Your power animal is the <strong><?= $_SESSION["poweranimal"] ?></strong>!</p>
    <p><img src="<?= $_SESSION["poweranimal"] ?>.png" alt="power animal" /></p>

    <form action="">
      <div><input type="submit" value="Reload" /></div>
      <div><label><input type="checkbox" name="erase" /> Start over?</label></div>
    </form>
  </body>
</html>
