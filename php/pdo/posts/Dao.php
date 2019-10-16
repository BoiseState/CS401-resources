<?php
require_once('../db-config.php');
class Dao
{
	/**
	 * Creates a new PDO connection and returns the handle.
   *
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
   * Returns list of all usernames in the users table.
   *
   * @return Array of rows in the result set.
   */
	public function getUsernameList()
	{
		$conn = $this->getConnection();
		$stmt = $conn->query("SELECT username FROM users");
		return $stmt->fetchAll();
	}

  /**
   * Checks if the specified username exists in the users table. 
   *
   * @return bool True if exists, false otherwise.
   */
	public function userExists($username)
	{
		if($this->getUser($username)) {
			return true;
		} else {
			return false;
		}
	}

  /**
   * Returns the row in the users table for the specified username.
   *
   * @param String The target username.
   *
   * @return The row from the result set or false if user not found.
   */
	public function getUser($username)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT * FROM users WHERE username = :uname");
		$stmt->bindParam(":uname", $username);
		$stmt->execute();
		return $stmt->fetch();
	}

  /**
   * Returns the set of rows in the posts join users table where the
   * specified key equals the given value.
   *
   * @param String The name of the column to search on.
   * @param String The value to search for.
   *
   * @return Array of rows in the result set.
   */
	public function filterPostsByKey($key, $value)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT u.first_name, u.last_name, u.username, p.message, p.posted
							FROM posts AS p JOIN users AS u ON p.user_id = u.id
							WHERE $key = :value");
		$stmt->bindParam(":value", $value);
		$stmt->execute();
		return $stmt->fetchAll();
	}

  /**
   * Returns the set of rows in the posts users table
   *
   * @param String The name of the column to search on.
   * @param String The value to search for.
   *
   * @return Array of rows in the result set.
   */
	public function getPostsJoinUserName() {
		$conn = $this->getConnection();
    $query = "SELECT u.first_name, u.last_name, u.username, p.id, p.message, p.posted
              FROM posts AS p JOIN users AS u 
              ON p.user_id = u.id";
    $stmt = $conn->query($query);
		return $stmt->fetchAll();
	}

  /**
   * Returns the set of rows in the posts table.
   *
   * @return Array of rows in the result set.
   */
	public function getPosts()
	{
		$conn = $this->getConnection();
    $stmt = $conn->query("SELECT * FROM posts");
		return $stmt->fetchAll();
	}
  
  /**
   * Inserts a post into the posts table for the specified user. 
   *
   * @param String The username of the poster.
   * @param String The message of the post.
   */
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

	/**
	 * Deletes the specified post.
   *
	 * @param int The id of the post to be deleted.
   *
	 * @return bool True if post was deleted, false otherwise. 
	 */
	public function deletePostById($id)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->rowCount() == 0 ? false : true;
	}

	/**
	 * Deletes the specified post owned by the user.
	 *
	 * @param int The id of the user who owns the post to be deleted.
	 * @param int The id of the post to be deleted.
   *
	 * @return bool True if post was deleted, false otherwise. 
	 */
	public function deleteUserPostById($userId, $id)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("DELETE FROM posts WHERE user_id = :user_id AND id = :id");
		$stmt->bindParam(":user_id", $userId);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->rowCount() == 0 ? false : true;
	}

	/**
	 * Updates the specified post with the given message.
	 *
	 * @param int The id of the post to be updated.
	 * @param string The new message for the post.
	 *
	 * @return bool True if post was updated, false otherwise. 
	 */
	public function updatePost($id, $message)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("UPDATE posts SET message = :message WHERE id = :id");
		$stmt->bindParam(":message", $message);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->rowCount() == 0 ? false : true;
	}

	/**
	 * This is better. Ensures that the post we are deleting belongs to the 
	 * specified user.
	 *
	 * Updates the specified post with the given message.
	 *
	 * @param int The id of the user who owns the post.
	 * @param int The id of the post to be updated.
	 * @param string The new message for the post.
	 *
	 * @return bool True if post was updated, false otherwise. 
	 */
	public function updateUserPost($userId, $id, $message)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("UPDATE posts SET message = :message WHERE user_id = :user_id AND id = :id");
		$stmt->bindParam(":message", $message);
		$stmt->bindParam(":user_id", $userId);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->rowCount() == 0 ? false : true;
	}
}
