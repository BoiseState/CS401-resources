<?php
// This page lists products and generates links with an id in the query string

// Establish connection to database and retrieve products. 
require_once("Dao.php");
try {
  $dao = new Dao();
  $products = $dao->getProducts();
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
    <ul>
    <?php foreach ($products as $product) { ?>
      <li><a href="product/detail.php?id=<?= $product["id"]; ?>"><?= $product["name"];?></a></li>
    <?php } ?>
    </ul>
    <a href="product/add.html">Add a product</a>
  </body>
</html>
