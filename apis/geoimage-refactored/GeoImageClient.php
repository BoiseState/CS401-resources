<?php

class GeoImageClient
{
	private static function getClientInfo($json = "instagram-client.json")
	{
		return json_decode(file_get_contents($json), true);
	}

	public static function authorize()
	{
		error_log("[GeoImageClient] Authorizing...");
		$client = self::getClientInfo();
		$endpoint = "https://www.instagram.com/oauth/authorize/"; 
		$params = [
			"client_id" => $client['client_id'],
			"redirect_uri" => $client['redirect_uri'],
			"response_type" => "code",
			"scope" => "basic public_content"
		];	
		$url = $endpoint . '?' . http_build_query($params);
		header("Location: $url"); die;
	}

	public static function requestAccessToken($code)
	{
		$client = self::getClientInfo();
		error_log("[GeoImageClient]: Requesting access token using code: " . $code);
		$endpoint =  "https://api.instagram.com/oauth/access_token";
		$params = [
			"client_id" => $client['client_id'],
			"client_secret" => $client['client_secret'],
			"grant_type" => "authorization_code",
			"redirect_uri" => $client['redirect_uri'], 
			"code" => $code
		];

		// Initialize curl for sending POST request
		$ch = curl_init($endpoint);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Execute curl request
		$response = curl_exec($ch);

		// Decode response into array
		$json = json_decode($response, true);
		error_log("[GeoImageClient] Access token response " . $response);

		// Store the access_token in our session
		$_SESSION['access_token'] = $json['access_token'];
	}

	private static function get($endpoint, $params)
	{
		$url = $endpoint . '?' . http_build_query($params);

		error_log("[GeoImageClient] GET : $url");
		$response = file_get_contents($url);
		error_log("[GeoImageClient] Response : $response");

		return json_decode($response, true);
	}	

	public static function getPicturesByLocation($lat, $lng)
	{
		$endpoint = "https://api.instagram.com/v1/media/search"; 
		$params = [
			"lat" => $lat,
			"lng" => $lng,
			"access_token" => $_SESSION['access_token']
		];
		return self::get($endpoint, $params);
	}

	public static function getLikedPictures()
	{
		$endpoint = "https://api.instagram.com/v1/users/self/media/liked"; 
		$params = [ "access_token" => $_SESSION['access_token'] ];
		return self::get($endpoint, $params);
	}

	public static function getRecentPictures()
	{
		$endpoint = "https://api.instagram.com/v1/users/self/media/recent"; 
		$params = [ "access_token" => $_SESSION['access_token'] ];
		return self::get($endpoint, $params);
	}

	public static function getGeoCoordinates($location = "Boise State University")
	{
		$endpoint = "https://maps.googleapis.com/maps/api/geocode/json";
		$params = [ "address" => htmlspecialchars($location) ];
		$response = self::get($endpoint, $params);
		if(!empty($response['results'])) {
			return $response['results'][0]['geometry']['location'];
		} else {
			return false;
		}
	}
}
