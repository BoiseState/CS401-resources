<html>
<head>
  <title>Form Handler Demo</title>
</head>
<body>
<?php
/**
 * Prints all the key value pairs received in the $_GET array
 */
function print_get_values() {
  if(isset($_GET) && !empty($_GET)) {
    foreach($_GET as $key => $value) { ?>
      <p><?= $key . ': '; print_r(htmlspecialchars($value)); ?></p>
  <?php }
  }
}
/**
 * Prints all the key value pairs received in the $_POST array
 */
function print_post_values() {
  if(isset($_POST) && !empty($_POST)) {
    foreach($_POST as $key => $value) { ?>
      <p><?= $key . ': '; print_r(htmlspecialchars($value)); ?></p>
  <?php }
  }
}

/**
 * Prints all the key value pairs received in the $_FILES array
 */
function print_file_values() {
  if(isset($_FILES) && !empty($_FILES)) {
    foreach($_FILES as $key => $value) { ?>
      <p><?= $key . ': '; ?><pre><?php print_r($value); ?></pre></p>
    <?php }
  }
}

function upload_image($image_file, $upload_dir = "uploads") {
  $imagepath = $upload_dir . "/" . $image_file['name'];
  if(is_uploaded_file($image_file['tmp_name'])) {
    move_uploaded_file($image_file['tmp_name'], "$imagepath");
    return $imagepath;
  } else {
    return null;
  }
}

?>

<?php
if($_SERVER['REQUEST_METHOD'] == "GET")
{
  // Print all values received in the POST array
  print_get_values();
}
else if($_SERVER['REQUEST_METHOD'] == "POST")
{
   // Print all values received in the POST array
  print_post_values();

  // Print all values received in the FILES array
  print_file_values();

  // Display the uploaded picture file.
  // move the tmp image to an uploads directory and display it.
  // NOTE: You would want to do more work to validate file name,
  // file size, type, etc.
  $picture_file = $_FILES['picture'];
  $imagepath = upload_image($picture_file);
  if($imagepath) { ?>
    <img src="<?= $imagepath; ?>" alt="user image" />
  <?php
  }
} ?>
</body>
</html>
