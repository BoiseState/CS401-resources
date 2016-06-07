<?php
/* Set cookie parameters */
$cookieName = "username";
$cookieValue = "cookiemonster";
$timeStamp = time() + (86400 * 30); # 86400 secs = 1 day; expires in 30 days
$directory = "/"; # Note: the value "/" means that the cookie is available in entire website.

/* Set cookie if the user didn't send our other one back.
 * IMPORTANT: this must appear before the <html> tag. */
if(!isset($_COOKIE[$cookieName])) {
	setcookie($cookieName, $cookieValue, $timeStamp, $directory);
}

/* Delete cookie if we are done with it.
 * IMPORTANT: this must appear before the <html> tag. */
if(isset($_COOKIE[$cookieName])) {
	setcookie($cookieName, '', -1, $directory);
}
?>
<html>
	<head><title>Cookie Example: Simple Create</title></head>
<body>
<?php
if(!isset($_COOKIE[$cookieName])) { ?>
		<p>Cookie named '<?= $cookieName; ?>' is not set!</p>
		<p>Hint: You might have to reload the page to see the value of the cookie!</p>
<?php } else { ?>
		<p>Cookie '<?= $cookieName; ?>' is set!</p>
		<p>Value is: <?= $_COOKIE[$cookieName]; ?></p>
<?php } ?>
</body>
</html>
<!--
Challenge: How can you view and change the value of this cookie with your web browser?
Hint: In Chrome, find and open the Javascript console and enter:
document.cookie="username=bigbird". Then reload the page.
Now what do you see?
-->
