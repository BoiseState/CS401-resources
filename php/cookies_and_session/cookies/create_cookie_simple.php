<?php
/* Set cookie parameters */
$cookie_name = "username";
$cookie_value = "cookiemonster";
$time_stamp = time() + (86400 * 30); # 86400 secs = 1 day; expires in 30 days
$directory = "/"; # Note: the value "/" means that the cookie is available in entire website.

/* Set cookie if the user didn't send our other one back.
 * IMPORTANT: this must appear before the <html> tag. */
if(!isset($_COOKIE[$cookie_name])) {
  setcookie($cookie_name, $cookie_value, $time_stamp, $directory);
}
?>
<html>
<head><title>Cookie Example: Simple Create</title></head>
<body>
<?php
if(!isset($_COOKIE[$cookie_name])) { ?>
    <p>Cookie named '<?php echo $cookie_name; ?>' is not set!</p>
    <p>Hint: You might have to reload the page to see the value of the cookie!</p>
<?php } else { ?>
    <p>Cookie '<?php echo $cookie_name; ?>' is set!</p>
    <p>Value is: <?php echo $_COOKIE[$cookie_name]; ?></p>
<?php } ?>
</body>
</html>
<!--
Challenge: How can you view and change the value of this cookie with your web browser?
Hint: In Chrome, find and open the Javascript console and enter:
document.cookie="username=bigbird". Then reload the page.
Now what do you see? How can you do this in other browsers?
-->

