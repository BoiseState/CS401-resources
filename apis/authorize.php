<?php
	session_start();

	$lines = file("instagram-client.txt");
	$CLIENT_ID = trim(explode(", ", $lines[0])[1]);	
	$CLIENT_SECRET = trim(explode(", ", $lines[1])[1]);	
	
	$params = array(
		 "client_id" => $CLIENT_ID,
		 "client_secret" => $CLIENT_SECRET,
		 "grant_type" => "authorization_code",
		 "redirect_uri" => "http://webdev01.boisestate.edu/CS401-resources/apis/authorize.php", 
		 "code" => $_GET['code']);

	$pageurl = "https://api.instagram.com/oauth/access_token";
	$ch = curl_init($pageurl);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	$json = json_decode($response, true);
	$_SESSION['access_token'] = $json['access_token'];
	header("Location: geoimage.php");	
?>
