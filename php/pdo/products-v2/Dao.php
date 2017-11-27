<?php
// Since we are using a sub-directory, specify the config include relative to 
// this directory (__DIR__).
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

	public function getProducts () {
		$conn = $this->getConnection();
		return $conn->query("SELECT id, name FROM product");
	}

	public function getProduct ($id) {
		$conn = $this->getConnection();
		$getQuery = "SELECT * FROM product WHERE id = :id";
		$q = $conn->prepare($getQuery);
		$q->bindParam(":id", $id);
		$q->execute();
		return $q->fetch();
	}

	/**
	 * Saves the product to the product table.
	 * Returns the number of rows affected by the update. Returns
	 * false if insert failed for any reason.
	 */
	public function saveProduct ($name, $description, $image) {
		try
		{
			$conn = $this->getConnection();
			$saveQuery =
					"INSERT INTO product
					(name, description, image)
					VALUES
					(:name, :description, :image)";
			$q = $conn->prepare($saveQuery);
			$q->bindParam(":name", $name);
			$q->bindParam(":description", $description);
			$q->bindParam(":image", $image);
			$q->execute();
			return $q->rowCount();
		}
		catch(PDOException $e) {
			#log the message.
			return false;
		}
	}

} // end Dao
