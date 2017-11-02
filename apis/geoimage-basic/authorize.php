<?php
	session_start();
	$clientJson = json_decode(file_get_contents("instagram-client.txt"), true);

	$CLIENT_ID = $clientJson['client_id'];
	$CLIENT_SECRET = $clientJson['client_secret']; 
	$REDIRECT_URI = $_SERVER['HTTP_REFERER'] . "authorize.php";
	
	$params = array(
		 "client_id" => $CLIENT_ID,
		 "client_secret" => $CLIENT_SECRET,
		 "grant_type" => "authorization_code",
		 "redirect_uri" => "$REDIRECT_URI", 
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
