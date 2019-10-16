<?php
// Gets an id from the query string to look up the product in MySQL
  
require_once("../Dao.php");
try {
  $dao = new Dao();
  $id = $_GET["id"];
  $product = $dao->getProduct($id);
} catch (PDOException $e) {
  echo "<p>Failed to get product list. Please try again later.</p>";
  die;
}
?>
<html>
  <head>
    <title>Product Demo</title>
  </head>
  <body>
    <h2>Details for <?= $product["name"]; ?> : <?= $product["description"]; ?></h2>
    <img src="<?= $product["image_path"]; ?>" />
    <div>
      <a href="../products.php">Back to Product List</a>
    </div>
  </body>
</html>
