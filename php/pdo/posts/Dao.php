<?php
class Dao {

	private $dbname = "webdev";
	private $host ="localhost";
	private $username = "csstudent";
	private $password = "password";

	private function getConnection()
	{
		$conn = new PDO("mysql:dbname={$this->dbname};host={$this->host};",
			"$this->username", "$this->password");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
	
	public function getUsernameList()
	{
		$conn = $this->getConnection();
		$stmt = $conn->query("SELECT username FROM users");
		return $stmt->fetchAll();
	}

	public function userExists($username)
	{
		if($this->getUser()) {
			return true;
		} else {
			return false;
		}
	}

	public function getUser($username)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT * FROM users WHERE username = :uname");
		$stmt->bindParam(":uname", $username);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function filterPostsByKey($key, $value)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT u.first_name, u.last_name, u.username, p.message, p.posted
							FROM posts AS p JOIN users AS u ON p.user_id = u.id
							WHERE $key = :value");
		$stmt->bindParam(":value", $value);
		$stmt->execute();
		return $stmt;
	}

	public function getPostsJoinUserName() {
		$conn = $this->getConnection();
		return $conn->query("SELECT u.first_name, u.last_name, u.username, p.id, p.message, p.posted
						 FROM posts AS p JOIN users AS u ON p.user_id = u.id");
	}

	public function getPosts()
	{
		$conn = $this->getConnection();
		return $conn->query("SELECT * FROM posts");
	}

	public function addPost($username, $message)
	{
		$user = $this->getUser($username); 	
		if($user) {
			$user_id = $user['id'];
			$conn = $this->getConnection();
			$stmt = $conn->prepare("INSERT INTO posts (user_id, message)
									 VALUES (:user_id, :message)");
			$stmt->bindParam(":user_id", $user_id);
			$stmt->bindParam(":message", $message);
			$stmt->execute();
		} else {
			throw new Exception("Invalid user. $username");
		}
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
