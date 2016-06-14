<?php
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

	public function addTask($task) {
		$conn = $this->getConnection();
		$saveQuery = "INSERT INTO tasks (description, details, priority, position)
		VALUES(:description, :details, :priority, :position)";
		$q = $conn->prepare($saveQuery);
		$q->bindParam(":description", $task['description']);
		$q->bindParam(":details", $task['details']);
		$q->bindParam(":priority", $task['priority']);
		$q->bindParam(":position", $task['position']);
		$q->execute();
		return $conn->lastInsertId();
	}

	public function getOrderedTasks() {
		$conn = $this->getConnection();
		$stmt = $conn->query("SELECT * FROM tasks ORDER BY position");
		return $stmt->fetchAll();
	}

	public function updateTaskOrder($tasks) {
		$conn = $this->getConnection();
		$stmt = $conn->prepare("UPDATE tasks SET position = :position
								WHERE id = :id");
		try {
			$conn->beginTransaction();
			for($i = 0; $i < count($tasks); $i++) {
				$stmt->bindParam(":position", $i);
				$stmt->bindParam(":id", $tasks[$i]);
				$stmt->execute();
			}
			$conn->commit();
			return $i;
		} catch(PDOException $e) {
			$conn->rollback();
			throw $e;
		}
	}


} // end Dao
