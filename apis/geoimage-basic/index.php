<?php
$json = json_decode(file_get_contents("instagram-client.txt"), true);

$CLIENT_ID = $json['client_id'];	
$REDIRECT_URI = $_SERVER['HTTP_REFERER'] . "authorize.php";

$url = "https://www.instagram.com/oauth/authorize/?client_id=$CLIENT_ID&redirect_uri=$REDIRECT_URI&response_type=code&scope=basic+public_content";
?>
<a href="<?= $url ?>">Authorize</a>
