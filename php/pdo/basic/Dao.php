<?php
class Dao {

  private $dbname = "marissa";
  private $host ="localhost";
  private $database = "marissa";
  private $password = "mysqlpass";

  private function getConnection()
  {
    $conn = new PDO("mysql:dbname={$this->dbname};host={$this->host};",
      "$this->database", "$this->password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  }

  // Username is actually their email address
  public function getPostsByUsername($username)
  {
    $conn = $this->getConnection();
  	$stmt = $conn->prepare("SELECT u.name, p.message, p.posted FROM posts AS p
							JOIN users AS u ON p.user_id = u.id
              WHERE email = :uname");
    $stmt->bindParam(":uname", $username);
    $stmt->execute();
    return $stmt;
  }

  public function getPosts()
  {
    $conn = $this->getConnection();
    return $conn->query("SELECT * FROM posts");
  }
}

?>
