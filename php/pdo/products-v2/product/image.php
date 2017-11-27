<?php
  require_once "../Dao.php";
  $dao = new Dao();

  $id = htmlspecialchars($_GET["id"]); // TODO: Make sure to validate that the user actually has access to this id 
  $product = $dao->getProduct($id);

  // Render image
  header("Content-type: image/jpg"); 
  echo $product['image']; 
?>
