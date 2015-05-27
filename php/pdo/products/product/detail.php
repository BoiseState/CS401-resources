<?php
  // products/detail.php
  // Gets an id from the query string to look up the product in MySQL
  require_once "../Dao.php";
  $dao = new Dao();

  $id = $_GET["id"];
  $product = $dao->getProduct($id);
?>

<h2>Details for <?= $product["name"]; ?> : <?= $product["description"]; ?></h2>
  <img src="<?= $product["image_path"]; ?>" />
  <div>
    <a href="../products.php">Back to Product List</a>
  </div>
