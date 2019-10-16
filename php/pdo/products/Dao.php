<?php
// Since we are using a sub-directory, specify the config include relative to 
// this directory (__DIR__).
require_once(__DIR__ . '/../db-config.php');
class Dao
{
  /**
   * Creates a new PDO connection and returns the handle.
   * @return PDO connection 
   */
  private function getConnection()
  {
    $url = parse_url(getenv('CLEARDB_DATABASE_URL'));

    $host = $url["host"];
    $db   = substr($url["path"], 1);
    $user = $url["user"];
    $pass = $url["pass"];

    // Create PDO instance using MySQL connection string.
    $conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);

    // Make sure to turn on exceptions for debugging.
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
  }

  /**
   * Returns all products in the product table.
   *
   * @return Array of rows in the result set.
   */
  public function getProducts()
  {
    $conn = $this->getConnection();
    $stmt = $conn->query("SELECT id, name FROM product");
    return $stmt->fetchAll();
  }

  /**
   * Returns product with the specified id. 
   *
   * @return Array The first row in the result set.
   */
  public function getProduct($id)
  {
    $conn = $this->getConnection();
    $query = "SELECT id, name, description, image_path FROM product WHERE id = :id";
    $q = $conn->prepare($query);
    $q->bindParam(":id", $id);
    $q->execute();
    return $q->fetch();
  }

  /**
   * Saves the product to the product table.
   * 
   * @param String Product name.
   * @param String Product description.
   * @param String Product image path.
   *
   * @return mixed The number of rows affected by the update or false 
   *         if insert failed for any reason.
   */
  public function saveProduct($name, $description, $imagePath) {
    try {
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
