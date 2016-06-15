<?php
$lines = file("instagram-client.txt");
$CLIENT_ID = trim(explode(", ", $lines[0])[1]);	
$redirect_uri = "http://webdev01.boisestate.edu/CS401-resources/apis/authorize.php";
$url = "https://www.instagram.com/oauth/authorize/?client_id=$CLIENT_ID&redirect_uri=$redirect_uri&response_type=code&scope=basic+public_content";
?>
<a href="<?= $url ?>">Authorize</a>
