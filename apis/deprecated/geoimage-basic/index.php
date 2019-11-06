<?php
$appID = "580179906069464";
$redirectURI = urlencode($_SERVER['HTTP_REFERER'] . "auth/");

$url = "https://api.instagram.com/oauth/authorize?app_id=$appID&redirect_uri=$redirectURI&response_type=code&scope=user_profile,user_media";
?>
<a href="<?= $url ?>">Authorize</a>
