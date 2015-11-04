<?php
# First, redirect client to log in to instagram.


# Google Maps API Request
$maps_url = "https://maps.googleapis.com/maps/api/geocode/json?address="
            . urlencode($_GET['location']);
$maps_json = file_get_contents($maps_url);
$maps_array = json_decode($maps_json, true);
$lat = $maps_array['results'][0]['geometry']['location']['lat'];
$lng = $maps_array['results'][0]['geometry']['location']['lng'];

# Instagram API Request
# Need to generate your own client id (https://instagram.com/developer).
$instagram_client_id="8ec36eb2cd0b4615878bbd8b7abda7d4";
$instagram_url = "https://api.instagram.com/v1/media/search" .
                  "?lat=$lat&lng=$lng&client_id=$instagram_client_id";
$instagram_json = file_get_contents($instagram_url);
$instagram_array = json_decode($instagram_json, true);

# Display images.
if(!empty($instagram_array)){
  foreach($instagram_array['data'] as $key=>$image){
    echo '<img src="'.$image['images']['low_resolution']['url'].'" alt=""/><br/>';
  }
}
?>
