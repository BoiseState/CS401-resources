<?php
require_once('../db_config.php');
/**
 * Data Access Object (DAO) class. Contains all DB access code.
 */
class Dao
{
	/**
	 * Creates a new PDO connection and returns the handle.
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
	 * Returns all rows in the users table. No user input.
	 */
	public function getUsers()
	{
		// Get a connection to the database.
		$conn = $this->getConnection();

		// Execute the query. If we aren't accepting any user input,
		// then we can use a query instead of a prepared statement.
		$stmt = $conn->query("SELECT email, name FROM users");
		return $stmt->fetchAll();
	}

	/**
	 * Returns rows with email column equal to the given email.
	 * Accepts user input. DON'T DO THIS!!
	 */
	public function getUserByEmailBAD($email)
	{
		$conn = $this->getConnection();

		// This is BAD. Never insert user input directly into a query
		// string. Try passing in "'; DROP TABLE users;'" as the $email
		// parameter and see what happens.
		$stmt = $conn->query("SELECT email, name FROM users WHERE email = '$email'");
		return $stmt->fetchAll();
	}

	/**
	 * Returns rows with email column equal to the given email.
	 * Accepts user input. Escapes special characters. Better.
	 */
	public function getUserByEmailBETTER($email)
	{
		$conn = $this->getConnection();
		//Use the quote method to add quotes and escape special characters.
		$safeemail = $conn->quote($email);
		$stmt = $conn->query("SELECT email, name FROM users WHERE email = $safeemail");
		return $stmt->fetchAll();
	}

	/**
	 * Returns rows with email column equal to the given email.
	 * Accepts user input.
	 */
	public function getUserByEmail($email)
	{
		$conn = $this->getConnection();

		// Setup the query string. ':email' is a "named placeholder". We will
		// tie ':email' to an actual value before we execute the prepared
		// statement.
		$query = "SELECT email, name FROM users WHERE email = :email";

		// Create the prepared statement (returns a PDOStatement object).
		$stmt = $conn->prepare($query);

		// Bind the $email parameter passed into the method to the ':email'
		// placeholder of the query.
		$stmt->bindParam(':email', $email);

		// Finally, execute the statement.
		$stmt->execute();

		// And return the result (an array of rows).
		return $stmt->fetchAll();
	}

	/**
	 * Adds a row with email column equal to the given email.
	 * Accepts user input. DON'T DO THIS!!
	 */
	public function addUserBAD($email, $password, $name)
	{
		$conn = $this->getConnection();

		// This is BAD. Never insert user input directly into a query
		// string. Try passing in "'; DROP TABLE users; --" as the $email
		// parameter and see what happens.
		// exec returns the number of rows affected.
		$count = $conn->exec("INSERT INTO users (email, password, name)
		                      VALUES ('$email', '$password', '$name')");
	}

	/**
	 * Adds a row to the users table with the given email attribute (aka column).
	 * Accepts user input.
	 */
	public function addUser($email, $password, $name)
	{
		$conn = $this->getConnection();

		// Setup the insert string. ':email' is a "named placeholder". We will
		// tie ':email' to an actual value before we execute the prepared
		// statement.
		$query = "INSERT INTO users (email, password, name)
		          VALUES (:email, :password, :name)";

		// Create the prepared statement (returns a PDOStatement object).
		$stmt = $conn->prepare($query);

		// Bind the $email parameter passed into the method to the ':email'
		// placeholder of the query.
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':name', $name);

		// Finally, execute the statement.
		$stmt->execute();
	}
}
