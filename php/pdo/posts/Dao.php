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

  public function userExists($username)
  {
    $conn = $this->getConnection();
  	$stmt = $conn->prepare("SELECT * FROM users WHERE username = :uname");
    $stmt->bindParam(":uname", $username);
    $stmt->execute();
    if($stmt->fetch()) {
      return true;
    } else {
      return false;
    }
  }

  public function filterPostsByKey($key, $value)
  {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("SELECT u.first_name, u.last_name, p.message, p.posted
              FROM posts AS p JOIN users AS u ON p.user_id = u.id
              WHERE $key = :value");
    $stmt->bindParam(":value", $value);
    $stmt->execute();
    return $stmt;
  }

  public function getPostsJoinUserName() {
    $conn = $this->getConnection();
    return $conn->query("SELECT u.first_name, u.last_name, p.id, p.message, p.posted
             FROM posts AS p JOIN users AS u ON p.user_id = u.id");
  }

  public function getPosts()
  {
    $conn = $this->getConnection();
    return $conn->query("SELECT * FROM posts");
  }

  public function deletePostById($id)
  {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
  }

  public function updatePost($id, $message)
  {
    $conn = $this->getConnection();
    $stmt = $conn->prepare("UPDATE posts SET message = :message WHERE id = :id");
    $stmt->bindParam(":message", $message);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
  }
}

?>
