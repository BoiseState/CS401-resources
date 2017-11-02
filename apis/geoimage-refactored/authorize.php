<?php
session_start();

require 'GeoImageClient.php';

if(isset($_GET['code'])) { // got here from instagram redirect.
	GeoImageClient::requestAccessToken($_GET['code']);
	header("Location: geoimage.php"); die;	
} else { // user navigated here or something went wrong. go back to index. 
	header("Location: index.php"); die;	
}
?>
