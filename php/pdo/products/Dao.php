<?php
// Dao.php
// class for getting products in MySQL
class Dao {

  private $host = "localhost";
  private $db = "marissa";
  private $user = "marissa";
  private $pass = "mysqlpass";

  public function getConnection () {
    $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Causes errors to throw an exception.
    return $conn;
  }

  public function getProducts () {
    $conn = $this->getConnection();
    return $conn->query("SELECT id, name FROM product");
  }

  public function getProduct ($id) {
    $conn = $this->getConnection();
    $getQuery = "SELECT id, name, description, image_path FROM product WHERE id = :id";
    $q = $conn->prepare($getQuery);
    $q->bindParam(":id", $id);
    $q->execute();
    return reset($q->fetchAll());
  }

  /**
   * Saves the product to the product table.
   * Returns the number of rows affected by the update. Returns
   * false if insert failed for any reason.
   */
  public function saveProduct ($name, $description, $imagePath) {
    try
    {
      $conn = $this->getConnection();
      $saveQuery =
          "INSERT INTO product
          (name, description, image_path)
          VALUES
          (:name, :description, :imagePath)";
      $q = $conn->prepare($saveQuery);
      $q->bindParam(":name", $name);
      $q->bindParam(":description", $description);
      $q->bindParam(":imagePath", $imagePath);
      $q->execute();
      return $q->rowCount();
    }
    catch(PDOException $e) {
      #log the message.
      return false;
    }
  }

} // end Dao
?>
