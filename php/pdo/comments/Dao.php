<?php
require_once(__DIR__ . '/../db_config.php');

class Dao
{
	/**
	 * Creates a new PDO connection and returns the handle.
	 */
	private function getConnection()
	{
		$url = parse_url(getenv('CLEARDB_DATABASE_URL'));

		$host = $url["host"];
		$db	 = substr($url["path"], 1);
		$user = $url["user"];
		$pass = $url["pass"];

		// Create PDO instance using MySQL connection string.
		$conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);

		// Make sure to turn on exceptions for debugging.
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $conn;
	}

	public function saveComment ($comment) {
		$conn = $this->getConnection();
		$saveQuery =
				"INSERT INTO comments
				(comment)
				VALUES
				(:comment)";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":comment", $comment);
		$q->execute();
	}

	public function getComments () {
		$conn = $this->getConnection();
		return $conn->query("SELECT * FROM comments");
	}
} // end Dao
