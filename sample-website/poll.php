<?php
$thisPage = 'Poll';
$upload_dir = "uploads";
?>
<?php require_once('phpincludes/header.php'); ?>
<?php require_once('phpincludes/nav.php'); ?>
<div class="content">
<?php if($_SERVER['REQUEST_METHOD'] == "POST") {
  # Print all values received in the POST array
  foreach($_POST as $key => $value) { ?>
    <p><?= $key . ': '; print_r(htmlspecialchars($value)); ?></p>
<?php  }
  # Handle the uploaded files.
  $random_file = $_FILES['random_file'];
  $picture_file = $_FILES['picture']; ?>
  <p>Random File: <pre><?php print_r($random_file); ?></pre></p>
  <p>Picture File: <pre><?php print_r($picture_file); ?></pre></p>
<?php
  # move the tmp image to an uploads directory and display it.
  # NOTE: You would want to do more work to validate file name,
  # file size, type, etc.
  $imagepath = $upload_dir . "/" . $picture_file['name'];
  if(is_uploaded_file($picture_file['tmp_name'])) {
    move_uploaded_file($picture_file['tmp_name'], "$imagepath"); ?>
    <img src="<?= $imagepath; ?>" alt="user image" />
<?php
  }
} else { ?>
  <!-- We are posting this form back to ourselves. The form is only displayed
      on an HTTP GET -->
<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
  <fieldset>
  <legend>Random Poll of the Day</legend>
    <div>
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" value="Your name here">
    </div>
    <div>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
    </div>
    <div>
      <span>Are you awake?</span>
      <label><input type="radio" name="awake" value="yes" checked="checked"> Yes</label>
      <label><input type="radio" name="awake" value="no"> No</label>
    </div>
    <div>
      <textarea name="comments" rows="4" cols="20">Your comments here.</textarea>
    </div>
    <div>
      <label for="random_file">Would you like to upload a file?</label>
      <input type="file" id="random_file" name="random_file" size="60"> <!-- Make sure to set the enctype attribute in form element tag -->
    </div>
    <input type="hidden" name="secret" value="shhhh">
  </fieldset>

  <!-- START HTML 5 ONLY... MAY NOT BE SUPPORTED ON ALL BROWSERS -->
  <fieldset>
    <legend>HTML 5 Elements</legend>
      <div>
        <label for="favorite_color">Favorite Color</label>
        <input type="color" name="favorite_color" id="favorite_color">
      </div>
      <div>
        <label for="vehicles">What type of vehicle?</label>
        <input id="vehicles" list="vehicles" name="vehicle">
        <datalist id="vehicles">
          <option value="Truck">
          <option value="Car">
          <option value="Suv">
          <option value="Bike">
          <option value="Moped">
        </datalist>
      </div>
      <div>
        <label for="how_much">How much?</label>
        <input type="range" name="how_much" id="how_much" min="0" max="50" step="10">
      </div>
      <div>
        <label for="birthday">When is your birthday?</label>
        <input type="date" name="birthday" id="birthday">
      </div>
      <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
      </div>
      <div>
        <label for="homepage">Homepage</label>
        <input type="url" name="homepage" id="homepage">
      </div>
      <div>
        <label id="picture">Would you like to upload a picture?</label>
        <!-- NOTE that the accept parameter is new and not very reliable. -->
        <input type="file" id="picture" name="picture" accept="image/*">
      </div>
  </fieldset>
  <!-- END HTML 5 ONLY... MAY NOT BE SUPPORTED ON ALL BROWSERS -->
  <div class="submit">
    <input type="reset" value="Reset Poll">
    <input type="submit" value="Submit Poll">
  </div>
  </form>
<?php } ?>
</div>
<?php require_once('phpincludes/footer.php'); ?>
