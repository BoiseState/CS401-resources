<?php
// Dao.php
// class for saving and getting comments from MySQL
class Dao {

  private $host = "localhost";
  private $db = "webdev";
  private $user = "csstudent";
  private $pass = "password";

  public function getConnection () {
    $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); # Causes errors to throw an exception.
    return $conn;
  }

  public function saveComment ($comment) {
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO comment
        (comment)
        VALUES
        (:comment)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":comment", $comment);
    $q->execute();
  }

  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("SELECT * FROM comment");
  }
} // end Dao
