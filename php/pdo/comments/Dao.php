<?php
require_once(__DIR__ . '/../db-config.php');
/**
 * Data Access Object (DAO) class. Contains all DB access code.
 * $dao = new Dao();
 * $result = $dao->getAllRows();
 */
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
   * Inserts a comment into the comments table. 
   * @param String The comment to insert.
   * @return bool true on success, false on failure.
   */
  public function saveComment($comment)
  {
    $conn = $this->getConnection();
    $query =
        "INSERT INTO comments
        (comment)
        VALUES
        (:comment)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":comment", $comment);
    return $stmt->execute();
  }

  /**
   * Returns all rows in the comments table. No user input.
   * @return Array of rows in the result set.
   */
  public function getComments()
  {
    $conn = $this->getConnection();
    $stmt = $conn->query("SELECT * FROM comments");
    return $stmt->fetchAll();
  }
} // end Dao
