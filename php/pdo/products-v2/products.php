<?php
  require_once "Dao.php";
  $dao = new Dao();
  try
  {
    $products = $dao->getProducts();
  }
  catch (PDOException $e)
  {
    echo "<p>Failed to get product list. Please try again later.</p>";
    die;
  }
?>
<html>
  <body>
    <ul>
    <?php foreach ($products as $product) { ?>
    <li><a href="product/detail.php?id=<?= $product["id"]; ?>"><?= $product["name"];?></a></li>
    <?php } ?>
    </ul>
    <a href="product/add.html">Add a product</a>
  </body>
</html>
