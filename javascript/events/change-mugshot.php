<!DOCTYPE html>
<?php
date_default_timezone_set('America/Boise');
$image1= ['src' => 'images/yeti.jpg', 'alt' => 'yeti'];
$image2= ['src' => 'images/puppy.jpg', 'alt' => 'puppy'];

if($_POST && isset($_POST['currentImage'])) {
	if($_POST['currentImage'] == $image1['alt']) {
		$currentImage = $image2;
	} else {
		$currentImage = $image1;
	}
} else {
	$currentImage=$image1;
}
?>
<html>
<head>
	<title>PHP Example: Change Mugshot</title>
	<link href="style.css" rel="stylesheet" type="style/css" />
</head>
<body>
<div>
	<h1>Mugshot taken at <?= date("H:i:sa"); ?> in Boise, Idaho, USA. </h1>
	<img src="<?= $currentImage['src']; ?>" alt="<?= $currentImage['alt'] ?>" id="mugshot" >
	<form method="post" action="">
		<input type="submit" name="updateMugshot" value="Click here to update your mugshot!"></input>
		<input name="currentImage" type="hidden" value="<?= $currentImage['alt']; ?>" >
	</form>
	<p></p>
</div>
</body>
</html>
