<?php
/**
 * Data Access Object (DAO) class. Contains all DB access code.
 */
class Dao
{
	const HOST = "localhost";
	const DBNAME = "webdev";
	const USER = "csstudent";
	const PASSWORD = "w3bD3vSQLdb";

	/**
	 * Creates a new PDO connection and returns the handle.
	 * @throws PDOException if connection fails.
	 */
	public static function getConnection()
	{
		$conn = new PDO('mysql:dbname=' . Dao::DBNAME .';host=' . Dao::HOST . ';',
						Dao::USER, Dao::PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
}
