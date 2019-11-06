<?php
	session_start();
	$clientJson = json_decode(file_get_contents("instagram-client.txt"), true);

	$CLIENT_ID = $clientJson['client_id'];
	$CLIENT_SECRET = $clientJson['client_secret']; 
	$REDIRECT_URI = $_SERVER['HTTP_REFERER'] . "authorize.php";
	
	$requestBody = array(
		 "client_id" => $CLIENT_ID,
		 "client_secret" => $CLIENT_SECRET,
		 "grant_type" => "authorization_code",
		 "redirect_uri" => "$REDIRECT_URI", 
		 "code" => htmlspecialchars($_GET['code']));
	$requestUrl = "https://api.instagram.com/oauth/access_token";

	$curl = curl_init($requestUrl);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $requestBody);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$response = curl_exec($curl);
	$json = json_decode($response, true);

	$_SESSION['access_token'] = $json['access_token'];

	header("Location: geoimage.php");	
?>
