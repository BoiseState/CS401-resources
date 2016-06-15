<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Geoimage Demo</title>
	<style>
	.image {
		display: inline-block;
		width: 40%;
		text-align: center;
		border: 1px solid grey;
		padding: 10px;
		margin: 10px;
		border-radius: 5px;
	}
	img {
		border-radius: 5px;
	}
	</style>
</head>
<body>
<?php
if(isset($_GET['submit'])) {
	if(isset($_GET['location'])) {
		$location = $_GET['location'];
		if(empty($location)) {
			$location_error = "Please enter a valid location";
		} else {
			# Google Maps API Request
			$maps_url = "https://maps.googleapis.com/maps/api/geocode/json?address="
									. urlencode($_GET['location']);
			$maps_json = file_get_contents($maps_url);
			$maps_array = json_decode($maps_json, true);
			if(!empty($maps_array['results'])) {
				$lat = $maps_array['results'][0]['geometry']['location']['lat'];
				$lng = $maps_array['results'][0]['geometry']['location']['lng'];

				# Instagram API Request
				$instagram_access_token=$_SESSION['access_token'];
				$instagram_url = "https://api.instagram.com/v1/media/search" .
					"?lat=$lat&lng=$lng&access_token=$instagram_access_token";
				$instagram_json = file_get_contents($instagram_url);
				$instagram_array = json_decode($instagram_json, true);
			} else {
				$location_error = "Location not found: $location";		
			}
		}
	}
}
?>
<form method="GET">
	<label for="location">Enter Location:</label>
	<input type="input" name="location" id="location" />
	<input type="submit" name="submit" value="Find Photos" />
	<span><?= isset($location_error) ? $location_error : "" ?></span>
</form>
<?php
	# Display images.
	if(isset($instagram_array) && !empty($instagram_array)){
?>
<h1>Images around <?= $location ?> </h1>
<?php
		foreach($instagram_array['data'] as $key=>$image){ ?>
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
