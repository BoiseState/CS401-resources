<?php
require 'GeoImageClient.php';

session_start();

if(isset($_GET['submit']) && isset($_GET['location'])) {
	$location = $_GET['location'];
	if(empty($location)) {
		$location_error = "Please enter a valid location";
	} else {
		error_log("Retrieving coordinates");
		$coords = GeoImageClient::getGeoCoordinates($_GET['location']);
		if($coords) {
			error_log("Retrieving images");
			$pictures = GeoImageClient::getPicturesByLocation($coords['lat'], $coords['lng']);
		} else {
			$location_error = "Location not found: $location";		
		}
	}
} else {
	$pictures = GeoImageClient::getRecentPictures();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Geoimage Demo</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method="GET">
	<label for="location">Enter Location:</label>
	<input type="input" name="location" id="location" />
	<input type="submit" name="submit" value="Find Photos" />
	<span><?= isset($location_error) ? $location_error : "" ?></span>
</form>
<pre>
<?php
	# Display images.
	if(isset($pictures) && !empty($pictures)){
?>
<h1>Images around <?= $location ?> </h1>
<?php
		foreach($pictures['data'] as $key=>$image){ ?>
		<!--<?php var_dump($image);?></pre>-->
		<div class="image">
				<p> <?= $image['caption']['from']['username'] ?></p>
				<img src="<?= $image['images']['low_resolution']['url'] ?>" alt=""/> 
				<p> <?= $image['caption']['text'] ?></p>
				<p>Likes: <?= $image['likes']['count'] ?></p>
		</div>
		<?php }
	}
?>
</body>
</html>
