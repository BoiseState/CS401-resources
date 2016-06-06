<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  $cookie_name = "username";

  # If modification to cookie's value is made, store it. */
  if(isset($_POST["submit_modify"]))
  {
    $cookie_value = isset($_POST["cookie_value"]) ? $_POST["cookie_value"] : "";
    $time_stamp = time() + (86400 * 30); // 86400 = 1 day; expires in 30 days
    $directory = "/"; // Note: the value "/" means that the cookie is available in entire website

	  /* Set cookie (this must appear before the <html> tag) */
	  setcookie($cookie_name, $cookie_value, $time_stamp, $directory);
  }

  # If received post from delete form, then delete cookie
  if(isset($_POST["submit_delete"]))
  {
 	  $cookie_name = $_POST["cookie_name"];

	  # To delete the cookie, in this following order, use the unset function and then
	  # setcookie() function with an expiration date in the past (i.e. 3600 = 1 hour ago)
	  // unset($_COOKIE[$cookie_name]);
	  setcookie($cookie_name, "", time() - 3600, "/");
  }
}
# Go back to the form page
header("Location: modify_cookie_with_form.php");
die();
