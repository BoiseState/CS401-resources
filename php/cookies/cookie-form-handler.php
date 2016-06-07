<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$cookieName = "username";

	# If modification to cookie's value is made, store it. */
	if(isset($_POST["submitModify"]))
	{
		$cookieValue = isset($_POST["cookieValue"]) ? $_POST["cookieValue"] : "";
		$timeStamp = time() + (86400 * 30); // 86400 = 1 day; expires in 30 days
		$directory = "/"; // Note: the value "/" means that the cookie is available in entire website

		/* Set cookie (this must appear before the <html> tag) */
		setcookie($cookieName, $cookieValue, $timeStamp, $directory);
	}

	# If received post from delete form, then delete cookie
	if(isset($_POST["submitDelete"]))
	{
 		$cookieName = $_POST["cookieName"];

		# To delete the cookie, in this following order, use the unset function and then
		# setcookie() function with an expiration date in the past (i.e. 3600 = 1 hour ago)
		// unset($_COOKIE[$cookie_name]);
		setcookie($cookieName, "", time() - 3600, "/");
	}
}
# Go back to the form page
header("Location: modify-cookie-with-form.php");
die();
