<?php
  require_once "../Dao.php";
  $dao = new Dao();
  $id = htmlspecialchars($_GET["id"]); // TODO: Make sure to validate that the user actually has access to this id 
  $product = $dao->getProduct($id);
?>

<h2>Details for <?= $product["name"]; ?> : <?= $product["description"]; ?></h2>

<!-- Since we are storing image data in db, we need to write an image.php handler
     to retrieve the image from the database -->
<p><img src="image.php?id=<?= $product["id"]; ?>" /></p>

<a href="../products.php">Back to Product List</a>
