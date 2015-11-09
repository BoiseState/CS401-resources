<!DOCTYPE html>
<?php
$image1="images/yeti.jpg";
$image2="images/puppy.jpg";

if($_POST && isset($_POST['currentImage'])) {
  if($_POST['currentImage'] == $image1) {
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
  <style>
    #mugshot {
      width: 600px;
      height: 500px;
    }
  </style>
</head>
<body>
<div>
  <h1>Mugshot taken at <?php echo date("Y-m-d h:i:sa"); ?> in Boise, Idaho, USA. </h1>
  <img src="<?php echo $currentImage; ?>" alt="Your current mugshot" id="mugshot" >
  <form method="post" action="">
    <button name="updateMugshot">Click here to update your mugshot!</button>
    <input name="currentImage" type="hidden" value="<?php echo $currentImage; ?>" >
  </form>
	<p></p>
</div>
</body>
</html>
